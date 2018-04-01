<?php

namespace App\Policies;

use App\User;
use App\Spec;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpecPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the spec.
     *
     * @param  \App\User  $user
     * @param  \App\Spec  $spec
     * @return mixed
     */
    public function view(User $user, Spec $spec)
    {
        //
    }

    /**
     * Determine whether the user can create specs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the spec.
     *
     * @param  \App\User  $user
     * @param  \App\Spec  $spec
     * @return mixed
     */
    public function update(User $user, Spec $spec)
    {
        return $user->id === $spec->user_id;
    }

    /**
     * Determine whether the user can delete the spec.
     *
     * @param  \App\User  $user
     * @param  \App\Spec  $spec
     * @return mixed
     */
    public function delete(User $user, Spec $spec)
    {
        //
    }
}
