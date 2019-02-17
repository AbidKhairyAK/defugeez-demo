<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Donation;
use App\Model\Event;
use App\Model\Post;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
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
        $donations = Donation::where('status', 1)->orderBy('created_at', 'desc')->limit(8)->get();
        $events = Event::orderBy('status', 'desc')->orderBy('created_at', 'desc')->limit(6)->get();
        $event_markers = Event::where('status', 1)->get();

        // Toastr::success('Selamat datang di aplikasi <b>deFugeez</b>', 'Hello!');

        return view('events.index', compact('events', 'event_markers', 'donations')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        $this->authorize('events.create');

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
        $this->authorize('events.create');

        $request->merge([
            'user_id' => auth()->user()->id,
            'slug' => str_slug($request->name).time(),
        ]);

        Event::create($request->all());

        Toastr::success('Data Peristiwa Berhasil Ditambahkan!', 'Tambah Data Peristiwa');

        return redirect('/events');
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
    public function edit(Event $event)
    {
        $this->authorize('events.update', $event);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\EventsUpdateRequest $request, Event $event)
    {
        $this->authorize('events.update', $event);
        
        $request->merge([
            'user_id' => auth()->user()->id,
            'slug' => str_slug($request->name).time(),
        ]);

        $event->update($request->all());

        Toastr::success('Data Peristiwa Berhasil Diedit!', 'Edit Data Peristiwa');

        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $this->authorize('events.delete', $event);
        
        foreach ($event->posts() as $post) {
            $post->demands()->delete();
            $post->refugees()->delete();
            $post->delete();
        }

        $event->delete();

        Toastr::success('Data Peristiwa Berhasil Dihapus!', 'Hapus Data Peristiwa');

        return redirect('events');
    }
}
