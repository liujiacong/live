<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', "\App\Http\Controllers\IndexController@index");
Route::get('/user/login', "\App\Http\Controllers\LoginController@index")->name('login');
Route::get('/user/logout', "\App\Http\Controllers\LoginController@logout");
Route::post('/user/login', "\App\Http\Controllers\LoginController@login");
Route::get('/user/register', "\App\Http\Controllers\LoginController@register");
Route::post('/user/register', "\App\Http\Controllers\LoginController@creat");
Route::get('/news/{article}', "\App\Http\Controllers\ArticleController@show");

Route::get('/shop/{store}', "\App\Http\Controllers\GoodsController@store");
Route::get('/shop/{store}/{cate_id}', "\App\Http\Controllers\GoodsController@cate");
Route::get('/cate/{id}', "\App\Http\Controllers\GoodsController@cates");
Route::post('/like', "\App\Http\Controllers\GoodsController@like_goods");

Route::get('/item/{goods}', "\App\Http\Controllers\GoodsController@goodsinfo");
Route::get('/ajax_comment/goods/{id}', "\App\Http\Controllers\GoodsController@ajax_comment");

//支付回调
Route::any('/wechat/notify', '\App\Http\Controllers\PayController@wechatnotify');
Route::post('/alipay/notify', '\App\Http\Controllers\PayController@notify');
Route::get('/alipay/return', '\App\Http\Controllers\PayController@return');

Route::get('/mail/send', '\App\Http\Controllers\MailController@send');




