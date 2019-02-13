<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    	'user_id', 'name', 'province_id', 'regency_id', 'damage', 'description', 'status', 'latitude', 'longitude'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function refugees()
    {
        return $this->hasMany(Refugee::class);
    }

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

    public function damageColor()
    {
    	$index = $this->damage - 1;
    	$backgroud = [ 'danger', 'warning', 'info', 'success'];
    	return $backgroud[$index];
    }

    public function damageName()
    {
    	$index = $this->damage - 1;
    	$name = [ 'Sangat Parah', 'Parah', 'Medium', 'Ringan'];
    	return $name[$index];
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
