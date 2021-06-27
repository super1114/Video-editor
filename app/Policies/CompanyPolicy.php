<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Company;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the company can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list companies');
    }

    /**
     * Determine whether the company can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Company  $model
     * @return mixed
     */
    public function view(User $user, Company $model)
    {
        return $user->hasPermissionTo('view companies');
    }

    /**
     * Determine whether the company can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create companies');
    }

    /**
     * Determine whether the company can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Company  $model
     * @return mixed
     */
    public function update(User $user, Company $model)
    {
        return $user->hasPermissionTo('update companies');
    }

    /**
     * Determine whether the company can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Company  $model
     * @return mixed
     */
    public function delete(User $user, Company $model)
    {
        return $user->hasPermissionTo('delete companies');
    }

    /**
     * Determine whether the company can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Company  $model
     * @return mixed
     */
    public function restore(User $user, Company $model)
    {
        return false;
    }

    /**
     * Determine whether the company can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Company  $model
     * @return mixed
     */
    public function forceDelete(User $user, Company $model)
    {
        return false;
    }
}
