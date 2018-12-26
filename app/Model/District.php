<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function getNameAttribute($value)
    {
    	return title_case($value);
    }
}
