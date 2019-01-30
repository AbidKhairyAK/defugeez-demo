<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'user_id', 'organization_id', 'event_id', 'name', 'pic', 'address', 'province_id', 'regency_id', 'district_id', 'village_id', 'capacity', 'barracks', 'description', 'status', 'latitude', 'longitude'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function refugees()
    {
        return $this->hasMany(Refugee::class);
    }

    public function demands()
    {
        return $this->hasMany(Demand::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function statusColor()
    {
        $index = $this->status;
        $backgroud = [ 'warning', 'success' ];
        return $backgroud[$index];
    }

    public function statusName()
    {
        $index = $this->status;
        $name = [ 'Nonaktif', 'Aktif'];
        return $name[$index];
    }
}
