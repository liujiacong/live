<?php echo $__env->make('layout.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的订单</title>
	<link rel="stylesheet" type="text/css" href="/css/account.css">
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/js/account.js"></script>

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
		<div class="dingbu"><span>当前位置：<a href="javascript:;">首页</a> > <a href="javascript:;">我的趣云购</a> > <a href="javascript:;">我的账户</a></span></div>
		<div class="one">
			<ul>
				<li><a href="/user/me" >首页</a></li>
                <li id="bian"><a href="/user/order">我的订单</a></li>
                <li><a href="../yungoujilu1/yungoujilu1.html">我的评价</a></li>
                <li><a href="../shaidan/shaidan.html">我的晒单</a></li>
                <li><a href="../tongzhi/tongzhi.html">通知消息</a></li>
                <li><a href="../shouhuoadd/shouhuoadd.html">收货地址</a></li>
                <li ><a href="../gerenziliao/gerenziliao.html">个人资料</a></li>
                <li ><a href="/user/myaccount">我的账户</a></li>
                <li ><a href="../zhanghaosafe/zhanghaosafe.html">账户安全</a></li>
                <li><a href="../CDK/CDK.html">CDK兑换</a></li>
                <li><a href="../renwuxin/renwuxin.html">任务中心</a></li>
			</ul>
		</div>
		<div class="mid">

      <div class="ri-menu fr">
  <div class="menumain p">
    <div class="navitems2 p" id="navitems5">
      <ul>
        <li>
          <a href="/user/order" class="selected">全部订单</a></li>
        <li>
          <a href="/home/Order/order_list/type/WAITPAY.html" class="">待付款</a></li>
        <li>
          <a href="/home/Order/order_list/type/WAITSEND.html" class="">待发货</a></li>
        <li>
          <a href="/home/Order/order_list/type/WAITRECEIVE.html" class="">待收货</a></li>
        <li>
          <a href="/home/Order/comment/status/0.html" class="">待评论</a></li>
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
            <a href="/user/order">全部订单</a></li>
          <li>
            <a href="/home/Order/order_list/type/WAITPAY.html">待付款</a></li>
          <li>
            <a href="/home/Order/order_list/type/WAITSEND.html">待发货</a></li>
          <li>
            <a href="/home/Order/order_list/type/WAITRECEIVE.html">待收货</a></li>
          <li>
            <a href="/home/Order/comment/status/0.html">待评论</a></li>
          <li>
            <a href="/home/Order/order_list/type/FINISH.html">已完成</a></li>
          <li>
            <a href="/home/Order/order_list/type/CANCEL.html">已取消</a></li>
        </ul>
      </div>
    </div>
    <div class="order-alone-li lastset_cm">
      <table width="100%" border="" cellspacing="" cellpadding="">
        <tbody>
          <tr class="time_or">
            <td colspan="6">
              <div class="fl_ttmm">
                <span class="time-num">下单时间：
                  <em class="num">2018-02-03 21:57:52</em></span>
                <span class="time-num">订单编号：
                  <em class="num">201802032157526016</em></span>

                <div class="paysoon">
                  <!--<div class="dele" onclick="verConfirm('确认删除该订单?','/Home/Order/del_order/order_id/1510.html')"></div>-->
                  <!--<div class="dele"></div>--></div>
              </div>
              <div class="fr_ttmm"></div>
            </td>
          </tr>
          <tr class="conten_or">
            <td class="sx1">
              <div class="shop-if-dif">
                <div class="shop-difimg">
                  <img src="/public/upload/goods/thumb/46/goods_thumb_46_60_60.jpeg" width="60" height="60"></div>
                <div class="shop_name">
                  <a href="/Home/Goods/goodsInfo/id/46.html">【北京移动老用户专享 话费六折】荣耀畅玩5X 双卡双待 移动版 智能手机（破晓银）</a></div>
              </div>
            </td>
            <td class="sx2">
              <span>￥</span>
              <span>999.00</span></td>
            <td class="sx3">
              <span>x2</span></td>
            <td class="sx4" rowspan="2">
              <div class="pric_rhz">
                <p class="d_pri">
                  <span>￥</span>
                  <span>3631.00</span></p>
                <p class="d_yzo">
                  <spna>含运费：</spna>
                  <span>45.00</span></p>
                <p class="d_yzo">
                  <a href="javascript:void(0);">到货付款</a></p>
              </div>
            </td>
            <td class="sx5" rowspan="2">
              <div class="detail_or">
                <p class="d_yzo">已取消</p>
                <p>
                  <a href="/home/Order/order_detail/id/1510.html">查看详情</a></p>
              </div>
            </td>
            <td class="sx6" rowspan="2">
              <div class="rbac">
                <p class="">
                  <a href="/Home/Goods/goodsInfo/id/46.html">再次购买</a></p>
              </div>
            </td>
          </tr>
          <tr class="conten_or">
            <td class="sx1">
              <div class="shop-if-dif">
                <div class="shop-difimg">
                  <img src="/public/upload/goods/thumb/41/goods_thumb_41_60_60.jpeg" width="60" height="60"></div>
                <div class="shop_name">
                  <a href="/Home/Goods/goodsInfo/id/41.html">华为（HUAWEI） M2 8英寸平板电脑（1920×1200 IPS屏 海思麒麟930 16GB WiFi）香槟金</a></div>
              </div>
            </td>
            <td class="sx2">
              <span>￥</span>
              <span>1588.00</span></td>
            <td class="sx3">
              <span>x1</span></td>
          </tr>
        </tbody>
      </table>
      <table width="100%" border="" cellspacing="" cellpadding="">
        <tbody>
          <tr class="time_or">
            <td colspan="6">
              <div class="fl_ttmm">
                <span class="time-num">下单时间：
                  <em class="num">2018-02-03 21:47:42</em></span>
                <span class="time-num">订单编号：
                  <em class="num">201802032147428683</em></span>
                <!--<span class="time-num">卖家：<a href="tencent://message/?uin=&Site=TPshop商城&Menu=yes"><em class="num"><i class="ear"></i></em></a></span>-->
                <div class="paysoon">
                  <!--<div class="dele" onclick="verConfirm('确认删除该订单?','/Home/Order/del_order/order_id/1509.html')"></div>-->
                  <!--<div class="dele"></div>--></div>
              </div>
              <div class="fr_ttmm"></div>
            </td>
          </tr>
          <tr class="conten_or">
            <td class="sx1">
              <div class="shop-if-dif">
                <div class="shop-difimg">
                  <img src="/public/upload/goods/thumb/40/goods_thumb_40_60_60.jpeg" width="60" height="60"></div>
                <div class="shop_name">
                  <a href="/Home/Goods/goodsInfo/id/40.html">荣耀X2 标准版 双卡双待双通 移动/联通双4G 16GB ROM（月光银）</a></div>
              </div>
            </td>
            <td class="sx2">
              <span>￥</span>
              <span>1000.00</span></td>
            <td class="sx3">
              <span>x1</span>
              <a href="/Home/Order/return_goods/rec_id/1773.html" class="applyafts">申请售后</a></td>
            <td class="sx4" rowspan="1">
              <div class="pric_rhz">
                <p class="d_pri">
                  <span>￥</span>
                  <span>1025.00</span></p>
                <p class="d_yzo">
                  <spna>含运费：</spna>
                  <span>25.00</span></p>
                <p class="d_yzo">
                  <a href="javascript:void(0);">到货付款</a></p>
              </div>
            </td>
            <td class="sx5" rowspan="1">
              <div class="detail_or">
                <p class="d_yzo">已完成</p>
                <p>
                  <a href="/home/Order/order_detail/id/1509.html">查看详情</a></p>
              </div>
            </td>
            <td class="sx6" rowspan="1">
              <div class="rbac">
                <p class="">
                  <a href="/Home/Goods/goodsInfo/id/40.html">再次购买</a></p>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
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
</script>
</html>
