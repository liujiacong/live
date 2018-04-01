<?php

namespace App\Policies;

use App\User;
use App\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, order $order)
    {
        return $user->id === $order->user_id;
    }
    public function admin(User $user, order $order)
    {
        return $user->id === $order->store_id;
    }
}
