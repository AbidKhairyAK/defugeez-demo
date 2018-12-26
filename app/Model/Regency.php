<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    public function getNameAttribute($value)
    {
    	return title_case($value);
    }
}
