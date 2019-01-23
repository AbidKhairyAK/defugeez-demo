<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Demand;

class DemandsController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $demand = new Demand();

        $this->authorize('demands.create');

        return view('demands.create', compact('demand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\DemandsStoreRequest $request)
    {
        $request->merge([
            'user_id' => session('user_id'),
            'post_id' => session('post_id'),
        ]);

        $this->authorize('demands.create');

        Demand::create($request->all());

        Toastr::success('Data Kebutuhan Berhasil Ditambahkan!', 'Tambah Data Kebutuhan');

        $request->session()->flash('refugees_tab', 'demands');

        return redirect('page/refugees/'.session('post_id'));
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
        $demand = Demand::findOrFail($id);

        $this->authorize('demands.update', $demand);

        return view('demands.edit', compact('demand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\DemandsUpdateRequest $request, $id)
    {
        $request->merge([
            'user_id' => 1,
            'post_id' => session('post_id'),
        ]);
        
        $demand = Demand::findOrFail($id);
        
        $this->authorize('demands.update', $demand);

        $demand->update($request->all());

        $request->session()->flash('refugees_tab', 'demands');

        Toastr::success('Data Kebutuhan Berhasil Diedit!', 'Edit Data Kebutuhan');

        return redirect('page/refugees/'.session('post_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $demand = Demand::findOrFail($id);
        
        $this->authorize('demands.update', $demand);

        $demand->delete();

        Toastr::success('Data Kebutuhan Berhasil Dihapus!', 'Hapus Data Kebutuhan');

        $request->session()->flash('refugees_tab', 'demands');

        return redirect('page/refugees/'.session('post_id'));
    }
}
