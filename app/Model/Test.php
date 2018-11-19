<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
    	'username', 'email', 'password', 'class', 'status', 'desc'
    ];
}
