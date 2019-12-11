<?php

namespace App\Policies;

use App\User;
use App\Bottle;
use Illuminate\Auth\Access\HandlesAuthorization;

class BottlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any bottles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the bottle.
     *
     * @param  \App\User  $user
     * @param  \App\Bottle  $bottle
     * @return mixed
     */
    public function view(User $user, Bottle $bottle)
    {
        //
    }

    /**
     * Determine whether the user can create bottles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the bottle.
     *
     * @param  \App\User  $user
     * @param  \App\Bottle  $bottle
     * @return mixed
     */
    public function update(User $user, Bottle $bottle)
    {
        //
    }

    /**
     * Determine whether the user can delete the bottle.
     *
     * @param  \App\User  $user
     * @param  \App\Bottle  $bottle
     * @return mixed
     */
    public function delete(User $user, Bottle $bottle)
    {
        //
    }

    /**
     * Determine whether the user can restore the bottle.
     *
     * @param  \App\User  $user
     * @param  \App\Bottle  $bottle
     * @return mixed
     */
    public function restore(User $user, Bottle $bottle)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the bottle.
     *
     * @param  \App\User  $user
     * @param  \App\Bottle  $bottle
     * @return mixed
     */
    public function forceDelete(User $user, Bottle $bottle)
    {
        //
    }
}
