<!DOCTYPE html>
@include('layout.head')
<html id="ng-app"><head lang="zh"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=8">
    <link rel="stylesheet" type="text/css" href="/css/tpshop.css">
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <title>购物车</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/css/common.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/jh.css">
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/global.js"></script>
    <script src="/js/pc_common.js"></script>
    <script src="/js/layer.js"></script><link rel="stylesheet" href="/css/layer.css" id="layui_layer_skinlayercss" style="">
<style>
    a.disable {
        cursor: default;
        color: #e9e9e9;
    }
</style></head>

<body class="ng-scope">



<div class="fn-cart-clearing">
    <div class="wrapper1190">



        <div class="ui_tab">
            <!-- ngIf: !status.overseasEmpty -->
            <div class="ui_tab_content">
                <div class="clearing-c cart-content">
                    <div class="layout after-ta">
                        <div class="sc-list">
                              <div class="sc-pro-list" id="tpshop-cart">
                                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                    <tbody><tr class="ba-co-danhui">
                                        <th class="pa-le-9" align="center" valign="middle">&nbsp;&nbsp;</th>
                                        <th align="center" valign="middle" colspan="2">商品</th>
                                        <th align="center" valign="middle">市场价（元）</th>
                                        <th align="center" valign="middle">单价（元）</th>
                                                                                <th align="center" valign="middle">数量</th>
                                        <th align="center" valign="middle">小计（元）</th>
                                        <th align="center" valign="middle">操作</th>
                                    </tr>
                                    @foreach($cart as $key=>$value)
                                      <?php   $picture=unserialize($value->picture);   ?>
                                      <tr class="item-single" id="edge_{{$value->id}}">
                                            <td class="pa-le-9" style="border-right:0" align="center" valign="middle">
                                                <input class="check-box checkCart checkCartItem" name="checkItem" value="{{$value->id}}" type="checkbox" @if($value->select==1) checked='checked' @endif>
                                            </td>
                                            <td style="border-left:0px;;border-right:0px" class="pa-to-20 pa-bo-20 bo-ri-0" width="80px" align="center" valign="top">
                                                <a class="gwc-wp-list di-bl wi63 hi63" href="/item/{{$value->goods_id}}">
                                                    <img class="wi63 hi63" src="{{$picture[0]}}">
                                                </a>
                                            </td>
                                            <td style="border-left:0px; border-right:0px" class="pa-to-20 wi516" align="left">
                                                <p class="gwc-ys-pp">
                                                    <a href="/item/{{$value->goods_id}}" style="vertical-align:middle">{{$value->goods_name}}</a>
                                                </p>
                                                <p class="ggwc-ys-hs">{{$value->spec_key_name}}</p>
                                            </td>
                                            <td style="border-left:0px" align="center" valign="middle"><span>￥{{$value->market_Price}}</span></td>
                                            <td style="border-left:0px" align="center" valign="middle" id="cart_{{$value->id}}_goods_price">{{$value->goods_price}}</td>
                                            <td align="center" valign="middle" class="quantity-form">
                                                <div class="sc-stock-area">
                                                    <div class="stock-area">
                                                        <a class="decrement" onclick="" title="减">-</a>
                                                            <input class="wi43 fl" name="changeQuantity_{{$value->id}}" type="text" id="changeQuantity_{{$value->id}}" value="{{$value->goods_num}}">
                                                        <a class="increment" onclick="" title="加">+</a>
                                                    </div>
                                                    <em class="red" style="display: none">库存不足</em>
                                                </div>
                                            </td>
                                            <td align="center" valign="middle" id="cart_{{$value->id}}_market_price">{{($value->goods_num)*($value->goods_price)}}</td>
                                            <td align="center" valign="middle"><a class=" deleteGoods" data-cart-id="{{$value->id}}" href="javascript:void(0);">X</a></td>
                                        </tr>
                                        @endforeach
                                                                    </tbody></table>
                            </div>
                            <div class="sc-total-list ma-to-20 sc-pro-list">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr>
                                        <td class="pa-le-28 gwx-xm-dwz">
                                            <label>

                                            </label>
                                            <a href="javascript:void(0);" id="removeGoods"></a>
                                        </td>
                                        <td width="190" align="right">已选择：</td>
                                        <td width="69" align="right" id="goods_num">0件商品</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td width="190" align="right">共节省：</td>
                                        <td width="69" align="right" id="goods_fee">-￥0</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td width="190" align="right">合计（不含运费）：</td>
                                        <td width="69" align="right" id="total_fee">￥0</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody></table>
                            </div>
                            <div class="sc-acti-list ma-to-20 "> <a class="gwc-jxgw" href="javascript:history.go(-1);">继续购物</a>
                                <a class="gwc-qjs" onclick="gwc()" data-url="/carto">去结算</a>
                            </div>
                                                </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <script>
    Array.prototype.indexOf = function(val) {
        for (var i = 0; i < this.length; i++) {
          if (this[i] == val) return i;
          }
          return -1;
          };
          Array.prototype.remove = function(val) {
              var index = this.indexOf(val);
              if (index > -1) {
                this.splice(index, 1);
              }
              };
              var arr=new Array();

        $(document).ready(function(){
            initDecrement();
            initCheckBox();
            obj=$('.checkCartItem');
            for(k in obj){
              if(obj[k].checked){
                arr.push(obj[k].value)
              }
            }
            total_fee(arr);
            total_num(arr);
        });
        //购物车对象
        function CartItem(id, goods_num,selected) {
            this.id = id;
            this.goods_num = goods_num;
            this.selected = selected;
        }
        $(".checkCart").change(function() {

            if($(this).attr('checked')=='checked'){
              cart_id=$(this).val();
              arr.push($(this).val());
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                  type: "POST",
                  url: "/select/"+cart_id,//+tab,
                  dataType: 'json',
                  data: {},
              });
            }else{
              cart_id=$(this).val();
              arr.remove($(this).val());
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                  type: "POST",
                  url: "/unselect/"+cart_id,//+tab,
                  dataType: 'json',
                  data: {},
              });
            }
            total_fee(arr);
            total_num(arr);
          });

        function total_fee(arr){
          var fee=0;
          for(i=0;i<arr.length;i++){
            fee=fee+Number($('#cart_'+arr[i]+'_market_price').html());
          }
          $('#total_fee').html('￥'+fee);

        }
        function total_num(arr){
          var num=0;
          for(i=0;i<arr.length;i++){
            num=num+parseInt($('#changeQuantity_'+arr[i]).val());
          }
            $('#goods_num').html(num+'件商品');
        }



        //减购买数量事件
        $(function () {
            $(document).on("click", '.decrement', function (e) {
                var changeQuantityNum = $(this).parent().find('input').val();
                if (changeQuantityNum > 1) {
                    $(this).parent().find('input').attr('value', parseInt(changeQuantityNum) - 1).val(parseInt(changeQuantityNum) -1);
                }
                initDecrement();
                changeNum(this);
                total_num(arr);
                total_fee(arr);
            })
        })
        //加购买数量事件
        $(function () {
            $(document).on("click", '.increment', function (e) {
                var changeQuantityNum = $(this).parent().find('input').val();
                $(this).parent().find('input').attr('value', parseInt(changeQuantityNum) + 1).val(parseInt(changeQuantityNum) + 1);
                initDecrement();
                changeNum(this);
                total_num(arr);
            })
        })
        //手动输入购买数量
        $(function () {
            $(document).on("blur", '.quantity-form input', function (e) {
                var changeQuantityNum = parseInt($(this).val());
                if(changeQuantityNum <= 0){
                    layer.alert('商品数量必须大于0', {icon:2});
                    $(this).val($(this).attr('value'));
                }else{
                    $(this).attr('value', changeQuantityNum);
                }
                initDecrement();
                changeNum(this);
                total_num(arr);
            })
        })
        //更改购买数量对减购买数量按钮的操作
        function initDecrement(){
            $("input[id^='changeQuantity']").each(function(i,o){
                if($(o).val() == 1){
                    $(o).parent().find('.decrement').addClass('disable');
                }
                if($(o).val() > 1){
                    $(o).parent().find('.decrement').removeClass('disable');
                }
            })
        }
        //更改购物车请求事件
        function changeNum(obj){
            var input = $(obj).parents('.quantity-form').find('input');
            var cart_id = input.attr('id').replace('changeQuantity_','');
            var goods_num = $('#changeQuantity_'+cart_id).val();
            $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
                type: "POST",
                url: "/updatecart/"+cart_id,//+tab,
                dataType: 'json',
                data: {cart_id: cart_id,goods_num:goods_num},
                success: function (data) {
                    if(data.status == 1){
                        $('#cart_'+cart_id+'_market_price').html($('#cart_'+cart_id+'_goods_price').html()*$('#changeQuantity_'+cart_id).val());
                                        total_fee(arr);
                    }else{
                        input.val(data.store_count);
                        input.attr('value',data.store_count);
                        layer.alert(data.msg,{icon:2});
                        $('#cart_'+cart_id+'_market_price').html($('#cart_'+cart_id+'_goods_price').html()*$('#changeQuantity_'+cart_id).val());
                                        total_fee(arr);
                    }
                }
            });
        }
        //多选框点击事件
        $(function () {
            $(document).on("click", ".checkCart", function (e) {
                //选中一个
                if($(this).hasClass('checkCartItem')){
                    if($(this).is(':checked')){
                        $(this).attr('checked', 'checked');
                    }else{
                        $(this).removeAttr('checked');
                    }
                }
                //选中全选多选框
                if($(this).hasClass('checkCartAll')){
                    if($(this).is(':checked')){
                        $(".checkCart").each(function(i,o){
                            $(this).attr('checked', 'checked');
                        })
                    }else{
                        $(".checkCart").each(function(i,o){
                            $(this).removeAttr('checked');
                        })
                    }
                }
                initCheckBox();
            })
        })
        /**
         * 检测选项框
         */
        function initCheckBox(){
            var checkBoxsFlag = true;
            $("input[name^='checkItem']").each(function(i,o){
                if ($(this).attr("checked") != 'checked') {
                    checkBoxsFlag = false;
                }
            })
            if(checkBoxsFlag == false){
                $('.checkCartAll').removeAttr('checked');
            }else{
                $('.checkCartAll').attr('checked', 'checked');
            }
        }

        //删除购物车商品
        $(function () {
            //删除购物车商品事件
            $(document).on("click", '.deleteGoods', function (e) {
                var cart_ids = $(this).attr('data-cart-id');
                $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                    type : "GET",
                    url:"/deletecart/"+cart_ids,
                    dataType:'json',

                    success: function(data){
                        if(data.status == 1){
                            for (var i = 0; i < cart_ids.length; i++) {
                                $('#edge_' + cart_ids[i]).remove();
                            }
                            var inputCheckItemAll = $("input[name^='checkItem']");
                            if(inputCheckItemAll.length == 0){
                                $('#tpshop-cart').remove();
                                $('.shopcar_empty').show();
                            }
                        }else{
                            layer.msg(data.msg,{icon:2});
                        }
                        AsyncUpdateCart();
                    }
                });
            })
        })
        function gwc(){
          if (arr.length==0){
            layer.msg('未选中商品',{icon:2});
          }else{
            window.location.href="/carto";
          }
        }

    </script>

</div>
@include('layout.footer')
</body></html>
