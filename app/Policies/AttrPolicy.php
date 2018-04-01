<?php

namespace App\Policies;

use App\User;
use App\GoodsAttribute;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttrPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the goodsAttribute.
     *
     * @param  \App\User  $user
     * @param  \App\GoodsAttribute  $goodsAttribute
     * @return mixed
     */
    public function view(User $user, GoodsAttribute $goodsAttribute)
    {
        //
    }

    /**
     * Determine whether the user can create goodsAttributes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the goodsAttribute.
     *
     * @param  \App\User  $user
     * @param  \App\GoodsAttribute  $goodsAttribute
     * @return mixed
     */
    public function update(User $user, GoodsAttribute $goodsAttribute)
    {
        return $user->id === $goodsAttribute->user_id;
    }

    /**
     * Determine whether the user can delete the goodsAttribute.
     *
     * @param  \App\User  $user
     * @param  \App\GoodsAttribute  $goodsAttribute
     * @return mixed
     */
    public function delete(User $user, GoodsAttribute $goodsAttribute)
    {
        //
    }
}
