<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Event;
use App\Model\Post;
use App\Model\Refugee;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class PostsController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('test.posts.index', compact('posts'));
    }

    public function page($id)
    {
        $event = Event::findOrFail($id);
        $posts = Post::where('event_id', $id)->orderBy('created_at', 'desc')->limit(4)->get();
        $post_markers = Post::where('event_id', $id)->get();
        
        $data = Refugee::where('event_id', $id)->orderBy('created_at', 'desc');

        // Summary
        $healths = Refugee::where('event_id', $id)->groupBy('health')->select('health', DB::raw('count(*) as total'))->get();

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

        session(['event_id' => $id]);

        return view('posts.index', compact('event', 'posts', 'post_markers', 'healths', 'agesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $event = Event::findOrFail(session('event_id'));

        return view('posts.create', compact('post', 'event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostsStoreRequest $request)
    {
        $request->merge([
            'user_id' => 1,
            'organization_id' => 1,
            'event_id' => session('event_id'),
        ]);

        Post::create($request->all());

        Toastr::success('Data Posko Berhasil Ditambahkan!', 'Tambah Data Posko');

        return redirect('page/posts/'.session('event_id'));
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
        $post = Post::findOrFail($id);
        $event = Event::findOrFail(session('event_id'));

        return view('posts.edit', compact('post', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostsUpdateRequest $request, $id)
    {
        Post::findOrFail($id)->update($request->all());

        Toastr::success('Data Posko Berhasil Diedit!', 'Edit Data Posko');

        return redirect('page/posts/'.session('event_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        Toastr::success('Data Posko Berhasil Dihapus!', 'Hapus Data Posko');

        return redirect('page/posts/'.session('event_id'));
    }
}
