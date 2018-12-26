<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Refugee;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;

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
        $refugees = Refugee::where('post_id', $id)->orderBy('created_at', 'desc')->get();

        session(['post_id' => $id]);

        return view('refugees.index', compact('post', 'refugees'));
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
            'user_id' => 1,
            'post_id' => session('post_id'),
            'event_id' => session('event_id'),
        ]);

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
        Refugee::findOrFail($id)->update($request->all());

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
    public function destroy($id)
    {
        Refugee::findOrFail($id)->delete();

        Toastr::success('Data Pengungsi Berhasil Dihapus!', 'Hapus Data Pengungsi');

        return redirect('page/refugees/'.session('post_id'));
    }
}
