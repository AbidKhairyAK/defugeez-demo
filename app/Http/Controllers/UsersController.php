<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('test.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        return view('test.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UsersStoreRequest $request)
    {
        $request->merge([
            'organization_id' => 1,
        ]);

        User::create($request->all());

        Toastr::success('Data Relawan Berhasil Ditambahkan!', 'Tambah Data Relawan');

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('test.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UsersUpdateRequest $request, $id)
    {
        User::findOrFail($id)->update($request->all());

        Toastr::success('Data Relawan Berhasil Diedit!', 'Edit Data Relawan');

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        Toastr::success('Data Relawan Berhasil Dihapus!', 'Hapus Data Relawan');

        return redirect('/users');
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

    public function registerForm()
    {
        return view('auth.register');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
    }

    public function register(Requests\UsersStoreRequest $request)
    {
        $request->merge([
            'organization_id' => 1,
        ]);

        $this->message($request->name, $request->phone);

        Toastr::success('Selamat datang '.title_case($request->name).' di aplikasi deFugeez', 'Registrasi Berhasil');

        User::create($request->all());

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
