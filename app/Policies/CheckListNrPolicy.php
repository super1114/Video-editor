<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CheckListNr;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListNrPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the checkListNr can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list checklistnrs');
    }

    /**
     * Determine whether the checkListNr can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListNr  $model
     * @return mixed
     */
    public function view(User $user, CheckListNr $model)
    {
        return $user->hasPermissionTo('view checklistnrs');
    }

    /**
     * Determine whether the checkListNr can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create checklistnrs');
    }

    /**
     * Determine whether the checkListNr can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListNr  $model
     * @return mixed
     */
    public function update(User $user, CheckListNr $model)
    {
        return $user->hasPermissionTo('update checklistnrs');
    }

    /**
     * Determine whether the checkListNr can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListNr  $model
     * @return mixed
     */
    public function delete(User $user, CheckListNr $model)
    {
        return $user->hasPermissionTo('delete checklistnrs');
    }

    /**
     * Determine whether the checkListNr can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListNr  $model
     * @return mixed
     */
    public function restore(User $user, CheckListNr $model)
    {
        return false;
    }

    /**
     * Determine whether the checkListNr can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListNr  $model
     * @return mixed
     */
    public function forceDelete(User $user, CheckListNr $model)
    {
        return false;
    }
}
