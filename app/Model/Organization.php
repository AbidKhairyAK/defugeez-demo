<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Http\Presenter\OrganizationPresenter;

class Organization extends Model
{
    use PresentableTrait;

    protected $presenter = OrganizationPresenter::class;

    protected $fillable = [
        'name', 'chairman', 'address', 'village_id', 'district_id', 'regency_id', 'province_id', 'email', 'phone', 'account_number', 'profile', 'logo'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
