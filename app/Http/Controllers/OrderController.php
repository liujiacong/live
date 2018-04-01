<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Goods;
use App\OrderGoods;
use App\Comment;
use App\User;

class OrderController extends Controller
{
  public function myorder($id){
    $me = \Auth::user();
      switch ($id)
        {
        case 1://代付
        $order_list=order::where(['user_id'=>$me->id,'order_status'=>0])
                          ->whereNull('pay_code')
                          ->orderBy('created_at', 'desc')
                          ->paginate(3);
          break;
        case 2://待发货
        $order_list=order::where(['user_id'=>$me->id,'order_status'=>1])
                          ->whereNotNull('pay_code')
                          ->orderBy('created_at', 'desc')
                          ->paginate(3);

          break;
        case 3://代收
        $order_list=order::where(['user_id'=>$me->id,'order_status'=>2])
                          ->whereNotNull('pay_code')
                          ->orderBy('created_at', 'desc')
                          ->paginate(3);

          break;
        case 4://已完成
        $order_list=order::where(['user_id'=>$me->id,'order_status'=>5])
                          ->orderBy('created_at', 'desc')
                          ->paginate(3);

            break;
        case 5://已取消
        $order_list=order::where(['user_id'=>$me->id,'order_status'=>3])
                          ->orderBy('created_at', 'desc')
                          ->paginate(3);
                break;
        case 6://代评价
        $order_list=order::where(['user_id'=>$me->id,'order_status'=>4])
                          ->orderBy('created_at','desc')
                          ->paginate(3);
                break;
        default:
        $order_list=order::where(['user_id'=>$me->id])->orderBy('created_at', 'desc')->paginate(3);
;
        }
        // dd($order_list);
        return view('order/order', compact('order_list','me'));


  }
  public function cancel_order(order $order){
    $this->authorize('update', $order);
    $order->order_status=3;
    $order->save();
    return back();

  }
  public function order_detail(order $order){
    $this->authorize('update', $order);
    return view('order/order_detail',compact('order'));
  }
   public function queren(order $order){
        $this->authorize('update', $order);
        $order->order_status=4;
        $order->confirm_time=date('Y-m-d H:i:s',time());
        $order->save();
        if($order->pay_code=='alipay'){
          $user=User::find($order->store_id);
          $user->money=$user->money+$order->total_price;
          $user->guodu_money=$user->guodu_money-$order->total_price;;
          $user->save();
        }
        return back();
    }
    public function comment(order $order){
        $this->authorize('update', $order);
        if($order->order_status==4 || $order->order_status==5){
        $OrderGoods=OrderGoods::where('order_id',$order->id)->first();
        $goods=Goods::find($OrderGoods->goods_id);
        // dd($goods);
        // dd($order);
        return view('order/comment', compact('order','goods'));
        }
        return back();
       
    }
    public function comment_submit(request $request,order $order){
          $this->authorize('update', $order);
          $me = \Auth::user();
          $comment=new Comment;
          $comment->store_id=$order->store_id;
          $comment->order_id=request('order_id');
          $comment->goods_id=request('goods_id');
          $comment->content=request('content');
          if(request('hide_username')){
             $comment->is_anonymous=1;
             $comment->user_name='匿名用户';
          }else{
          $comment->user_name=$me->name;
          }
          $comment->user_id=$me->id;
          $comment->save();
          $order->order_status=5;
          $order->save();
          $goods=Goods::find(request('goods_id'));
          $goods->comment_count=$goods->comment_count+1;
          $goods->save();
        return redirect('/user/order/0');
    }
}
