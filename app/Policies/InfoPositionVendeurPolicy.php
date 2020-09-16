<?php

namespace App\Policies;

use App\InfoPositionVendeur;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InfoPositionVendeurPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\InfoPositionVendeur  $infoPositionVendeur
     * @return mixed
     */
    public function view(User $user, InfoPositionVendeur $infoPositionVendeur)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\InfoPositionVendeur  $infoPositionVendeur
     * @return mixed
     */
    public function update(User $user, InfoPositionVendeur $infoPositionVendeur)
    {
        return $user->id === $infoPositionVendeur->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\InfoPositionVendeur  $infoPositionVendeur
     * @return mixed
     */
    public function delete(User $user, InfoPositionVendeur $infoPositionVendeur)
    {
        return $user->id === $infoPositionVendeur->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\InfoPositionVendeur  $infoPositionVendeur
     * @return mixed
     */
    public function restore(User $user, InfoPositionVendeur $infoPositionVendeur)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\InfoPositionVendeur  $infoPositionVendeur
     * @return mixed
     */
    public function forceDelete(User $user, InfoPositionVendeur $infoPositionVendeur)
    {
        //
    }
}
