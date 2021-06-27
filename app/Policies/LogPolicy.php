<?php

namespace App\Policies;

use App\Models\Log;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the log can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list logs');
    }

    /**
     * Determine whether the log can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Log  $model
     * @return mixed
     */
    public function view(User $user, Log $model)
    {
        return $user->hasPermissionTo('view logs');
    }

    /**
     * Determine whether the log can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create logs');
    }

    /**
     * Determine whether the log can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Log  $model
     * @return mixed
     */
    public function update(User $user, Log $model)
    {
        return $user->hasPermissionTo('update logs');
    }

    /**
     * Determine whether the log can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Log  $model
     * @return mixed
     */
    public function delete(User $user, Log $model)
    {
        return $user->hasPermissionTo('delete logs');
    }

    /**
     * Determine whether the log can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Log  $model
     * @return mixed
     */
    public function restore(User $user, Log $model)
    {
        return false;
    }

    /**
     * Determine whether the log can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Log  $model
     * @return mixed
     */
    public function forceDelete(User $user, Log $model)
    {
        return false;
    }
}
