@include('layout.head')
<html lang="en"><head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="/css/tpshop.css">
    <link href="/css/common.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/jh.css">
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/global.js"></script>
    <script src="/js/pc_common.js"></script>
    <script src="/js/layer/layer.js">
    </script><link rel="stylesheet" href="/css/layer.css" id="layui_layer_skinlayercss" style="">
</head>
<body>

<div class="fn-cart-pay">
    <!-- cart-title -->
    <div class="wrapper1190">

        <!-- end cart-title -->

        <div class="layout after-ta order-ha">
            <div class="erhuh">
                <i class="icon-succ"></i>
                <h3> 订单提交成功，我们将在第一时间给你发货！</h3>
                <p class="succ-p">
                                            订单号：&nbsp;&nbsp;{{$order->order_sn}}&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                        付款金额（元）：&nbsp;&nbsp;<b>{{$order->total_price}}</b>&nbsp;<b>元</b>
                                    </p>
                <div class="succ-tip">
                  @foreach($order->OrderGoods as $key=>$val)
                  <div class="succ-tip">&nbsp;&nbsp;
                    <b><a href="/item/{{$val->goods_id}}">{{$val->goods_name}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$val->spec_key_name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数量：{{$val->goods_num}} &nbsp;&nbsp;&nbsp;&nbsp;总价：{{$val->goods_num*$val->goods_price}}</a>
                  </div>
                  @endforeach


                  <div class="succ-tip">&nbsp;&nbsp;
                  我们会尽量给你发货
                  </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div id="addCardNewBind"></div>





</body>
    @include('layout.footer')</html>
