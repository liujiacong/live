<?php

namespace App\admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
class OrderController extends Controller
{
    public function list(){
    	if(isset($_GET['id'])){
       $me = \Auth::user();
       $order = Order::where(['order_status'=>$_GET['id']])->orderBy('created_at','desc')->paginate(8);
      // dd($Invoice);

        return view('/admin/order/list',compact('order'));
    }
    	  $order=Order::orderBy('created_at','desc')->paginate(8);
    	return view('/admin/order/list',compact('order'));
    }
    public function status(order $order){
    	// dd($order);
    	return view('/admin/order/status',compact('order'));

    }
}
