<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use App\Imports\RefugeesImport;
use App\Exports\RefugeesExport;
use App\Exports\FormatFileExport;
use App\Model\Event;
use App\Model\Post;
use App\Model\Refugee;
use App\Model\Demand;

class RefugeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'export', 'format');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event, Post $post)
    {
        $data = Refugee::where('post_id', $post->id)->orderBy('created_at', 'desc');

        // Summary
        $healths = Refugee::where('post_id', $post->id)->groupBy('health')->select('health', DB::raw('count(*) as total'))->get();

        $ageParam = Carbon::now()->subYears(17)->toDateString();

        $ages = [
            clone $data,
            clone $data,
            clone $data
        ];

        $agesCount = [
            $ages[0]->where([
                ['birthdate', '>=', $ageParam],
                ['gender', '=', 'L']
            ])->count(),

            $ages[1]->where([
                ['birthdate', '>=', $ageParam],
                ['gender', '=', 'P']
            ])->count(),

            $ages[2]->where([
                ['birthdate', '<', $ageParam]
            ])->count(),
        ];

        // Demands
        $requested_demands = Demand::where([
            ['post_id', '=', $post->id],
            ['type', '=', 0],
        ])->orderBy('created_at', 'desc')->get();

        $received_demands = Demand::where([
            ['post_id', '=', $post->id],
            ['type', '=', 1],
        ])->orderBy('created_at', 'desc')->get();

        $refugees = $data->get();

        return view('refugees.index', compact('event', 'post', 'refugees', 'healths', 'agesCount', 'requested_demands', 'received_demands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event, Post $post, Refugee $refugee)
    {
        $this->authorize('refugees.create');

        return view('refugees.create', compact('refugee', 'post', 'event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RefugeesStoreRequest $request, Event $event, Post $post)
    {
        $this->authorize('refugees.create');

        $request->merge([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'event_id' => $event->id,
            'slug' => str_slug($request->name).time(),
        ]);

        Refugee::create($request->all());

        Toastr::success('Data Pengungsi Berhasil Ditambahkan!', 'Tambah Data Pengungsi');

        $request->session()->flash('refugees_tab', 'refugees');

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
    public function edit(Event $event, Post $post, Refugee $refugee)
    {
        $this->authorize('refugees.update', $refugee);

        return view('refugees.edit', compact('refugee', 'post', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\RefugeesUpdateRequest $request, Event $event, Post $post, Refugee $refugee)
    {  

        $this->authorize('refugees.update', $refugee);

        $request->merge([
            'user_id' => auth()->user()->id,
            'slug' => str_slug($request->name).time(),
        ]);
        
        $refugee->update($request->all());

        Toastr::success('Data Pengungsi Berhasil Diedit!', 'Edit Data Pengungsi');

        $request->session()->flash('refugees_tab', 'refugees');

        return redirect('events/'.$event->id.'/posts/'.$post->id.'/refugees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event, Post $post, Refugee $refugee)
    {
        $this->authorize('refugees.delete', $refugee);

        $refugee->delete();

        Toastr::success('Data Pengungsi Berhasil Dihapus!', 'Hapus Data Pengungsi');

        $request->session()->flash('refugees_tab', 'refugees');

        return redirect('events/'.$event->id.'/posts/'.$post->id.'/refugees');
    }

    public function export(Event $event, Post $post)
    {
        $file_name = "deFugeez - Daftar Pengungsi ".$post->name." - ".$event->name.".xlsx";

        return (new RefugeesExport($post->id))->download($file_name);
    }

    public function import(Request $request, Event $event, Post $post)
    {
        $this->authorize('refugees.create');

        (new RefugeesImport($event->id, $post->id, auth()->user()->id))->import($request->file('import'));

        Toastr::success('File Excel berhasil di-import!', 'Import Excel');

        $request->session()->flash('refugees_tab', 'refugees');

        return redirect('events/'.$event->id.'/posts/'.$post->id.'/refugees');
    }

    public function format(Event $event, Post $post)
    {
        $file_name = "deFugeez - Import Pengungsi ".$post->name." - ".$event->name.".xlsx";

        return (new FormatFileExport)->download($file_name);
    }
}
