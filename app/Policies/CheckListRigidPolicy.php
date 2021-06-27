<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CheckListRigid;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListRigidPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the checkListRigid can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list checklistrigids');
    }

    /**
     * Determine whether the checkListRigid can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListRigid  $model
     * @return mixed
     */
    public function view(User $user, CheckListRigid $model)
    {
        return $user->hasPermissionTo('view checklistrigids');
    }

    /**
     * Determine whether the checkListRigid can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create checklistrigids');
    }

    /**
     * Determine whether the checkListRigid can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListRigid  $model
     * @return mixed
     */
    public function update(User $user, CheckListRigid $model)
    {
        return $user->hasPermissionTo('update checklistrigids');
    }

    /**
     * Determine whether the checkListRigid can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListRigid  $model
     * @return mixed
     */
    public function delete(User $user, CheckListRigid $model)
    {
        return $user->hasPermissionTo('delete checklistrigids');
    }

    /**
     * Determine whether the checkListRigid can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListRigid  $model
     * @return mixed
     */
    public function restore(User $user, CheckListRigid $model)
    {
        return false;
    }

    /**
     * Determine whether the checkListRigid can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListRigid  $model
     * @return mixed
     */
    public function forceDelete(User $user, CheckListRigid $model)
    {
        return false;
    }
}
