<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Event  $event
     * @return mixed
     */
    public function view(User $user, Event $event)
    {
        
    }

    /**
     * Determine whether the user can create events.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role <= 2;
    }

    /**
     * Determine whether the user can update the event.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Event  $event
     * @return mixed
     */
    public function update(User $user, Event $event)
    {
        return ($user->role == 1) || ($user->id == $event->user_id);
    }

    /**
     * Determine whether the user can delete the event.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Event  $event
     * @return mixed
     */
    public function delete(User $user, Event $event)
    {
        return ($user->role == 1) || ($user->id == $event->user_id);
    }

    /**
     * Determine whether the user can restore the event.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Event  $event
     * @return mixed
     */
    public function restore(User $user, Event $event)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the event.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Event  $event
     * @return mixed
     */
    public function forceDelete(User $user, Event $event)
    {
        //
    }
}
