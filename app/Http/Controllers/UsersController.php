<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Organization;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Organization $organization)
    {
        $users = User::where('organization_id', $organization->id)->orderBy('status', 'asc')->orderBy('name', 'asc')->get();

        return view('users.index', compact('organization', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Organization $organization, User $user)
    {
        $this->authorize('users.create');

        $roles = [
            '' => '', 
            3 => 'Relawan',
            4 => 'Akun Biasa',
        ];

        if (auth()->user()->role == 1) {
            $roles[1] = 'Developer';
        }

        if (auth()->user()->role <= 2) {
            $roles[2] = 'Admin';
        }

        return view('users.create', compact('user', 'organization', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UsersStoreRequest $request, Organization $organization, User $user)
    {
        $this->authorize('users.create');

        $request->merge([
            'organization_id' => $organization->id,
            'slug' => str_slug($request->name).time(),
        ]);

        User::create($request->all());

        Toastr::success('Data Relawan Berhasil Ditambahkan!', 'Tambah Data Relawan');

        return redirect("organizations/{$organization->id}/users");
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
    public function edit(Organization $organization, User $user)
    {
        $this->authorize('users.update', $user);

        $roles = [
            '' => '', 
            3 => 'Relawan',
            4 => 'Akun Biasa',
        ];

        if (auth()->user()->role == 1) {
            $roles[1] = 'Developer';
        }

        if (auth()->user()->role <= 2) {
            $roles[2] = 'Admin';
        }

        return view('users.edit', compact('user', 'organization', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UsersUpdateRequest $request, Organization $organization, $slug)
    {
        $user = User::find($slug);

        $this->authorize('users.update', $user);

        if ($request->password_old && $request->password_confirmation && $request->password) {
            if (!Hash::check($request->password_old, $user->password)) {
                session()->flash('password_old', 'Password lama anda salah!');
                return redirect()->back();
            }
        } else {
            unset($request['password_old']);
            unset($request['password_confirmation']);
            unset($request['password']);
        }

        if ($user->name != $request->name) {
            $request->merge(['slug' => str_slug($request->name).time()]);
        }

        $user->update($request->all());

        Toastr::success('Data Relawan Berhasil Diedit!', 'Edit Data Relawan');

        return redirect("organizations/{$organization->id}/users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization, User $user)
    {
        $this->authorize('users.delete', $user);

        $check_user = $user->id == auth()->user()->id;

        if ($check_user) {
            Auth::logout();
        }

        $user->proof()->delete();
        $user->transfers()->forceDelete();
        $user->donations()->update(['user_id' => 1]);
        $user->events()->update(['user_id' => 1]);
        $user->posts()->update(['user_id' => 1]);
        $user->refugees()->update(['user_id' => 1]);
        $user->demands()->update(['user_id' => 1]);
        $user->delete();

        Toastr::success('Data Akun Relawan Berhasil Dihapus!', 'Hapus Data Relawan');

        if ($check_user) {
            return redirect('login');    
        }

        return redirect("organizations/{$organization->id}/users");
    }
}