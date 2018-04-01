@include('layout.head')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的订单</title>
	<link rel="stylesheet" type="text/css" href="/css/account.css">
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/js/account.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">


  <link rel="stylesheet" type="text/css" href="/css/tpshop.css" />
 <link rel="stylesheet" type="text/css" href="/css/myaccount.css" />
 <script src="/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
 <script src="/js/layer/layer.js" type="text/javascript"></script>
 <script src="/js/global.js" type="text/javascript"></script>
 <link rel="stylesheet" href="/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
 <link rel="stylesheet" type="text/css" href="/css/base.css"/>
</head>
<body>
	<div class="content">
		<div class="dingbu"><span>当前位置：<a href="javascript:;">首页</a> > <a href="javascript:;">用户中心</a> > <a href="javascript:;">我的账户</a></span></div>
		<div class="one">
			<ul>
               <li ><a href="/user/me" >首页</a></li>
                <li id="bian"><a href="/user/order/0">我的订单</a></li>
                <li><a href="/user/address">收货地址</a></li>
                <li><a href="/user/myaccount">我的账户</a></li>
                <li><a href="/user/safe">账户安全</a></li>
                <li><a href="/user/collection">我的收藏</a></li>
                @if($me->has_store)
                <li><a href="/store/home/index" target="_black">高级管理</a></li>
                @endif
      </ul>
		</div>
		<div class="mid">

      <div class="ri-menu fr">
  <div class="menumain p">
    <div class="navitems2 p" id="navitems5">
      <ul>
        <li>
          <a href="/user/order/0" class="selected">全部订单</a></li>
        <li>
          <a href="/user/order/1" class="">待付款</a></li>
        <li>
          <a href="/user/order/2" class="">待发货</a></li>
        <li>
          <a href="/user/order/3" class="">待收货</a></li>
          <li>
          <a href="/user/order/4" class="">已完成</a></li>
          <li>
          <a href="/user/order/5" class="">已取消</a></li>
        <li>
          <a href="/user/order/6" class="">待评论</a></li>
        </ul>
      <div class="wrap-line" style="width: 130px; left: 10px;">
        <span style="left:15px;"></span>
      </div>
    </div>

    <div class="orderbook-list">
      <div class="book-tit">
        <ul>
          <li class="sx1">商品信息</li>
          <li class="sx2">单价</li>
          <li class="sx3">数量</li>
          <li class="sx4">支付总金额</li>
          <li class="sx5 s5clic">订单状态
            <i class="jt-x"></i></li>
          <li class="sx6">操作</li></ul>
      </div>
      <div class="hid-derei">
        <ul>
          <li>
            <a href="/user/order/0">全部订单</a></li>
          <li>
            <a href="/user/order/1">待付款</a></li>
          <li>
            <a href="/user/order/2">待发货</a></li>
          <li>
            <a href="/user/order/3">待收货</a></li>
          <li>
            <a href="/home/Order/comment/status/0.html">待评论</a></li>
          <li>
            <a href="/user/order/4">已完成</a></li>
          <li>
            <a href="/user/order/5">已取消</a></li>
        </ul>
      </div>
    </div>
    <div class="order-alone-li lastset_cm">
      @foreach($order_list as $key=>$val)
      <table width="100%" border="" cellspacing="" cellpadding="">
        <tbody>
          <tr class="time_or">
            <td colspan="6">
              <div class="fl_ttmm">
                <span class="time-num">下单时间：
                  <em class="num">{{$val->created_at}}</em></span>
                <span class="time-num">订单编号：
                  <em class="num">{{$val->order_sn}}</em></span>
                  <div class="paysoon">
                      @if($val->pay_status==0 && $val->order_status==0 && $val->pay_code =="")
                        <a class="ps_lj" href="/carto3/{{$val->id}}" target="_blank">立即支付</a>
                        <a class="consoorder" href="javascript:void(0);" onclick="cancel_order({{$val->id}})">取消订单</a>
                      @endif
                      @if($val->shipping_status==1 && $val->order_status==0)
                       <a class="ps_lj" href="javascript:;" onclick="order_confirm({$list.order_id});">确认收货</a></if>
                      @endif

                  </div>
              </div>
              <div class="fr_ttmm"></div>
            </td>
          </tr>
          @foreach($val->OrderGoods as $key2=>$val2)
          @if($key2==0)
          <tr class="conten_or">
            <td class="sx1">
              <div class="shop-if-dif">
                <div class="shop_name">
                  <a href="/item/{{$val2->goods_id}}">{{$val2->goods_name}}  &nbsp;&nbsp;&nbsp;规格:{{$val2->spec_key_name}}</a></div>
              </div>
            </td>
            <td class="sx2">
              <span>￥</span>
              <span>{{$val2->goods_price}}</span></td>
            <td class="sx3">
              <span>x{{$val2->goods_num}}</span></td>
            <td class="sx4" rowspan="2">
              <div class="pric_rhz">
                <p class="d_pri">
                  <span>￥</span>
                  <span class="total_price">{{$val->total_price}}</span></p>

                <p class="d_yzo">
                  <a href="javascript:void(0);">{{$val->pay_name}}</a></p>
              </div>
            </td>
            <td class="sx5" rowspan="2">
              <div class="detail_or">
                @if($val->order_status==0)
                <p class="d_yzo">待支付</p>
                @elseif($val->order_status==1)
                <p class="d_yzo">代发货</p>
                @elseif($val->order_status==2)
                <p class="d_yzo">待收货</p>
                @elseif($val->order_status==3)
                <p class="d_yzo">已取消</p>
                @elseif($val->order_status==4)
                <p class="d_yzo">代评价</p>
                @elseif($val->order_status==5)
                <p class="d_yzo">已完成</p>

                @endif
                <p>
                  <a href="/user/order_detail/{{$val->id}}">查看详情</a>
                </p>
              </div>
            </td>
            <td class="sx6" rowspan="2">
              <div class="rbac">
                <p class="">
                  <a href="/item/{{$val2->goods_id}}">再次购买</a></p>
                  @if($val->order_status==4)
                  <p class="inspect">
                  <a href="/order/comment/{{$val->id}}">评价</a> </p>
                  @endif
                   @if($val->order_status==2)
                  <p class="inspect">
                  <a href="/queren/{{$val->id}}">确认收货</a> </p>
                  @endif
              </div>
            </td>
          </tr>
          @else
          <tr class="conten_or">
            <td class="sx1">
              <div class="shop-if-dif">
                <div class="shop_name">
                  <a href="/item/{{$val2->goods_id}}">{{$val2->goods_name}} &nbsp;&nbsp;&nbsp;规格:{{$val2->spec_key_name}}</a></div>
              </div>
            </td>
            <td class="sx2">
              <span>￥</span>
              <span>{{$val2->goods_price}}</span></td>
            <td class="sx3">
              <span>x{{$val2->goods_num}}</span></td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
      @endforeach

    </div>
      {{ $order_list->links() }}
  </div>

  <div class="operating fixed" id="bottom">
    <div class="fn_page clearfix">
      <div class="dataTables_paginate paging_simple_numbers">
        <ul class="pagination"></ul>
      </div>
    </div>
  </div>
</div>




		</div>
	</div>
  @include('layout.footer')
  
</body>
<script type="text/javascript">
$(function(){
  $('.s5clic').click(function(){
      $('.hid-derei').slideToggle(400);
      $(this).animate({opacity:"1"},200,function(){
          $(this).toggleClass('sxbb')
      })
  })
})
//取消订单
   function cancel_order(id){
       layer.confirm('确定取消订单?', {
                   btn: ['确定','取消'] //按钮
               }, function(){
                   // 确定
                   location.href = "/user/cancel_order/"+id;
               }
       );
   }
</script>
</html>
