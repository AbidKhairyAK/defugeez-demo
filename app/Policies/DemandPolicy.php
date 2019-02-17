<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Demand;
use Illuminate\Auth\Access\HandlesAuthorization;

class DemandPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the demand.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Demand  $demand
     * @return mixed
     */
    public function view(User $user, Demand $demand)
    {
        return $user->hasPermission('view-demand');
    }

    /**
     * Determine whether the user can create demands.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-demand');
    }

    /**
     * Determine whether the user can update the demand.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Demand  $demand
     * @return mixed
     */
    public function update(User $user, Demand $demand)
    {
        return $user->hasPermission('update-demand');
    }

    /**
     * Determine whether the user can delete the demand.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Demand  $demand
     * @return mixed
     */
    public function delete(User $user, Demand $demand)
    {
        return $user->hasPermission('delete-demand');
    }

    /**
     * Determine whether the user can restore the demand.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Demand  $demand
     * @return mixed
     */
    public function restore(User $user, Demand $demand)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the demand.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Demand  $demand
     * @return mixed
     */
    public function forceDelete(User $user, Demand $demand)
    {
        //
    }
}
