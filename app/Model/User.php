<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laracasts\Presenter\PresentableTrait;
use App\Http\Presenter\UserPresenter;

class User extends Authenticatable
{
    use Notifiable;
    use PresentableTrait;

    protected $presenter = UserPresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'organization_id', 'nik', 'address', 'province_id', 'regency_id', 'district_id', 'village_id', 'phone', 'status', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function hasPermission($permission)
    {
        return $this->role->permissions()->where('slug', $permission)->exists();
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function refugees()
    {
        return $this->hasMany(Refugee::class);
    }

    public function demands()
    {
        return $this->hasMany(Demand::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }

    public function proof()
    {
        return $this->hasOne(Proof::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
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

    public function setPasswordAttribute($value)
    {
    	$this->attributes['password'] = bcrypt($value);
    }
}
