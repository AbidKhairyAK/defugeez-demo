<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\User;
use App\Model\Organization;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'organizationRegisterForm', 'organizationRegister');
    }

    public function registerForm()
    {
     	$user = new User();
     	$organizations = Organization::whereNotIn('id', [1])->pluck('name', 'id');
        return view('auth.register', compact('user', 'organizations'));
    }

    public function register(Requests\UsersRegisterRequest $request)
    {
        // $this->message($request->name, $request->phone);

        $id = $request->organization_id ?: 1;
        $check_users = Organization::where('id', $id)->first()->users()->count();

        if (!$check_users) {
        	$merge = [
        		'status' => 1,
        		'role' => 2,
        	];
        } else if ($request->type) {
            $merge = [ 'role' => 3 ];
        } else {
            $merge = [ 
                'role' => 4,
                'organization_id' => 1,
            ];
        }

        $merge['slug'] = str_slug($request->name).time();

        $request->merge($merge);

        User::create($request->all());

        Toastr::success('Selamat datang '.title_case($request->name).' di aplikasi deFugeez', 'Registrasi Berhasil');

        return redirect('/login');
    }

    public function organizationRegisterForm()
    {
     	$organization = new Organization();
        return view('auth.organization_register', compact('organization'));
    }

    public function organizationRegister(Requests\OrganizationsStoreRequest $request)
    {
        $image = $request->file('logo_image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/logo');
        $image->move($destinationPath, $name);

        $request->merge([
            'logo' => $name,
            'slug' => str_slug($request->name).time(),
        ]);

        Organization::create($request->all());

        Toastr::success('Organisasi '.title_case($request->name).' berhasil terdaftar di aplikasi deFugeez. Silahkan daftarkan diri anda', 'Registrasi Organisasi');

        if (auth()->check()) {
            return redirect('/organizations');
        }

        return redirect('/register');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, true)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        return redirect()->back()->with('invalid', 'Email atau Password anda salah!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function message($name, $phone)
    {
        $msg = "Hey....... ".title_case($name).", terimakasih sudah mendaftar di aplikasi deFugeez. Semoga aplikasi ini bermanfaat";
          $ch = curl_init();
          $vars = array("msisdn"=>$phone,"content"=>$msg);
          curl_setopt($ch, CURLOPT_URL,"https://api.mainapi.net/smsnotification/1.0.0/messages");
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $headers = [
            'Authorization: Bearer 10511101e3b890694056ac61d875fed9',
            'X-MainAPI-Senderid: TELKOM',
            'Accept: application/json',
          ];
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          $server_output = curl_exec ($ch);
          curl_close ($ch);

          return $server_output;
    }
}
