<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Transfer;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransferPolicy
{
    use HandlesAuthorization;

    public function list(User $user)
    {
        return $user->hasPermission('view-transfer') && $user->id == 1;
    }

    /**
     * Determine whether the user can view the transfer.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Transfer  $transfer
     * @return mixed
     */
    public function view(User $user, Transfer $transfer)
    {
        return $user->hasPermission('view-transfer') && $user->id == $transfer->user_id;
    }

    /**
     * Determine whether the user can create transfers.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-transfer');
    }

    /**
     * Determine whether the user can update the transfer.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Transfer  $transfer
     * @return mixed
     */
    public function update(User $user, Transfer $transfer)
    {
        return $user->hasPermission('update-transfer') && $user->id == $transfer->user_id;
    }

    /**
     * Determine whether the user can delete the transfer.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Transfer  $transfer
     * @return mixed
     */
    public function delete(User $user, Transfer $transfer)
    {
        return $user->hasPermission('delete-transfer') && $user->id == $transfer->user_id;
    }

    /**
     * Determine whether the user can restore the transfer.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Transfer  $transfer
     * @return mixed
     */
    public function restore(User $user, Transfer $transfer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the transfer.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Transfer  $transfer
     * @return mixed
     */
    public function forceDelete(User $user, Transfer $transfer)
    {
        //
    }
}
