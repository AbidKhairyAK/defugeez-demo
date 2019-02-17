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
        $this->authorize('donations.create');

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
        $this->authorize('donations.create');

    	$image = $request->file('donation_image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/donation');
        $image->move($destinationPath, $name);

        $request->merge([
            'user_id' => auth()->user()->id,
            'image' => $name,
            'slug' => str_slug($request->name).time(),
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
    public function edit(Donation $donation)
    {
        $this->authorize('donations.update');

        return view('donation.edit', compact('donation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        $this->authorize('donations.update');

        $merge = [
            'user_id' => auth()->user()->id,
            'slug' => str_slug($request->name).time(),
        ];

        if ($image = $request->file('donation_image')) {
            
            unlink(public_path('/img/donation/'.$donation->image));
            
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/donation');
            $image->move($destinationPath, $name);

            $merge['image'] = $name;
        }

        $donation->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        $this->authorize('donations.delete');
        
        $donation->transfers()->proof()->update(['organization_id' => 1]);
        $donation->transfers()->update(['organization_id' => 1]);
        $donation->delete();

        unlink(public_path('/img/donation/'.$donation->image));

        Toastr::success('Data Donasi Berhasil Dihapus!', 'Hapus Data Donasi');

        return redirect('/');
    }
}
