<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use App\Model\Post;
use App\Model\Refugee;
use App\Model\Demand;
use App\Imports\RefugeesImport;
use App\Exports\RefugeesExport;
use App\Exports\FormatFileExport;

class RefugeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refugees = Refugee::all();

        return view('test.refugees.index', compact('refugees'));
    }

    public function page($id)
    {
        $post = Post::findOrFail($id);
        $data = Refugee::where('post_id', $id)->orderBy('created_at', 'desc');

        // Summary
        $healths = Refugee::where('post_id', $id)->groupBy('health')->select('health', DB::raw('count(*) as total'))->get();

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
            ['post_id', '=', $id],
            ['type', '=', 0],
        ])->orderBy('created_at', 'desc')->get();

        $received_demands = Demand::where([
            ['post_id', '=', $id],
            ['type', '=', 1],
        ])->orderBy('created_at', 'desc')->get();

        $refugees = $data->get();

        session(['post_id' => $id]);

        return view('refugees.index', compact('post', 'refugees', 'healths', 'agesCount', 'requested_demands', 'received_demands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $refugee = new refugee();
        $post = Post::findOrFail(session('post_id'));

        $this->authorize('refugees.create');

        return view('refugees.create', compact('refugee', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RefugeesStoreRequest $request)
    {
        $request->merge([
            'user_id' => session('user_id'),
            'post_id' => session('post_id'),
            'event_id' => session('event_id'),
        ]);

        $this->authorize('refugees.create');

        Refugee::create($request->all());

        Toastr::success('Data Pengungsi Berhasil Ditambahkan!', 'Tambah Data Pengungsi');

        $request->session()->flash('refugees_tab', 'refugees');

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
        $refugee = Refugee::findOrFail($id);
        $post = Post::findOrFail(session('post_id'));

        $this->authorize('refugees.update', $refugee);

        return view('refugees.edit', compact('refugee', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\RefugeesUpdateRequest $request, $id)
    {
        $request->merge([
            'user_id' => session('user_id'),
        ]);

        $refugee = Refugee::findOrFail($id);

        $this->authorize('refugees.update', $refugee);

        $refugee->update($request->all());

        $request->session()->flash('refugees_tab', 'refugees');

        Toastr::success('Data Pengungsi Berhasil Diedit!', 'Edit Data Pengungsi');

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
        $refugee = Refugee::findOrFail($id);

        $this->authorize('refugees.delete', $refugee);

        $refugee->delete();

        Toastr::success('Data Pengungsi Berhasil Dihapus!', 'Hapus Data Pengungsi');

        $request->session()->flash('refugees_tab', 'refugees');

        return redirect('page/refugees/'.session('post_id'));
    }

    public function export($post_id)
    {
        $post = Post::find($post_id);
        $file_name = "deFugeez - Daftar Pengungsi ".$post->name." - ".$post->event->name.".xlsx";

        return (new RefugeesExport($post_id))->download($file_name);
    }

    public function import(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        $post_id= $post_id;
        $event_id = $post->event->id;
        $user_id = auth()->user()->id;

        (new RefugeesImport($event_id, $post_id, $user_id))->import($request->file('import'));

        Toastr::success('File Excel berhasil di-import!', 'Import Excel');

        $request->session()->flash('refugees_tab', 'refugees');

        return redirect('page/refugees/'.session('post_id'));
    }

    public function format($post_id)
    {
        $post = Post::find($post_id);
        $file_name = "deFugeez - Import Pengungsi ".$post->name." - ".$post->event->name.".xlsx";

        return (new FormatFileExport)->download($file_name);
    }
}
