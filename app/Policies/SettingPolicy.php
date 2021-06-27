<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the setting can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list settings');
    }

    /**
     * Determine whether the setting can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Setting  $model
     * @return mixed
     */
    public function view(User $user, Setting $model)
    {
        return $user->hasPermissionTo('view settings');
    }

    /**
     * Determine whether the setting can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create settings');
    }

    /**
     * Determine whether the setting can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Setting  $model
     * @return mixed
     */
    public function update(User $user, Setting $model)
    {
        return $user->hasPermissionTo('update settings');
    }

    /**
     * Determine whether the setting can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Setting  $model
     * @return mixed
     */
    public function delete(User $user, Setting $model)
    {
        return $user->hasPermissionTo('delete settings');
    }

    /**
     * Determine whether the setting can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Setting  $model
     * @return mixed
     */
    public function restore(User $user, Setting $model)
    {
        return false;
    }

    /**
     * Determine whether the setting can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Setting  $model
     * @return mixed
     */
    public function forceDelete(User $user, Setting $model)
    {
        return false;
    }
}
