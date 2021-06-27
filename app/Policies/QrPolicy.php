<?php

namespace App\Policies;

use App\Models\Qr;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QrPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the qr can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list qrs');
    }

    /**
     * Determine whether the qr can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Qr  $model
     * @return mixed
     */
    public function view(User $user, Qr $model)
    {
        return $user->hasPermissionTo('view qrs');
    }

    /**
     * Determine whether the qr can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create qrs');
    }

    /**
     * Determine whether the qr can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Qr  $model
     * @return mixed
     */
    public function update(User $user, Qr $model)
    {
        return $user->hasPermissionTo('update qrs');
    }

    /**
     * Determine whether the qr can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Qr  $model
     * @return mixed
     */
    public function delete(User $user, Qr $model)
    {
        return $user->hasPermissionTo('delete qrs');
    }

    /**
     * Determine whether the qr can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Qr  $model
     * @return mixed
     */
    public function restore(User $user, Qr $model)
    {
        return false;
    }

    /**
     * Determine whether the qr can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Qr  $model
     * @return mixed
     */
    public function forceDelete(User $user, Qr $model)
    {
        return false;
    }
}