Route::group(['middleware' => 'auth:web'], function(){

    Route::post('/like/{id}','\App\Http\Controllers\GoodsController@like');
    Route::post('/unlike/{id}','\App\Http\Controllers\GoodsController@unlike');
    Route::get('/unlike/{id}','\App\Http\Controllers\GoodsController@dellike');
    


    Route::post('/addcart','\App\Http\Controllers\GoodsController@addcart');
    Route::post('/shopping','\App\Http\Controllers\GoodsController@shopping');
    Route::post('/shopping2order', '\App\Http\Controllers\GoodsController@shopping2order');
    


  //支付
  Route::get('/alipay/{order}', '\App\Http\Controllers\PayController@index');
  Route::get('/wechatpay/{order}', '\App\Http\Controllers\PayController@wechatindex');

  Route::post('/pay/order/{order}', '\App\Http\Controllers\PayController@payment');



  Route::get('/carto3/{order}', '\App\Http\Controllers\GoodsController@carto3');
  Route::get('/queren/{order}', '\App\Http\Controllers\OrderController@queren');


  Route::get('/ajaxaddr', '\App\Http\Controllers\GoodsController@ajaxaddr');
  Route::get('/ajaxedi/{user_address}', '\App\Http\Controllers\GoodsController@ediaddr');



  Route::get('/deletecart/{cart}', '\App\Http\Controllers\GoodsController@delectcart');
  Route::post('/updatecart/{cart}', '\App\Http\Controllers\GoodsController@updatecart');
  Route::post('/select/{cart}', '\App\Http\Controllers\GoodsController@select');
  Route::post('/unselect/{cart}', '\App\Http\Controllers\GoodsController@unselect');



  Route::get('/user/me', '\App\Http\Controllers\UserController@show');
  Route::post('/user/me', '\App\Http\Controllers\UserController@updata');
  Route::get('/user/myaccount', '\App\Http\Controllers\UserController@account');
  Route::get('/user/address', '\App\Http\Controllers\UserController@address');
  Route::post('/user/address/creat', '\App\Http\Controllers\UserController@creat');
  Route::post('/user/address/creattocart', '\App\Http\Controllers\UserController@creattocart');
  Route::get('/user/collection', '\App\Http\Controllers\UserController@collection');
  Route::get('/user/safe', '\App\Http\Controllers\UserController@safe');
  Route::get('/user/retpass', '\App\Http\Controllers\UserController@retpass');
  Route::post('/user/retpass', '\App\Http\Controllers\UserController@retpassword');

  Route::post('/user/tixian', '\App\Http\Controllers\UserController@tixian');
  Route::get('/user/qx_tixian/{account}', '\App\Http\Controllers\UserController@qx_tixian');





  Route::get('/user/order/{id}', '\App\Http\Controllers\OrderController@myorder');
  Route::get('/user/cancel_order/{order}', '\App\Http\Controllers\OrderController@cancel_order');
  Route::get('/user/order_detail/{order}', '\App\Http\Controllers\OrderController@order_detail');
  Route::get('/order/comment/{order}', '\App\Http\Controllers\OrderController@comment');//评价
  Route::post('/order/comment/{order}', '\App\Http\Controllers\OrderController@comment_submit');//评价





  Route::post('/user/address/{user_address}/edit', '\App\Http\Controllers\UserController@edit');
  Route::post('/user/address/{user_address}/store', '\App\Http\Controllers\UserController@store');
  Route::get('/user/address/{user_address}/delete', '\App\Http\Controllers\UserController@delete');
  Route::post('/user/address/{user_address}/default', '\App\Http\Controllers\UserController@default');
  Route::get('/user/creatstore', '\App\Http\Controllers\UserController@creatstore');
  Route::post('/user/creatstore', '\App\Http\Controllers\UserController@creat_store');
//以下模型 规格 属性 删除尚未做
  Route::group(['prefix' => 'store','middleware' => 'Checkhas_store'], function(){
    Route::get('/home/index','\App\Store\Http\Controllers\HomeController@index');

    Route::get('/my/order_list','\App\Store\Http\Controllers\OrderController@list');
    Route::get('/my/order/{order}','\App\Store\Http\Controllers\OrderController@detail');
    Route::get('/my/fahuo/{order}','\App\Store\Http\Controllers\OrderController@fahuo');
    Route::get('/my/pay/{order}','\App\Store\Http\Controllers\OrderController@pay');



    Route::get('/my/pinglun/','\App\Store\Http\Controllers\StoreController@pinglun');
    Route::get('/my/{comment}/is_show','\App\Store\Http\Controllers\StoreController@is_show');
    Route::get('/my/{comment}/is_notshow','\App\Store\Http\Controllers\StoreController@is_notshow');



    Route::get('/my/type_list','\App\Store\Http\Controllers\StoreController@type_list');
    Route::post('/my/type_add','\App\Store\Http\Controllers\StoreController@type_add');
    Route::get('/my/{GoodsType}/type_edi','\App\Store\Http\Controllers\StoreController@type_edi');
    Route::post('/my/{GoodsType}/type_updata','\App\Store\Http\Controllers\StoreController@type_updata');


    Route::get('/my/cate_list','\App\Store\Http\Controllers\StoreController@cate_list');
    Route::post('/my/cate_add','\App\Store\Http\Controllers\StoreController@cate_add');
    Route::get('/my/{GoodsCate}/cate_edi','\App\Store\Http\Controllers\StoreController@cate_edi');
    Route::post('/my/{GoodsCate}/cate_edi', '\App\Store\Http\Controllers\StoreController@cate_update');

    Route::get('/my/attr_cate/{id}','\App\Store\Http\Controllers\StoreController@attr_cate');
    Route::get('/my/attr_list','\App\Store\Http\Controllers\StoreController@attr_list');
    Route::post('/my/attr_add','\App\Store\Http\Controllers\StoreController@attr_add');
    Route::get('/my/{GoodsAttribute}/attr_edi','\App\Store\Http\Controllers\StoreController@attr_edi');
    Route::post('/my/{GoodsAttribute}/attr_update','\App\Store\Http\Controllers\StoreController@attr_update');

    Route::get('/my/spec_cate/{id}','\App\Store\Http\Controllers\StoreController@spec_cate');
    Route::get('/my/spec_list','\App\Store\Http\Controllers\StoreController@spec_list');
    Route::post('/my/spec_add','\App\Store\Http\Controllers\StoreController@spec_add');
    Route::get('/my/{Spec}/spec_edi','\App\Store\Http\Controllers\StoreController@spec_edi');
    Route::post('/my/{Spec}/spec_update','\App\Store\Http\Controllers\StoreController@spec_update');

    Route::get('/my/goods/list','\App\Store\Http\Controllers\GoodsController@list');
    Route::get('/my/goods/add','\App\Store\Http\Controllers\GoodsController@add');

    Route::post('/my/goods/spec','\App\Store\Http\Controllers\GoodsController@ajaxGetSpecSelect');
    Route::GET('/my/goods/spec','\App\Store\Http\Controllers\GoodsController@ajaxGetSpecSelect');

    Route::post('/my/goods/ajaxGetSpecInput','\App\Store\Http\Controllers\GoodsController@ajaxGetSpecInput');
    Route::get('/my/goods/ajaxGetSpecInput','\App\Store\Http\Controllers\GoodsController@ajaxGetSpecInput');

    Route::post('/my/goods/ajaxGetAttrInput','\App\Store\Http\Controllers\GoodsController@ajaxGetAttrInput');
    Route::get('/my/goods/ajaxGetAttrInput','\App\Store\Http\Controllers\GoodsController@ajaxGetAttrInput');

    Route::post('/my/goods/addgoods','\App\Store\Http\Controllers\GoodsController@addgoods');

    Route::get('/my/goods/{goods}/edit','\App\Store\Http\Controllers\GoodsController@editgoods');
    Route::post('/my/goods/{goods}/edit','\App\Store\Http\Controllers\GoodsController@updatagoods');

    Route::get('/my/goods/{goods}/delete','\App\Store\Http\Controllers\GoodsController@deletegoods');
    Route::get('/my/goods/{goods}/unsale','\App\Store\Http\Controllers\GoodsController@unsale');
    Route::get('/my/goods/{goods}/sale','\App\Store\Http\Controllers\GoodsController@sale');

    Route::get('/my/goods_cate/{id}','\App\Store\Http\Controllers\GoodsController@goods_cate');


   
    














  });



});



include_once("admin.php");



Route::get('/home', '\App\Http\Controllers\IndexController@index')->name('home');

