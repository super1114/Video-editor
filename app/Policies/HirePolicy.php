<?php

namespace App\Policies;

use App\Models\Hire;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HirePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hire can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list hires');
    }

    /**
     * Determine whether the hire can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hire  $model
     * @return mixed
     */
    public function view(User $user, Hire $model)
    {
        return $user->hasPermissionTo('view hires');
    }

    /**
     * Determine whether the hire can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create hires');
    }

    /**
     * Determine whether the hire can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hire  $model
     * @return mixed
     */
    public function update(User $user, Hire $model)
    {
        return $user->hasPermissionTo('update hires');
    }

    /**
     * Determine whether the hire can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hire  $model
     * @return mixed
     */
    public function delete(User $user, Hire $model)
    {
        return $user->hasPermissionTo('delete hires');
    }

    /**
     * Determine whether the hire can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hire  $model
     * @return mixed
     */
    public function restore(User $user, Hire $model)
    {
        return false;
    }

    /**
     * Determine whether the hire can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hire  $model
     * @return mixed
     */
    public function forceDelete(User $user, Hire $model)
    {
        return false;
    }
}
