<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('test.events.index', compact('events'));
    }

    public function page()
    {
        $events = Event::orderBy('status', 'desc')->orderBy('created_at', 'desc')->limit(6)->get();
        $event_markers = Event::where('status', 1)->get();

        // Toastr::success('Selamat datang di aplikasi <b>deFugeez</b>', 'Hello!');

        return view('events.index', compact('events', 'event_markers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = new Event();

        return view('events.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\EventsStoreRequest $request)
    {
        $request->merge([
            'user_id' => 1,
        ]);

        Event::create($request->all());

        Toastr::success('Data Peristiwa Berhasil Ditambahkan!', 'Tambah Data Peristiwa');

        return redirect('page/events');
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
        $event = Event::findOrFail($id);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\EventsUpdateRequest $request, $id)
    {
        Event::findOrFail($id)->update($request->all());

        Toastr::success('Data Peristiwa Berhasil Diedit!', 'Edit Data Peristiwa');

        return redirect('page/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        Toastr::success('Data Peristiwa Berhasil Dihapus!', 'Hapus Data Peristiwa');

        return redirect('page/events');
    }
}
