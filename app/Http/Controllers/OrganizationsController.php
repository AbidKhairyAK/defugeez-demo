<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Organization;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;

class OrganizationsController extends Controller
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
    public function index()
    {
        $organizations = Organization::orderBy('created_at', 'asc')->get();
        $my_organization = clone $organizations;

        if(auth()->check()) {
            $organizations = $organizations->whereNotIn('id', [auth()->user()->organization->id] );
            $my_organization = $my_organization->where('id', auth()->user()->organization->id)->first();
        }

        return view('organizations.index', compact('organizations', 'my_organization'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Organization $organization)
    {
        $this->authorize('organizations.create');

        return view('organizations.create', compact('organization'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\OrganizationsStoreRequest $request)
    {
        $this->authorize('organizations.create');

        $image = $request->file('logo_image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/logo');
        $image->move($destinationPath, $name);

        $request->merge([
            'logo' => $name
        ]);

        Organization::create($request->all());

        Toastr::success('Data Organisasi Berhasil Ditambahkan!', 'Tambah Data Organisasi');

        return redirect('organizations');
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
    public function edit(Organization $organization)
    {
        $this->authorize('organizations.update', $organization);

        return view('organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\OrganizationsUpdateRequest $request, Organization $organization)
    {
        $this->authorize('organizations.update', $organization);

        if ($image = $request->file('logo_image')) {

            unlink(public_path('/img/logo/'.$organization->logo));

            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/logo');
            $image->move($destinationPath, $name);

            $request->merge([
                'logo' => $name
            ]);
        }

        $organization->update($request->all());

        Toastr::success('Data Organisasi Berhasil Diedit!', 'Edit Data Organisasi');

        return redirect('organizations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $this->authorize('organizations.delete', $organization);

        $organization->users()->update(['organization_id' => 1]);
        $organization->delete();

        unlink(public_path('/img/logo/'.$organization->logo));

        Toastr::success('Data Organisasi Berhasil Dihapus!', 'Hapus Data Organisasi');

        return redirect('organizations');
    }
}
