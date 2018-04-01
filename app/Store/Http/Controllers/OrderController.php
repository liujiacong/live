<?php

namespace App\Store\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function list(){
    if(isset($_GET['id'])){
       $me = \Auth::user();
       $Order = Order::where(['store_id'=>$me->id,'order_status'=>$_GET['id']])->orderBy('created_at','desc')->paginate(8);
      // dd($Invoice);

        return view('/store/order/list',compact('Order','me'));
    }
      $me = \Auth::user();
      $Order = Order::where(['store_id'=>$me->id])->orderBy('created_at','desc')->paginate(8);
      // dd($Invoice);

        return view('/store/order/list',compact('Order','me'));
    }
    public function detail(Order $Order){
      // dd($Order);
    	$this->authorize('admin', $Order);
    	// dd($Invoice);
        return view('/store/order/detail',compact('Order'));

    }
    public function fahuo(Order $Order){
      $this->authorize('admin', $Order);
      $Order->shipping_status=1;
      $Order->order_status=2;
      $Order->shipping_time=date('Y-m-d H:i:s',time());
      $Order->save();
       return back();
     }
     public function pay(Order $Order){
      $this->authorize('admin', $Order);
      $Order->pay_status=1;
      $Order->save();
       return back();
     }
}
