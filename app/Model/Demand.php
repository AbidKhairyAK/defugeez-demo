<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Http\Presenter\DemandPresenter;

class Demand extends Model
{
    use PresentableTrait;

    protected $presenter = DemandPresenter::class;

    protected $fillable = [
    	'user_id', 'post_id', 'name', 'type', 'status'
    ];
}
