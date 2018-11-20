<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // use Notifiable;
    
	protected $fillable = [
		'organization_id', 'nik', 'name', 'email', 'address', 'province_id', 'regency_id', 'district_id', 'village_id', 'phone', 'status', 'role', 'password'
	];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
    	$this->attributes['password'] = bcrypt($value);
    }
}
