<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Event;
use App\Model\Post;
use App\Model\Demand;

class DemandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function create(Event $event, Post $post, Demand $demand)
    {
        $this->authorize('demands.create');

        return view('demands.create', compact('demand', 'post', 'event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\DemandsStoreRequest $request, Event $event, Post $post)
    {
        $this->authorize('demands.create');

        $request->merge([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);

        Demand::create($request->all());

        Toastr::success('Data Kebutuhan Berhasil Ditambahkan!', 'Tambah Data Kebutuhan');

        $request->session()->flash('refugees_tab', 'demands');

        return redirect('events/'.$event->id.'/posts/'.$post->id.'/refugees');
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
    public function edit(Event $event, Post $post, Demand $demand)
    {
        $this->authorize('demands.update', $demand);

        return view('demands.edit', compact('demand', 'post', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\DemandsUpdateRequest $request, Event $event, Post $post, Demand $demand)
    {
        $this->authorize('demands.update', $demand);
        
        $request->merge([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);

        $demand->update($request->all());

        Toastr::success('Data Kebutuhan Berhasil Diedit!', 'Edit Data Kebutuhan');

        $request->session()->flash('refugees_tab', 'demands');

        return redirect('events/'.$event->id.'/posts/'.$post->id.'/refugees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event, Post $post, Demand $demand)
    {
        $this->authorize('demands.update', $demand);
        
        $demand->delete();

        Toastr::success('Data Kebutuhan Berhasil Dihapus!', 'Hapus Data Kebutuhan');

        $request->session()->flash('refugees_tab', 'demands');

        return redirect('events/'.$event->id.'/posts/'.$post->id.'/refugees');
    }
}
