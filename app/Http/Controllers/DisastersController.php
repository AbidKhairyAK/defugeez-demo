<?php

namespace App\Http\Controllers;

use App\Model\Disaster;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DisastersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $disasters = Disaster::all();

      return view('app.disasters.table', compact('disasters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $disaster = new Disaster();

      return view('app.disasters.create', compact('disaster'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Requests\DisasterStoreRequest $request)
     {
         Disaster::create($request->all());

         return redirect('/disasters');
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
      $disaster = Disaster::findOrFail($id);

      return view('app.disasters.edit', compact('disaster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Requests\DisasterUpdateRequest $request, $id)
     {
         Disaster::findOrFail($id)->update($request->all());

         return redirect('/disasters');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Disaster::findOrFail($id)->delete();

      return redirect('/disasters');
    }
}
