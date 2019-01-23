<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Refugee;
use Illuminate\Auth\Access\HandlesAuthorization;

class RefugeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the refugee.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Refugee  $refugee
     * @return mixed
     */
    public function view(User $user, Refugee $refugee)
    {
        //
    }

    /**
     * Determine whether the user can create refugees.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can update the refugee.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Refugee  $refugee
     * @return mixed
     */
    public function update(User $user, Refugee $refugee)
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can delete the refugee.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Refugee  $refugee
     * @return mixed
     */
    public function delete(User $user, Refugee $refugee)
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can restore the refugee.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Refugee  $refugee
     * @return mixed
     */
    public function restore(User $user, Refugee $refugee)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the refugee.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Refugee  $refugee
     * @return mixed
     */
    public function forceDelete(User $user, Refugee $refugee)
    {
        //
    }
}
