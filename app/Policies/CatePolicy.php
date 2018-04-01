<?php

namespace App\Policies;

use App\User;
use App\GoodsCate;
use Illuminate\Auth\Access\HandlesAuthorization;

class CatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the goodsCate.
     *
     * @param  \App\User  $user
     * @param  \App\GoodsCate  $goodsCate
     * @return mixed
     */
    public function view(User $user, GoodsCate $goodsCate)
    {
        //
    }

    /**
     * Determine whether the user can create goodsCates.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the goodsCate.
     *
     * @param  \App\User  $user
     * @param  \App\GoodsCate  $goodsCate
     * @return mixed
     */
    public function update(User $user, GoodsCate $goodsCate)
    {
        return $user->id === $goodsCate->user_id;
    }

    /**
     * Determine whether the user can delete the goodsCate.
     *
     * @param  \App\User  $user
     * @param  \App\GoodsCate  $goodsCate
     * @return mixed
     */
    public function delete(User $user, GoodsCate $goodsCate)
    {
        //
    }
}
