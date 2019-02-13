<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Http\Presenter\TransferPresenter;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use PresentableTrait;
    use SoftDeletes;

    protected $presenter = TransferPresenter::class;

    protected $fillable = [
    	'user_id', 'donation_id', 'bank', 'amount', 'account_number', 'status'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    protected $dates = ['deleted_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function donation()
    {
    	return $this->belongsTo(Donation::class);
    }

    public function proof()
    {
    	return $this->hasOne(Proof::class);
    }

    public function setAmountAttribute($value)
    {
        $fix = str_replace(".", "", "$value");
        $result = substr_replace($fix, rand(111,999), -3);

        $this->attributes['amount'] = intval($result);
    }
}
