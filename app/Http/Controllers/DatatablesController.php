<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\Datatables\Datatables;
use App\Model\Organization;
use App\Model\User;

class DatatablesController extends Controller
{
    public function users(Request $request, Organization $organization)
    {
        $users = User::with('regency')->where('organization_id', $organization->id);
	    
	    // ->orderBy('status', 'asc')
	    // ->orderBy('name', 'asc');

    	return Datatables::of($users)
    		->addColumn('username', function($user){
    			return $user->name;
    		})
    		->addColumn('role', function($user){
    			return $user->present()->roleFormatted;
    		})
    		->editColumn('statusf', function($user){
    			return $user->present()->statusFormatted;
    		})
    		->addColumn('action_min', function($user){
    			return '
    				<a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#user'.$user->id.'">
    				  <i class="fa fa-address-card"></i>
    				</a>

    				<a class="btn btn-sm btn-info '.(Gate::denies('users.update', $user) ? 'disabled' : '').'" href="'.route('users.edit', [$user->organization->slug, $user->slug]).'">
    				  <i class="fa fa-edit"></i>
    				</a>

    				<form class="d-inline" action="'.route('users.destroy', [$user->organization->slug, $user->slug]).'" method="post">
    				  '.csrf_field().method_field("DELETE").'
    				  <button class="btn btn-sm btn-danger '.(Gate::denies('users.delete', $user) ? 'disabled' : '').'" type="submit" onclick="return '.(Gate::allows('users.delete', $user) ? "confirm('Apakah anda yakin?')" : 'false').'">
    				    <i class="fa fa-trash"></i>
    				  </button>
    				</form>
    			';
    		})
    		->addColumn('action', function($user){
    			return '
    				<a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#user'.$user->id.'">
    				  <i class="fa fa-address-card"></i>Detail
    				</a>

    				<a class="btn btn-sm btn-info '.(Gate::denies('users.update', $user) ? 'disabled' : '').'" href="'.route('users.edit', [$user->organization->slug, $user->slug]).'">
    				  <i class="fa fa-edit"></i>Edit
    				</a>

    				<form class="d-inline" action="'.route('users.destroy', [$user->organization->slug, $user->slug]).'" method="post">
    				  '.csrf_field().method_field("DELETE").'
    				  <button class="btn btn-sm btn-danger '.(Gate::denies('users.delete', $user) ? 'disabled' : '').'" type="submit" onclick="return '.(Gate::allows('users.delete', $user) ? "confirm('Apakah anda yakin?')" : 'false').'">
    				    <i class="fa fa-trash"></i>Hapus
    				  </button>
    				</form>

    				<!-- The Modal -->
    				<div class="modal fade" id="user'.$user->id.'">
    				  <div class="modal-dialog modal-dialog-centered">
    				    <div class="modal-content">

    				      <!-- Modal Header -->
    				      <div class="modal-header bg-info">
    				        <h4 class="modal-title text-white">Detail Relawan</h4>
    				        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
    				      </div>

    				      <!-- Modal body -->
    				      <div class="modal-body">
    				        <div class="row py-2">
    				          <span class="col-4"><b>Organisasi :</b></span>
    				          <span class="col-8 text-right">'.$user->organization->name.'</span>
    				        </div>
    				        <div class="row py-2">
    				          <span class="col-4"><b>Nama :</b></span>
    				          <span class="col-8 text-right">'.$user->name.'</span>
    				        </div>
    				        <div class="row py-2">
    				          <span class="col-4"><b>Alamat Lengkap :</b></span>
    				          <span class="col-8 text-right">'.$user->present()->fullAddress.'</span>
    				        </div>

    				        '.(Gate::allows('users.view', $user->organization) ? '
    				        <div class="row py-2">
    				          <span class="col-4"><b>Email :</b></span>
    				          <span class="col-8 text-right">'.$user->email.'</span>
    				        </div>
    				        <div class="row py-2">
    				          <span class="col-4"><b>Nomor HP / WA :</b></span>
    				          <span class="col-8 text-right">'.$user->phone.'</span>
    				        </div>
    				        ' : '').'

    				        <div class="row py-2">
    				          <span class="col-4"><b>Role / Peran :</b></span>
    				          <span class="col-8 text-right">'.$user->present()->roleFormatted.'</span>
    				        </div>
    				        <div class="row py-2">
    				          <span class="col-4"><b>Status :</b></span>
    				          <span class="col-8 text-right">'.$user->present()->statusFormatted.'</span>
    				        </div>
    				      </div>

    				    </div>
    				  </div>
    				</div>
    			';
    		})
    		->make(true);
    }
}
