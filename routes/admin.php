<?php

Route::group(['prefix' => 'admin'], function() {

    Route::get('/login', '\App\Admin\Http\Controllers\LoginController@index')->name('/admin/login');
    Route::post('/login', '\App\Admin\Http\Controllers\LoginController@login');
    Route::get('/logout', '\App\Admin\Http\Controllers\LoginController@logout');

      Route::group(['middleware' => 'auth:admin'], function(){
        Route::get('/home', '\App\Admin\Http\Controllers\HomeController@index');
        Route::get('/retpass', '\App\Admin\Http\Controllers\HomeController@retpassword');
        Route::post('/retpass', '\App\Admin\Http\Controllers\HomeController@retpass');
        Route::get('/add', '\App\Admin\Http\Controllers\HomeController@add');
        Route::post('/add', '\App\Admin\Http\Controllers\HomeController@add_admin');
        Route::get('/account/list', '\App\Admin\Http\Controllers\HomeController@account');
        Route::get('/account/zhuang/{account}', '\App\Admin\Http\Controllers\HomeController@zhuan');





        Route::get('/article', '\App\Admin\Http\Controllers\ArticleController@index');
        Route::get('/article/add', '\App\Admin\Http\Controllers\ArticleController@add');
        Route::post('/article/add', '\App\Admin\Http\Controllers\ArticleController@add_article');
        Route::get('/article/{Article}/edi', '\App\Admin\Http\Controllers\ArticleController@edi_article');
        Route::post('/article/{Article}/edi', '\App\Admin\Http\Controllers\ArticleController@updata_article');

        Route::get('/article/{Article}/del', '\App\Admin\Http\Controllers\ArticleController@del_article');
        Route::post('/article/cate', '\App\Admin\Http\Controllers\ArticleController@create');
        Route::get('/article/cate', '\App\Admin\Http\Controllers\ArticleController@cate');
        Route::get('/article/{ArticleCate}/edit', '\App\Admin\Http\Controllers\ArticleController@edit_cate');
        Route::post('/article/{ArticleCate}/edit', '\App\Admin\Http\Controllers\ArticleController@updata_cate');

        Route::get('/store/list', '\App\Admin\Http\Controllers\StoreController@list');
        Route::get('/store/status', '\App\Admin\Http\Controllers\StoreController@status');

        Route::get('/store/{store}/allow', '\App\Admin\Http\Controllers\StoreController@allow');
        Route::get('/store/{store}/unallow', '\App\Admin\Http\Controllers\StoreController@unallow');
        Route::get('/store/{store}/lock', '\App\Admin\Http\Controllers\StoreController@lock');
        Route::get('/store/{store}/unlock', '\App\Admin\Http\Controllers\StoreController@unlock');

        Route::get('/shop/cate/list.html', '\App\Admin\Http\Controllers\ShopController@cate_list');
        Route::post('/shop/cate/add', '\App\Admin\Http\Controllers\ShopController@cate_add');
        Route::get('/shop/cate/{goodscate}/del', '\App\Admin\Http\Controllers\ShopController@cate_del');
        Route::get('/shop/cate/{goodscate}/edi', '\App\Admin\Http\Controllers\ShopController@cate_edi');
        Route::post('/shop/cate/{goodscate}/edi', '\App\Admin\Http\Controllers\ShopController@cate_updata');
        Route::get('/shop/goods/list', '\App\Admin\Http\Controllers\ShopController@goods_list');
        Route::get('/shop/goods/goods_cate/{id}', '\App\Admin\Http\Controllers\ShopController@goods_cate');
        Route::get('/shop/goods/goods_delect/{id}', '\App\Admin\Http\Controllers\ShopController@goods_delect');




        Route::get('/shop/navi/list', '\App\Admin\Http\Controllers\NavigationController@list');
        Route::post('/shop/navi/add', '\App\Admin\Http\Controllers\NavigationController@navi_add');
        Route::get('/shop/navi/{navigation}/del', '\App\Admin\Http\Controllers\NavigationController@navi_del');
        Route::get('/shop/navi/{navigation}/edi', '\App\Admin\Http\Controllers\NavigationController@navi_edi');
        Route::post('/shop/navi/{navigation}/edi', '\App\Admin\Http\Controllers\NavigationController@navi_updata');

        Route::get('/shop/banner/list', '\App\Admin\Http\Controllers\BannerController@list');
        Route::post('/shop/banner/add', '\App\Admin\Http\Controllers\BannerController@banner_add');
        Route::get('/shop/banner/{banner}/del', '\App\Admin\Http\Controllers\BannerController@banner_del');
        Route::get('/shop/banner/{banner}/edi', '\App\Admin\Http\Controllers\BannerController@banner_edi');
        Route::post('/shop/banner/{banner}/edi', '\App\Admin\Http\Controllers\BannerController@banner_updata');




        Route::get('/order/list', '\App\Admin\Http\Controllers\OrderController@list');
        Route::get('/order/{order}', '\App\Admin\Http\Controllers\OrderController@status');







      });

});
