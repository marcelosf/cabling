<?php

namespace App\Policies;

use App\User;
use App\Entities\Local;
use Illuminate\Auth\Access\HandlesAuthorization;

class LocalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the local.
     *
     * @param  \App\User  $user
     * @param  \App\Local  $local
     * @return mixed
     */
    public function view(User $user, Local $local)
    {
        //
    }

    /**
     * Determine whether the user can create locals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the local.
     *
     * @param  \App\User  $user
     * @param  \App\Local  $local
     * @return mixed
     */
    public function update(User $user, Local $local)
    {
        //
    }

    /**
     * Determine whether the user can delete the local.
     *
     * @param  \App\User  $user
     * @param  \App\Local  $local
     * @return mixed
     */
    public function delete(User $user, Local $local)
    {
        //
    }

    /**
     * Determine whether the user can restore the local.
     *
     * @param  \App\User  $user
     * @param  \App\Local  $local
     * @return mixed
     */
    public function restore(User $user, Local $local)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the local.
     *
     * @param  \App\User  $user
     * @param  \App\Local  $local
     * @return mixed
     */
    public function forceDelete(User $user, Local $local)
    {
        //
    }
}
