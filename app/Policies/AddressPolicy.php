<?php

namespace App\Policies;

use App\User;
use App\user_address;
use App\GoodsCate;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
{
    use HandlesAuthorization;

    public function update(User $user, user_address $userAddress)
    {
        return $user->id === $userAddress->user_id;
    }
    public function type(User $user, GoodsCate $GoodsCate){
      return $user->id === $GoodsCate->user_id;
    }


}
