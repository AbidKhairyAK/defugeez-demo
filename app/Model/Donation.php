<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Http\Presenter\DonationPresenter;
use Carbon\Carbon;

class Donation extends Model
{
    use PresentableTrait;

    protected $presenter = DonationPresenter::class;

    protected $fillable = [
    	'user_id', 'name', 'target', 'image', 'description', 'status', 'limit'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function transfers()
    {
    	return $this->hasMany(Transfer::class);
    }

    public function setTargetAttribute($value)
    {
        $result = str_replace(".", "", "$value");
        $this->attributes['target'] = intval($result);
    }

    public function setLimitAttribute($value)
    {
        $dates = explode('-', $value);
        $formatted_date = Carbon::create($dates[2], $dates[1], $dates[0], '00', '00', '00')->toDateString();

        $this->attributes['limit'] = $formatted_date;
    }
}
