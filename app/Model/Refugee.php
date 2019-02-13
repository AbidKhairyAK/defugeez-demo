<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Refugee extends Model
{
    protected $fillable = [
    	'user_id', 'post_id', 'event_id', 'name', 'gender', 'origin', 'birthdate', 'health', 'status', 'blood_type', 'barrack', 'description'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }

    public function setBirthdateAttribute($value)
    {
        $dates = explode('-', $value);
        $formatted_date = Carbon::create($dates[2], $dates[1], $dates[0], '00', '00', '00')->toDateString();

        $this->attributes['birthdate'] = $formatted_date;
    }

    public function getBirthdateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function statusLabel()
    {
    	$index = $this->status - 1;
    	$color = ['success', 'info', 'warning', 'danger'];
    	$name = ['di tempat', 'sudah pulang', 'pindah posko', 'hilang'];
    	$status = '<span class="badge badge-'.$color[$index].'">'.$name[$index].'</span>';

    	return $status;
    }

    public function healthLabel()
    {
    	$index = $this->health - 1;
    	$color = ['success', 'warning', 'danger', 'secondary'];
    	$name = ['sehat', 'sakit ringan', 'sakit parah', 'meninggal'];
    	$health = '<span class="badge badge-'.$color[$index].'">'.$name[$index].'</span>';

    	return $health;
    }
}
