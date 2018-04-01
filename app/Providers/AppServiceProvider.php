<?php

namespace App\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use \App\GoodsCate;
use \App\Navigation;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cate=GoodsCate::where(['user_id'=>'-1','is_show'=>1])->orderBy('order','desc')->get();
        View::share('cate',$cate);
        $navi=Navigation::where('is_show',1)->orderBy('order','desc')->get();
        View::share('navi',$navi);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
