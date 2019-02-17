<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Donation;
use Illuminate\Auth\Access\HandlesAuthorization;

class DonationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the donation.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Donation  $donation
     * @return mixed
     */
    public function view(User $user, Donation $donation)
    {
        return $user->hasPermission('view-donation');
    }

    /**
     * Determine whether the user can create donations.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-donation');
    }

    /**
     * Determine whether the user can update the donation.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Donation  $donation
     * @return mixed
     */
    public function update(User $user, Donation $donation)
    {
        return $user->hasPermission('update-donation') && $user->id == $donation->user_id;
    }

    /**
     * Determine whether the user can delete the donation.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Donation  $donation
     * @return mixed
     */
    public function delete(User $user, Donation $donation)
    {
        return $user->hasPermission('delete-donation') && $user->id == $donation->user_id;
    }

    /**
     * Determine whether the user can restore the donation.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Donation  $donation
     * @return mixed
     */
    public function restore(User $user, Donation $donation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the donation.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Donation  $donation
     * @return mixed
     */
    public function forceDelete(User $user, Donation $donation)
    {
        //
    }
}
