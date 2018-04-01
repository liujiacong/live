<?php

namespace App\Http\Controllers;
use Pay;
use log;
use App\Order;
use App\OrderGoods;
use App\SpecGoodsPrice;
use App\Goods;
use App\User;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PayController extends Controller
{
    public function index(order $order)
    {
// dd($order);
          $order_alipay = [
              'id'=>$order->id,
              'out_trade_no' => $order->order_sn,
              'total_amount' => $order->total_price,
              'subject' => '校园-live订单'.$order->order_sn.'支付',
          ];

        $alipay = Pay::alipay()->web($order_alipay);

        return $alipay;// laravel 框架中请直接 `return $alipay`
    }

    public function return(Request $request)
    {
        $data = Pay::alipay()->verify(); // 是的，验签就这么简单！

        // 订单号：$data->out_trade_no
        // 支付宝交易号：$data->trade_no
        // 订单总金额：$data->total_amount
        $order=Order::where('order_sn',$data->out_trade_no)->first();
        $order->pay_code='alipay';
        $order->pay_status='1';
        $order->order_status='1';
        $order->pay_name='支付宝支付';
        $order->pay_time=date("Y-m-d H:i:s",time());
        $order->save();
        $this->goods_status($order->id);
        $account=new Account();
        $account->user_id=$order->user_id;
        $account->type=0;
        $account->status=1;
        $account->money=$order->total_price;
        $account->note='支付宝支付';
        $account->save();

        return redirect("/user/order_detail/$order->id");

    }

    public function notify(Request $request)
    {
        $alipay = Pay::alipay();

        try{
            $data = $alipay->verify(); // 是的，验签就这么简单！

            // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
            // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）；
            // 4、验证app_id是否为该商户本身。
            // 5、其它业务逻辑情况

            Log::debug('Alipay notify', $data->all());
        } catch (Exception $e) {
            // $e->getMessage();
        }

        return $alipay->success();// laravel 框架中请直接 `return $alipay->success()`
    }

    //wechatpay
    public function wechatindex(order $order)
    {
      
        $order_wechat = [
            'out_trade_no' => $order->order_sn,
            'total_fee' => $order->total_price*100, // **单位：分**
            'body' => '校园-live订单'.$order->order_sn.'支付',

        ];

        $result = Pay::wechat()->scan($order_wechat);
        $qr = $result->code_url;//获取二维码
        return view('pay/pay',compact('qr','order'));



        // $pay->appId
        // $pay->timeStamp
        // $pay->nonceStr
        // $pay->package
        // $pay->signType
    }

    public function wechatnotify(request $request)
    {

        $pay = Pay::wechat();

        // try{
            // $data = $pay->verify(); // 是的，验签就这么简单！
        //     Log::debug('Wechat notify', $data);
        // } catch (Exception $e) {
        //     $e->getMessage();
        // }

// $pay->getsignkey();
        Cache::forever('key',123456);
        return $pay->success();// laravel 框架中请直接 `return $pay->success()`
    }
    public function payment(order $order,request $request){
      $this->authorize('update', $order);
        if($this->chek_goods($order->id)){
        if($request->pay_code=='cod'){
          $order->pay_code='cod';
          $order->pay_name='货到付款';
          $order->order_status=1;
          $order->save();
          $this->goods_status($order->id);
          return view('pay/pay_success',compact('order'));
        }elseif($request->pay_code=='wechat'){

          return redirect("/wechatpay/$order->id");
        }elseif($request->pay_code=='alipay'){
          return redirect("/alipay/$order->id");

        } 
        }else{
            echo "<script>alert('库存不足')</script>";
             echo "<script>window.history.go(-1);</script>";
          exit(); //
        }

      // dd($order);
 
    }
    public function goods_status($id){
        $order=Order::find($id);
        $order_goods=OrderGoods::where('order_id',$order->id)->first();
        $goods=Goods::find($order_goods->goods_id);
        $goods->sale_count=$goods->sale_count+$order_goods->goods_num;
        $goods->store_count=$goods->store_count-$order_goods->goods_num;
        $goods->save();
        $SpecGoodsPrice=SpecGoodsPrice::where(['goods_id'=> $order_goods->goods_id,'key'=>$order_goods->spec_key])->first();
        $SpecGoodsPrice->store_count=$SpecGoodsPrice->store_count-$order_goods->goods_num;
        $SpecGoodsPrice->save();
        if($order->pay_code=='alipay'){
            $user=User::find($goods->user_id);
            $user->guodu_money=$user->guodu_money+$order->total_price;
            $user->save();
            $account=new Account();
            $account->user_id=$goods->user_id;
            $account->type=2;
            $account->status=3;
            $account->money=$order->total_price;
            $account->note='出售商品-已添加到过度余额';
            $account->save();
        }
         Cache::forget("goods[$goods->id]");
        }

    
    public function chek_goods($id){
        $order_goods=OrderGoods::where('order_id',$id)->first();
        $SpecGoodsPrice=SpecGoodsPrice::where(['goods_id'=> $order_goods->goods_id,'key'=>$order_goods->spec_key])->first();
        if($SpecGoodsPrice->store_count-$order_goods->goods_num>=0){
            return true;
        }else{
            return false;
        }
        
         Cache::forget("goods[$goods->id]");
    }

}
