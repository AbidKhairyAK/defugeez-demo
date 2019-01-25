<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Refugee extends Model
{
    protected $fillable = [
    	'user_id', 'post_id', 'event_id', 'name', 'gender', 'origin', 'birthdate', 'health', 'status', 'blood_type', 'barrack', 'description'
    ];

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
