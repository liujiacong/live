
<html>
  <head>
    <meta charset="UTF-8">
    <title>订单详情</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="/css/tpshop.css">
    <link rel="stylesheet" type="text/css" href="/css/myaccount.css">
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="/css/layer.css" id="layuicss-skinlayercss">
  </head>

  <body class="bg-f5">
    <script src="/js/global.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/css/location.css" type="text/css">
    <!-- 收货地址，物流运费 -->
    <script src="/js/layer.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <style>.list1 li{float:left;}</style>
    <script src="/js/common.js"></script>
    <div class="home-index-middle">
      <div class="w1224">
        
        <div class="home-main">
          <div class="com-topyue">
            <div class="wacheng fl">
              <p class="ddn1">
                <span>订单号：</span>
                <span>{{$order->order_sn}}</span></p>

                @if($order->pay_status==0 && $order->order_status==0 && $order->pay_code =="")
                <h1 class="ddn2">待支付</h1>
                <a class="ddn3" style="margin-top:20px;" href="/carto3/{{$order->id}}">立即付款</a>
                @elseif($order->order_status==3)
                <h1 class="ddn2">已取消</h1>
                @elseif($order->order_status==0 && $order->pay_code!="")
                <p class="ddn2">待发货</p>
                @elseif($order->order_status==4)
                <p class="ddn2">已完成</p>
                @endif

            </div>
            <div class="wacheng2 fr">
              <p class="dd2n">感谢您在校园-live购物，欢迎您对本次交易及所购商品进行评价。</p>
              <div class="liuchaar p">
                <ul>
                  <li>
                    <div class="aloinfe">
                      <i class="y-comp"></i>
                      <div class="ddfon">
                        <p>提交订单</p>
                        <p>{{$order->created_at}}</p>

                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="y-comp91 top322"></i>
                  </li>
                  <li>
                    <div class="aloinfe fime1">
                      <i class="y-comp2
                      @if($order->pay_time=='')
                      lef64
                      @endif"></i>
                      <div class="ddfon">
                        <p>付款成功</p>
                        <p>{{$order->pay_time}}</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="y-comp91 top322"></i>
                  </li>
                  <li>
                    <div class="aloinfe fime2">
                      <i class="y-comp3 lef64"></i>
                      <div class="ddfon">
                        <p>卖家发货</p>
                        <p>{{$order->shipping_time}}</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="y-comp91 top322"></i>
                  </li>
                  <li>
                    <div class="aloinfe fime3">
                      <i class="y-comp4 lef64"></i>
                      <div class="ddfon">
                        <p>等待收货</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="y-comp91 top322"></i>
                  </li>
                  <li>
                    <div class="aloinfe fime4">
                      <i class="y-comp5 lef64"></i>
                      <div class="ddfon">
                        <p>完成</p>
                        <p>{{$order->comfirm_time}}</p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="home-main ma-to-20">
          <div class="rshrinfmas">
            <div class="spff">
              <h2>收货人信息</h2>
              <div class="psbaowq">
                <p>
                  <span class="fircl">收货人：</span>
                  <span class="lascl">{{$order->consignee}}</span></p>
                <p>
                  <span class="fircl">地址：</span>
                  <span class="lascl">{{$order->province}},{{$order->city}},{{$order->district}},{{$order->address}}</span></p>
                <p>
                  <span class="fircl">手机号码：</span>
                  <span class="lascl">{{$order->mobile}}</span></p>
              </div>
            </div>
            <div class="spff">
              <h2>买家留言：</h2>
              <div class="psbaowq">

                  <span class="lascl">{{$order->user_note}}</span>
                </p>
              </div>
            </div>
            <div class="spff">
              <h2>付款信息</h2>
              <div class="psbaowq">
                <p>
                  <span class="fircl">付款方式：</span>
                  <span class="lascl">{{$order->pay_name}}</span>
                </p>
                <p>
                  <span class="fircl">付款时间：</span>
                  <span class="lascl">
                    @if($order->pay_status==0)
                    未付款
                    @else
                    已付款
                    @endif
                  </span></p>
                <p>
                  <span class="fircl">商品总额：</span>
                  <span class="lascl">
                    <em>￥</em>{{$order->total_price}}</span></p>
                    </div>
            </div>
          </div>
        </div>
        <div class="beenovercom">
          <div class="shoptist">

          </div>
          <div class="orderbook-list">
            <div class="book-tit">
              <ul>
                <li class="sx1">商品</li>
                <li class="sx2">购买单价;</li>
                <li class="sx3">商品数量</li>
                <li class="sx4">&nbsp;</li>
                <li class="sx5">小计</li>
                <li class="sx6">状态</li></ul>
            </div>
          </div>
          <div class="order-alone-li">
            @foreach($order->OrderGoods as $key=>$val)
            <table width="100%" border="" cellspacing="" cellpadding="">
              <tbody>
                <tr class="conten_or">
                  <td class="sx1">
                    <div class="shop-if-dif">
                      <div class="cebigeze">
                        <div class="shop_name">
                          <a href="/item/{{$val->goods_id}}">{{$val->goods_name}}</a></div>
                        <p class="mayxl">{{$val->spec_key_name}}</p></div>
                    </div>
                  </td>
                  <td class="sx2">￥{{$val->goods_price}}</td>
                  <td class="sx3">

                    <span>{{$val->goods_num}}</span></td>
                  <td class="sx4">
                    <span>&nbsp;</span></td>
                  <td class="sx5">
                    <span>￥{{$val->goods_num*$val->goods_price}}</span></td>
                  <td class="sx6">
                    <div class="twrbac">
                      @if($val->is_send==0)
                      <p>未发货</p>
                      @else
                      <p>已发货</p>
                      @endif
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            @endforeach
          </div>
        </div>
        <div class="numzjsehe">
          <p>
            <span class="sp_tutt">商品总额：</span>
            <span class="smprice">
              <em>￥</em>{{$order->total_price}}</span></p>
          <p>
            <span class="sp_tutt">应付总额：</span>
            <span class="smprice red">
              <em>￥</em>{{$order->total_price}}</span></p>
        </div>
      </div>
    </div>
   
  </body>

</html>
