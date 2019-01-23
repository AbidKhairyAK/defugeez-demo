<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Organization;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\User  $model
     * @return mixed
     */
    public function view(User $user, Organization $organization)
    {
        return ($user->role == 1) || ($user->organization_id == $organization->id);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $user->role <= 2;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return ($user->role == 1) || ($user->id == $model->id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->role == 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
