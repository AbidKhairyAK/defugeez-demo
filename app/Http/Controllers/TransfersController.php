<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Transfer;
use App\Model\Proof;
use App\Model\Donation;

class TransfersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$transfers = Transfer::withTrashed()->orderBy('created_at', 'desc')->paginate(20)->onEachSide(1);

    	return view('transfers.index', compact('transfers'));
    }

    public function create(Donation $donation)
    {
    	return view('transfers.create', compact('donation'));
    }

    public function store(Requests\TransfersStoreRequest $request, Donation $donation)
    {
        $request->merge([
            'user_id' => auth()->user()->id,
            'donation_id' => $donation->id,
        ]);

        $transfer = Transfer::create($request->all());

        return redirect("donations/{$donation->id}/transfers/{$transfer->id}");
    }

    public function show(Donation $donation, Transfer $transfer)
    {
    	return view('transfers.show', compact('transfer', 'donation'));
    }

    public function update(Donation $donation, Transfer $transfer)
    {
    	$transfer->update(['status' => 1]);

    	return redirect()->back();
    }

    public function delete(Donation $donation, Transfer $transfer)
    {
    	$transfer->delete();

    	return redirect('/');
    }

    public function destroy(Donation $donation, Transfer $transfer)
    {
    	$transfer->forceDelete();

    	return redirect('/');
    }

    public function proof_create(Donation $donation, Transfer $transfer)
    {
    	return view('transfers.proof_create', compact('transfer', 'donation'));
    }

    public function proof_store(Requests\ProofsStoreRequest $request, Donation $donation, Transfer $transfer)
    {
        $image = $request->file('proof_image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/proof');
        $image->move($destinationPath, $name);

        $request->merge([
            'user_id' => auth()->user()->id,
            'transfer_id' => $transfer->id,
            'image' => '/img/proof/'.$name,
        ]);

        Proof::create($request->all());

        return redirect('/');
    }
}
