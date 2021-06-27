<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tanker;
use Illuminate\Auth\Access\HandlesAuthorization;

class TankerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tanker can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list tankers');
    }

    /**
     * Determine whether the tanker can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tanker  $model
     * @return mixed
     */
    public function view(User $user, Tanker $model)
    {
        return $user->hasPermissionTo('view tankers');
    }

    /**
     * Determine whether the tanker can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create tankers');
    }

    /**
     * Determine whether the tanker can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tanker  $model
     * @return mixed
     */
    public function update(User $user, Tanker $model)
    {
        return $user->hasPermissionTo('update tankers');
    }

    /**
     * Determine whether the tanker can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tanker  $model
     * @return mixed
     */
    public function delete(User $user, Tanker $model)
    {
        return $user->hasPermissionTo('delete tankers');
    }

    /**
     * Determine whether the tanker can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tanker  $model
     * @return mixed
     */
    public function restore(User $user, Tanker $model)
    {
        return false;
    }

    /**
     * Determine whether the tanker can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tanker  $model
     * @return mixed
     */
    public function forceDelete(User $user, Tanker $model)
    {
        return false;
    }
}
