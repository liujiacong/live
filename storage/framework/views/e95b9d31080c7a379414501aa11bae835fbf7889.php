<html>
<head>
  <script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/jquery.qrcode.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>支付-{$tpshop_config['shop_info_store_title']}</title>
<meta name="keywords" content="{$tpshop_config['shop_info_store_keyword']}" />
<meta name="description" content="{$tpshop_config['shop_info_store_desc']}" />
<style type="text/css">
*{ margin:0; padding:0}
.wihe-ee{width:560px; height:420px; background:#FFF; padding:25px; color:#666; font-family:song,arial; font-size:14px; box-sizing:border-box; border-radius:6px; margin:0 auto; margin-top:10%}
.wihe-ee p{text-align:center}
.co999{color:#999}
.fo-si-18{font-size:18px}
.fail-fasu{float:left; width:200px; height:180px; padding-top:100px; background:url(__STATIC__/images/icon-pay.png) 50px 0 no-repeat; text-align:center}
.success-fasu{float:right; width:200px; height:180px; padding-top:100px; background:url(__STATIC__/images/icon-pay.png) -220px 0 no-repeat; text-align:center}
.fail-fasu a:hover{ background-color:#ee9775}
.fail-fasu a{padding:8px 24px; background-color:#f8a584; display:table; margin:0 auto; color:#fff; text-decoration:none; margin-top:10px}
.re-qtzfgg a,.success-fasu a{padding:8px 24px; background-color:#eee; display:table; margin:0 auto; color:#999; text-decoration:none; margin-top:10px}
.re-qtzfgg a{padding:8px 140px}
.re-qtzfgg a:hover,.success-fasu a:hover{background-color:#ddd;}
.fail-success{overflow:hidden; height:185px}
</style>
</head>
<body style="background-color:#666">
	<div class="tac-sd">
    	<div class="wihe-ee">
        	<p>
            	<span class="fo-si-18">打开手机微信扫一扫付款</span>
                <br>
                <span class="co999">付款完成前请不要关闭此窗口。完成付款后请根据您的情况点击下面的按钮。</span>
            </p>
            <br><br>
            <div class="fail-success">
            	<div class="fail-fasu">
                	支付完成
                    <br>
                    <a href="/user/order_detail/<?php echo e($order->id); ?>">支付成功</a>
                </div>
                <div class="fail-I-success" style="float:left">
                	  <div id="code" style="width:110px;height:110px;"></div>
                </div>
            	<div class="success-fasu">
                	支付遇到问题
                    <br>
                    <a href="/carto3/<?php echo e($order->id); ?>">支付失败</a>
                </div>
            </div>
            <div class="re-qtzfgg">
            	<a href="/carto3/<?php echo e($order->id); ?>">返回选择其他支付方式</a>
            </div>
        </div>
    </div>

</body>
<script>
$(function(){
  $("#code").qrcode({
  	render: "table", //table方式
  	width: 110, //宽度
  	height:110, //高度
  	text: "<?php echo e($qr); ?>" //任意内容
  });
});
/**
     * 检查订单状态
     */
function ajax_check_pay_status() {
    $.ajax({
        type: "post",
        url: "/index.php/Home/Api/check_order_pay_status.html",
        data: {
            master_order_id: "",
            order_id: "1523"
        },
        dataType: 'json',
        success: function(data) {
            if (data.status == 1) {
                clearInterval(interval);
                location.href = "/index.php/Home/Cart/cart4/order_id/1523.html";
            }
        }
    });
}
var interval = setInterval(ajax_check_pay_status, 5000);
</script>
</html>
