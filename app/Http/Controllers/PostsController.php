<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use App\Model\Event;
use App\Model\Post;
use App\Model\Refugee;

class PostsController extends Controller
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
    public function index(Event $event)
    {
        $posts = Post::where('event_id', $event->id)->orderBy('created_at', 'desc')->limit(4)->get();
        $post_markers = Post::where('event_id', $event->id)->get();
        
        $data = Refugee::where('event_id', $event->id)->orderBy('created_at', 'desc');

        // Summary
        $healths = Refugee::where('event_id', $event->id)->groupBy('health')->select('health', DB::raw('count(*) as total'))->get();

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

        return view('posts.index', compact('event', 'posts', 'post_markers', 'healths', 'agesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event, Post $post)
    {
        $this->authorize('posts.create');

        return view('posts.create', compact('post', 'event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostsStoreRequest $request, Event $event)
    {
        $this->authorize('posts.create');

        $request->merge([
            'user_id' => auth()->user()->id,
            'organization_id' => auth()->user()->organization->id,
            'event_id' => $event->id,
        ]);

        Post::create($request->all());

        Toastr::success('Data Posko Berhasil Ditambahkan!', 'Tambah Data Posko');

        return redirect('events/'.$event->id.'/posts');
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
    public function edit(Event $event, Post $post)
    {
        $this->authorize('posts.update', $post);

        return view('posts.edit', compact('post', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostsUpdateRequest $request, Event $event, Post $post)
    {
        $request->merge([
            'user_id' => auth()->user()->id,
            'organization_id' => auth()->user()->organization->id,
        ]);

        $this->authorize('posts.update', $post);

        $post->update($request->all());

        Toastr::success('Data Posko Berhasil Diedit!', 'Edit Data Posko');

        return redirect('events/'.$event->id.'/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Post $post)
    {
        $this->authorize('posts.update', $post);

        $post->demands()->delete();
        $post->refugees()->delete();
        $post->delete();

        Toastr::success('Data Posko Berhasil Dihapus!', 'Hapus Data Posko');

        return redirect('events/'.$event->id.'/posts');
    }
}
