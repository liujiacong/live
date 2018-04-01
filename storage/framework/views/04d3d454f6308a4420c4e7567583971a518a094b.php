<!DOCTYPE html><?php echo $__env->make('layout.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>校园-live</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="/css/tpshop.css">
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link href="/css/common.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/jh.css">
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/global.js"></script>
    <script src="/js/pc_common.js"></script>
    <script src="/js/layer/layer.js"></script>
    <link rel="stylesheet" href="/css/layer.css" id="layui_layer_skinlayercss" style="">
</head>

  <body>
    <div class="fn-cart-pay">
      <div class="wrapper1190">
        <div class="layout after-ta order-ha">
          <div class="erhuh">
            <i class="icon-succ"></i>
            <h3>订单提交成功，请您尽快付款！</h3>
            <p class="succ-p">订单号：&nbsp;&nbsp;<?php echo e($order->order_sn); ?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; 付款金额（元）：&nbsp;&nbsp;
              <b><?php echo e($order->total_price); ?></b>&nbsp;
              <b>元</b>
            </p>
            <?php $__currentLoopData = $order->OrderGoods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="succ-tip">&nbsp;&nbsp;
              <b><?php echo e($val->goods_name); ?></b>&nbsp;<?php echo e($val->spec_key_name); ?> &nbsp;数量：<?php echo e($val->goods_num); ?> &nbsp;总价：<?php echo e($val->goods_num*$val->goods_price); ?>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
          <form action="/pay/order/<?php echo e($order->id); ?>" method="post" id="cart4_form">
              <?php echo e(csrf_field()); ?>

            <div class="orde-sjyy">
              <h3 class="titls">选择支付方式</h3>
              <div class="bsjy-g">
                <dl>
                  <dd>
                    <div class="order-payment-area">
                      <div class="dsfzfpte">
                        <b>选择支付方式</b>
                      </div>
                      <div class="po-re dsfzf-ee">
                        <ul>
                          <li>
                            <div class="payment-area">
                              <input type="radio" id="input-ALIPAY-1" value="alipay" class="radio vam" name="pay_code">
                              <label for="">
                                <img src="/img/alipay.jpg" width="120" height="40" onclick="change_pay(this);"></label>
                            </div>
                          </li>
                          <li>
                            <div class="payment-area">
                              <input type="radio" id="input-ALIPAY-1" value="cod" class="radio vam" name="pay_code">
                              <label for="">
                                <img src="/img/hdfk.jpg" width="120" height="40" onclick="change_pay(this);"></label>
                            </div>
                          </li>
                          <li>
                            <!-- <div class="payment-area">
                              <input type="radio" id="input-ALIPAY-1" value="wechat" class="radio vam" name="pay_code">
                              <label for="">
                                <img src="/img/wechat.jpg" width="120" height="40" onclick="change_pay(this);"></label>
                            </div> -->
                          </li>


                        </ul>
                      </div>
                    </div>
                  </dd>
                </dl>
                <div class="order-payment-action-area">
                  <a class="button-style-5 button-confirm-payment" href="javascript:void(0);" onclick="$('#cart4_form').submit();">确认支付方式</a></div>
              </div>
            </div>
            <input type="hidden" name="master_order_sn" value="<?php echo e($order->order_sn); ?>">
            <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
          </form>
        </div>
      </div>
    </div>
    <script>$(document).ready(function() {
        $("input[name='pay_code']").first().trigger('click');
      });
      // 切换支付方式
      function change_pay(obj) {
        $(obj).parent().siblings('input[name="pay_code"]').trigger('click');
      }</script>
      <?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </body>

</html>
