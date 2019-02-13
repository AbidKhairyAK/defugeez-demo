<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Donation;

class DonationsController extends Controller
{
	function __construct()
	{
		$this->middleware('auth')->except('show');
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Donation $donation)
    {
    	return view('donations.create', compact('donation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\DonationsStoreRequest $request)
    {
    	$image = $request->file('donation_image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/donation');
        $image->move($destinationPath, $name);

        $request->merge([
            'user_id' => auth()->user()->id,
            'image' => $name,
        ]);

    	Donation::create($request->all());

    	return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
    	return view('donations.page', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
