<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Organization;
use App\Http\Requests;
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
        User::findOrFail($id)->update($request->all());

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
        User::findOrFail($id)->delete();

        Toastr::success('Data Relawan Berhasil Dihapus!', 'Hapus Data Relawan');

        return redirect('page/users/'.session('organization_id'));
    }
}