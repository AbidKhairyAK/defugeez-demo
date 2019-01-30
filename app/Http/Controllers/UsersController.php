<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Organization;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function page($id)
    {
        $organization = Organization::find($id);
        $users = User::where('organization_id', $id)->orderBy('status', 'asc')->orderBy('name', 'asc')->get();

        session(['organization_id' => $id]);

        return view('users.index', compact('organization', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        $this->authorize('users.create');

        return view('users.create', compact('user'));
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
            'organization_id' => session('organization_id'),
        ]);

        $this->authorize('users.create');

        User::create($request->all());

        Toastr::success('Data Relawan Berhasil Ditambahkan!', 'Tambah Data Relawan');

        return redirect('page/users/'.session('organization_id'));
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

        $this->authorize('users.update', $user);

        return view('users.edit', compact('user'));
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
        $user = User::findOrFail($id);

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

        $user->update($request->all());

        session(['user_id' => auth()->user()->id]);
        session(['organization_id' => auth()->user()->organization->id]);
        session(['username' => auth()->user()->name]);
        session(['organization' => auth()->user()->organization->name]);

        Toastr::success('Data Relawan Berhasil Diedit!', 'Edit Data Relawan');

        return redirect('page/users/'.session('organization_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $this->authorize('users.delete', $user);

        $check_user = $user->id == session('user_id');

        if ($check_user) {
            session(['user_id' => false]);
            session(['organization_id' => false]);
            session(['username' => false]);
            session(['organization' => false]);

            Auth::logout();
        }

        $user->events()->update(['user_id' => 1]);
        $user->posts()->update(['user_id' => 1]);
        $user->refugees()->update(['user_id' => 1]);
        $user->demands()->update(['user_id' => 1]);
        $user->delete();

        Toastr::success('Data Akun Relawan Berhasil Dihapus!', 'Hapus Data Relawan');

        if ($check_user) {
            return redirect('login');    
        }

        return redirect('page/users/'.session('organization_id'));
    }
}