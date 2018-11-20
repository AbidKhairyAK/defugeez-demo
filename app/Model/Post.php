<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
    	'user_id', 'organization_id', 'disaster_id', 'name', 'address', 'province_id', 'regency_id', 'district_id', 'village_id', 'capacity', 'barracks', 'demands', 'description', 'status'
    ];
}
