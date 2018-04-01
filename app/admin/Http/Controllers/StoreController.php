<?php

namespace App\admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\User;
class StoreController extends Controller
{
  public function list(){
    $store=Store::paginate(10);
    return view('/admin/store/list',compact('store'));
  }
  public function status(){
    $store=Store::where('status', '<>',1)->paginate(10);
    return view('/admin/store/status',compact('store'));
  }
  public function allow(Store $store){
    $store->status=1;
    $user=User::find($store->user_id);
    $store->save();
    $user->has_store=1;
    $user->save();
    return back();
  }
  public function unallow(Store $store){
    $store->status=-1;
    $store->save();
    return back();
  }
  public function lock(Store $store){
    $store->status=-2;
    $store->save();
    return back();
  }
  public function unlock(Store $store){
    $store->status=1;
    $store->save();
    return back();
  }
}
