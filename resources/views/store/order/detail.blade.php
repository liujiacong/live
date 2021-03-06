
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
        <div class="g-crumbs">
         
          <span>
            <b>订单：{{$Order->order_sn}}</b>
          </span>
        </div>
        
        <div class="home-main ma-to-20">
          <div class="rshrinfmas">
            <div class="spff">
              <h2>收货人信息</h2>
              <div class="psbaowq">
                <p>
                  <span class="fircl">收货人：</span>
                  <span class="lascl">{{$Order->consignee}}</span></p>
                <p>
                  <span class="fircl">地址：</span>
                  <span class="lascl">{{$Order->province}},{{$Order->city}},{{$Order->district}},{{$Order->address}}</span></p>
                <p>
                  <span class="fircl">手机号码：</span>
                  <span class="lascl">{{$Order->mobile}}</span></p>
              </div>
            </div>
            <div class="spff">
              <h2>买家留言：</h2>
              <div class="psbaowq">

                  <span class="lascl">{{$Order->user_note}}</span>
                </p>
              </div>
            </div>
            <div class="spff">
              <h2>付款信息</h2>
              <div class="psbaowq">
                <p>
                  <span class="fircl">付款方式：</span>
                  <span class="lascl">{{$Order->pay_name}}</span>
                </p>
                <p>
                  <span class="fircl">付款时间：</span>
                  <span class="lascl">
                    {{$Order->created_at}}
  
                  </span></p>
                <p>
                  <span class="fircl">商品总额：</span>
                  <span class="lascl">
                    <em>￥</em>{{$Order->total_price}}</span></p>
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
            @foreach($Order->OrderGoods as $key=>$val)
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
                      @if($Order->shipping_status==0)
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
              <em>￥</em>{{$Order->total_price}}</span></p>
          <p>
            <span class="sp_tutt">应付总额：</span>
            <span class="smprice red">
              <em>￥</em>{{$Order->total_price}}</span></p>
        </div>
      </div>
    </div>
   
  </body>

</html>
