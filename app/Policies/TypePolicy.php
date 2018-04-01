<?php

namespace App\Policies;

use App\User;
use App\GoodsType;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the goodsType.
     *
     * @param  \App\User  $user
     * @param  \App\GoodsType  $goodsType
     * @return mixed
     */
    public function view(User $user, GoodsType $goodsType)
    {
        //
    }

    /**
     * Determine whether the user can create goodsTypes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the goodsType.
     *
     * @param  \App\User  $user
     * @param  \App\GoodsType  $goodsType
     * @return mixed
     */
    public function update(User $user, GoodsType $goodsType)
    {
        return $user->id === $goodsType->user_id;
    }

    /**
     * Determine whether the user can delete the goodsType.
     *
     * @param  \App\User  $user
     * @param  \App\GoodsType  $goodsType
     * @return mixed
     */
    public function delete(User $user, GoodsType $goodsType)
    {
        //
    }
}
