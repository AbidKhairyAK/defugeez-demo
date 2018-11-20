<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
  protected $fillable = [
    'user_id', 'name', 'province_id', 'regency_id', 'district_id', 'village_id', 'damage', 'description', 'status'
  ];
}
