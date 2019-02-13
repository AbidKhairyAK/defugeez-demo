<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    protected $fillable = [
    	'user_id', 'transfer_id', 'image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function transfer()
    {
    	return $this->belongsTo(Transfer::class);
    }
}
