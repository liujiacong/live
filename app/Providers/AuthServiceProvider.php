<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
          'App\User_address' => 'App\Policies\AddressPolicy',
          'App\GoodsType' => 'App\Policies\TypePolicy',
          'App\GoodsCate' => 'App\Policies\CatePolicy',
          'App\GoodsAttribute' => 'App\Policies\AttrPolicy',
          'App\Spec' => 'App\Policies\SpecPolicy',
          'App\Goods' => 'App\Policies\GoodsPolicy',
          'App\Cart' => 'App\Policies\CartPolicy',
          'App\Order' => 'App\Policies\OrderPolicy',
          'App\Comment' => 'App\Policies\CommentPolicy',
      






    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
