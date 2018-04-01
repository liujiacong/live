<?php

namespace App;
use App\SpecGoodsPrice;
use App\Goods;
use \App\Model;
use App\OrderGoods;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    function get_order_sn(){
      $order_sn = null;
	    // 保证不会有重复订单号存在
	    while(true){
	        $order_sn = date('YmdHis').rand(1000,9999); // 订单编号
	        $order_sn_chek  = DB::table('orders')
                                ->where(['order_sn'=>$order_sn])
                                ->get()->toArray();
	        if(!$order_sn_chek)
	            break;
	    }
	    return $order_sn;
    }
    function addOrder($user_id,$address_id,$user_note='',$item_id,$num){
      $address = \App\User_address::find($address_id);
      $value=SpecGoodsPrice::find($item_id);
      $goods=Goods::find($value->goods_id);
      $order_sn = $this->get_order_sn();
      $order=new Order();
      $order->order_sn=$order_sn;
      $order->user_id=$user_id;
      $order->store_id=$goods->user_id;
      $order->consignee=$address->consignee;
      $order->province=$address->province;
      $order->city=$address->city;
      $order->district=$address->district;
      $order->address=$address->address;
      $order->mobile=$address->mobile;
      $order->zipcode=$address->zipcode;
      $order->total_price=$value->price*$num;
      $order->user_note=$user_note;
      $res=$order->save();
      if(!$res){
			return array('status'=>-8,'msg'=>'添加订单失败','result'=>NULL);
		}

      $ordergoods=new OrderGoods();
      $ordergoods->order_id=$order->id;
      $ordergoods->store_id=$goods->user_id;
      $ordergoods->goods_id=$value->goods_id;
      $ordergoods->goods_name=$goods->goods_title;
      $ordergoods->goods_num=$num;
      $ordergoods->goods_price=$value->price;
      $ordergoods->market_price=$goods->market_Price;
      $ordergoods->spec_key=$value->key;
      $ordergoods->spec_key_name=$value->key_name;
      $ordergoods->save();
  
  

    return array('status'=>1,'msg'=>'提交订单成功','result'=>$order->id); // 返回新增的订单id

    }
    public function OrderGoods()
    {
        return $this->hasMany('App\OrderGoods');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
