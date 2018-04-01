<!DOCTYPE html>
@include('layout.head')

<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script src="/js/ckepop.js" charset="utf-8"></script>

    <title>商品详情</title>
    <link rel="stylesheet" type="text/css" href="/css/tpshop.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.jqzoom.css">
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/layer-min.js"></script><link rel="stylesheet" href="/css/layer.css" id="layui_layer_skinlayercss" style="">
    <script type="text/javascript" src="/js/jquery.jqzoom.js"></script>
    <script src="/js/global2.js"></script>
</head>

<body>



    <div class="search-box p">
        <div class="w1224">
            <div class="search-path fl">

                    <i class="litt-xyb"></i>

                    <i class="litt-xyb"></i>
                                <div class="havedox">
                    <span>{{$Goods->goods_title}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="details-bigimg p">
        <div class="w1224">
            <div class="detail-img">
                <div class="product-gallery">
                    <div class="product-photo" id="photoBody">
                        <!-- 商品大图介绍 start [[-->
                        <div class="product-img jqzoom">
                          <?php   $picture=unserialize($Goods->picture);   ?>

                            <img id="zoomimg" src="{{$picture[0]}}" jqimg="{{$picture[0]}}" alt="">
                        </div>
                        <!-- 商品大图介绍 end ]]-->
                        <!-- 商品小图介绍 start [[-->
                        <div class="product-small-img fn-clear"> <a href="javascript:;" class="next-left next-btn fl"></a>
                            <div class="pic-hide-box fl">
                                <ul class="small-pic" style="left:0;">
                                  <?php        foreach ($picture as $key => $value) { ?>

                                    <li class="small-pic-li">
                                        <a href="javascript:;">
                                            <img src="{{$value}}" data-img="{{$value}}" data-big="{{$value}}">
                                            <i></i>
                                        </a>
                                    </li>
                                <?php  } ?>



                                </ul>
                            </div>
                            <a href="javascript:;" class="next-right next-btn fl"></a> </div>
                        <!-- 商品小图介绍 end ]]-->
                    </div>
                </div>
            </div>
            <form id="buy_goods_form" name="buy_goods_form" method="post" action='/shopping'>
             {{ csrf_field() }}
              <input type="hidden" id="item_id" name="item_id" value=""/><!-- 商品规格id -->
                <div class="detail-ggsl">
                <h1>{{$Goods->goods_title}} <span style="color:red;">{{$Goods->goods_title2}}</span></h1>
                <!--商品抢购 start-->
                                <!--商品抢购  end-->
                <div class="shop-price-cou">
                    <div class="shop-price-le">
                        <ul>
                            <li class="jaj"><span>商城价：</span></li>
                            <li>
                                <span class="bigpri_jj" id="goods_price"><span>￥</span><span>{{$Goods->shop_price}}</span></span>
                            </li>
                        </ul>
                        <ul>
                            <li class="jaj"><span>市场价：</span></li>
                            <li class="though-line"><span><em>￥</em>{{$Goods->market_Price}}</span></li>
                        </ul>
                                            </div>
                    <div class="shop-cou-ri">
                        <div class="allcomm"><p>累计评价</p><p class="f_blue">{{$Goods->comment_count}}</p></div>
                        <div class="br1"></div>
                        <div class="allcomm"><p>累计销量</p><p class="f_blue">{{$Goods->sale_count}}</p></div>
                    </div>
                </div>

                        </li>

                    </ul>
                    <!-- 收货地址，物流运费 -end-->
                    <!-- 规格 start [[-->
                    <?php foreach($filter_spec as $key=>$value) {  ?>
                          <div class="standard p">
                                <ul>
                                    <li class="jaj"><span>{{$key}}：</span></li>
                                    <li class="lawir colo">
                                    <?php foreach($value as $k=>$v) {  ?>
                                    @if($k==0)
                                    <input type="radio" style="display: none" rel="{{$v['item']}}" name="goods_spec[{{$key}}]" value="{{$v['item_id']}}"checked="checked" >
                                    <a onclick="select_filter(this);" class="red">{{$v['item']}}</a>
                                    @else
                                    <input type="radio" style="display: none" rel="{{$v['item']}}" name="goods_spec[{{$key}}]" value="{{$v['item_id']}}">
                                    <a onclick="select_filter(this);" class="">{{$v['item']}}</a>
                                    @endif
                                    <?php } ?>

                                    </li>
                                </ul>
                            </div>
                  <?php } ?>


                            <div class="standard p">
                                <ul>
                                    <li class="jaj"><span>数&nbsp;&nbsp;量：</span></li>
                                    <li class="lawir">
                                        <div class="minus-plus">
                                            <a class="mins" href="javascript:void(0);" onclick="altergoodsnum(-1)">-</a>
                                            <input class="buyNum" id="number" type="text" name="goods_num" value="1" onblur="altergoodsnum(0)" max="96">
                                            <a class="add" href="javascript:void(0);" onclick="altergoodsnum(1)">+</a>
                                        </div>
                                        <div class="sav_shop">剩余库存：<span id="store_count">96</span></div>
                                    </li>
                                </ul>
                                <script>
                                    $('#number').val(1);
                                </script>
                            </div>
                            <div class="standard p">
                              <input type="hidden" name="goods_id" value="{{$Goods->id}}" />
                              <a id="join_cart_now" class="paybybill" href="javascript:;" onclick="AjaxAddCarts({{$Goods->id}},1,0);">立即购买</a>
                             <!--  <a id=""  class="addcar" href="javascript:;" onclick="AjaxAddCarts({{$Goods->id}},1,0);"><i class="sk"></i>加入收藏</a> -->
                              <a id="join_cart"  class="paybybill" href="javascript:;"  ><i class="sk"></i>加入收藏</a>
                            </div>
                </div>

                                    <script>
                    /**
                     * 切换规格
                     */
                    function select_filter(obj)
                    {
                        $(obj).addClass('red').siblings('a').removeClass('red');
                        $(obj).siblings('input').prop('checked',false);
                        $(obj).prev('input').prop('checked',true);;	 // 让隐藏的 单选按钮选中
                        // 更新商品价格
                        get_goods_price();
                    }
                </script>
                <!-- 规格end ]]-->

            </div>
            </form>
            <!--看了又看-s-->

            <!--看了又看-s-->
        </div>
    </div>
    <div class="detail-main p">
        <div class="w1224">
          
            <div class="deta-ri-ma">
                <div class="introduceshop">
                    <div class="datail-nav-top">
                        <ul>
                            <li class="red"><a href="javascript:void(0);">商品介绍</a></li>
                            <li class=""><a href="javascript:void(0);">规格及包装</a></li>
                            <li ><a  id="pingjia" href="javascript:void(0);">评价<em></em></a></li>
                        </ul>
                    </div>
                    <!--<div class="he-nav"></div>-->
                    <div class="shop-describe shop-con-describe p" style="display: block;">
                        <div class="deta-descri">
                            <p class="shopname_de"><span>商品名称：</span><span>{{$Goods->goods_title}}</span></p>
                            <div class="ma-d-uli p">
                                <ul>
                                  @foreach($attr_ as $key=>$value)
                                      <li><span>{{$value->attr_name}}：</span><span>{{$value->attr_value}}</span></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="moreparameter">
                                
                            </div>
                        </div>
                        <div class="detail-img-b">
                              {!! $Goods->goods_content !!}
                          </div>
                    </div>
                    <div class="shop-describe shop-con-describe p" style="display: none;">
                        <div class="deta-descri">
                          
                            <h2 class="shopname_de">属性</h2>
                            @foreach($attr_ as $key=>$value)
                                <div class="twic_a_alon">
                                    <p class="gray_t">{{$value->attr_name}}</p>
                                    <p>{{$value->attr_value}}</p>
                                </div>
                              @endforeach
                                </div>
                    </div>
                    <div class="shop-con-describe p" style="display: none;">
                        <div class="shop-describe p">
                            <div class="comm_stsh ma-to-20">
                                <div class="deta-descri">
                                    <h2>商品评价</h2>
                                </div>
                            </div>
                            <div class="line-co-sunall"  id="ajax_comment_return">
                        </div>
</div>
</div>
</div>
</div>
<div class="operating fixed" id="bottom">
    <div class="fn_page clearfix">
        <div class="dataTables_paginate paging_simple_numbers"><ul class="pagination">    </ul></div>    </div>
</div>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="/js/headerfooter.js"></script>
    <script type="text/javascript">
        var commentType = 1;// 默认评论类型
        $(document).ready(function () {

             if({{count($errors)}}){
            layer.msg('不能购买自己发布的商品', {icon: 3});
        }    
            /*商品缩略图放大镜*/
            $(".jqzoom").jqueryzoom({
                xzoom: 500,
                yzoom: 500,
                offset: 1,
                position: "right",
                preload: 1,
                lens: 1
            });
            get_goods_price();
            ajaxComment(commentType,1);// ajax 加载评价列表
            replace_look();
        });

        //看了又看切换
        var tmpindex = 0;
        var look_see_length = $('#look_see').children().length;
        function replace_look(){
            var listr='';
            if(tmpindex*2>=look_see_length) tmpindex = 0;
            $('#look_see').children().each(function(i,o){
                if((i>=tmpindex*2) && (i<(tmpindex+1)*2)){
                    listr += '<div class="tjhot-shoplist type-bot">'+$(o).html()+'</div>';
                }
            });
            tmpindex++;
            $('#see_and_see').empty().append(listr);
        }

        var store_count = {{$Goods->store_count}}; // 商品起始库存
        //缩略图切换
        $('.small-pic-li').each(function (i, o) {
            var lilength = $('.small-pic-li').length;
            $(o).hover(function () {
                $(o).siblings().removeClass('active');
                $(o).addClass('active');
                $('#zoomimg').attr('src', $(o).find('img').attr('data-img'));
                $('#zoomimg').attr('jqimg', $(o).find('img').attr('data-big'));

                $('.next-btn').removeClass('disabled');
                if (i == 0) {
                    $('.next-left').addClass('disabled');
                }
                if (i + 1 == lilength) {
                    $('.next-right').addClass('disabled');
                }
            });
        })

        //前一张缩略图
        $('.next-left').click(function () {
            var newselect = $('.small-pic>.active').prev();
            $('.small-pic>.active').removeClass('active');
            $(newselect).addClass('active');
            $('#zoomimg').attr('src', $(newselect).find('img').attr('data-img'));
            $('#zoomimg').attr('jqimg', $(newselect).find('img').attr('data-big'));
            var index = $('.small-pic>li').index(newselect);
            if (index == 0) {
                $('.next-left').addClass('disabled');
            }
            $('.next-right').removeClass('disabled');
        })

        //后前一张缩略图
        $('.next-right').click(function () {
            var newselect = $('.small-pic>.active').next();
            $('.small-pic>.active').removeClass('active');
            $(newselect).addClass('active');
            $('#zoomimg').attr('src', $(newselect).find('img').attr('data-img'));
            $('#zoomimg').attr('jqimg', $(newselect).find('img').attr('data-big'));
            var index = $('.small-pic>li').index(newselect);
            if (index + 1 == $('.small-pic>li').length) {
                $('.next-right').addClass('disabled');
            }
            $('.next-left').removeClass('disabled');
        })
        $(function(){
            $("#area").click(function (e) {
                SelCity(this,e);
            });
        })


        $(function(){
            $('.datail-nav-top ul li').click(function(){
                $(this).addClass('red').siblings().removeClass('red');
                var er = $('.datail-nav-top ul li').index(this);
                $('.shop-con-describe').eq(er).show().siblings('.shop-con-describe').hide();
            })
        })


        /**
         * 加减数量
         * n 点击一次要改变多少
         * maxnum 允许的最大数量(库存)
         * number ，input的id
         */
        function altergoodsnum(n){
            var num = parseInt($('#number').val());
            var maxnum = parseInt($('#number').attr('max'));
            num += n;
            num <= 0 ? num = 1 :  num;
            if(num >= maxnum){
                $(this).addClass('no-mins');
                num = maxnum;
            }
            $('#store_count').text(maxnum-num); //更新库存数量
            $('#number').val(num)
        }

        function get_goods_price()
        {
            var goods_price = {{$Goods->shop_price}}; // 商品起始价
            var store_count = {{$Goods->store_count}}; // 商品起始库存
            var spec_goods_price ={!! $spec_goods_price !!};
            // 优先显示抢购活动库存
                        // 如果有属性选择项
            if(spec_goods_price != null && spec_goods_price !='')
            {
                goods_spec_arr = new Array();
                $("input[name^='goods_spec']:checked").each(function(){
                    goods_spec_arr.push($(this).val());
                });
                var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key
                goods_price = spec_goods_price[spec_key]['price']; // 找到对应规格的价格
                store_count = spec_goods_price[spec_key]['store_count']; // 找到对应规格的库存
                item_id=spec_goods_price[spec_key]['id'];
            }

            var goods_num = parseInt($("#goods_num").val());
            // 库存不足的情况
            if(goods_num > store_count)
            {
                goods_num = store_count;
                layer.alert('库存仅剩 '+store_count+' 件',{icon:2});
                $("#goods_num").val(goods_num);
            }
            $('#store_count').html(store_count);    //对应规格库存显示出来
            $('#number').attr('max',store_count); //对应规格最大库存
            $("#goods_price").html('<span>￥</span><span>'+goods_price+'</span>'); // 变动价格显示
              $("#item_id").val(item_id);

        }
        /***用作 sort 排序用*/
        function sortNumber(a,b)
        {
            return a - b;
        }
        function AjaxAddCarts(goods_id,num,to_catr)
        {
          @if(\Auth::check())
      		 var chek=true;
      		@else
      		var chek=false;
      		@endif
          if(!chek){
            layer.msg('请先登录！', {icon: 1});
          }else{
            $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
                    type:'POST',
                    data : $('#buy_goods_form').serialize(),// 你的formid 搜索表单 序列化提交
                    dataType:'json',
                    url:"/addcart",
                    success:function(data){

                        console.log(data);
                        if(data.status==1){
                           $('#buy_goods_form').serialize()
                           $('#buy_goods_form').submit()
                        }else{
                        layer.msg(data.msg, {icon: 1});
                        }


                    }
            });
          }

        }

        /***收藏商品**/
        $('#join_cart').click(function(){
          var goods_id={{$Goods->id}}
          @if(\Auth::check())
      		 var chek=true;
      		@else
      		var chek=false;
      		@endif
            if(!chek){
                layer.msg('请先登录！', {icon: 1});
            }else{
              $.ajax({
      					headers: {
      							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      					},
      								type:'POST',
      								data:{goods_id:goods_id},
      								url:"/like/"+goods_id,
      								success:function(data){
                        if(data=1){
                          layer.msg('已收藏！', {icon: 3});
                        }
      								}
      				});

            }
        });

        
 $('#pingjia').click(function(){
    $.ajax({
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                type : "GET",
                url:"/ajax_comment/goods/{{$Goods->id}}",//+tab,
                success: function(data){
                    $("#ajax_comment_return").html('');
                    $("#ajax_comment_return").append(data);
                }
            });
        });

        /***用ajax分页显示评论**/
        function ajaxComment(commentType,page){
            $.ajax({
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                type : "GET",
                url:"/ajax_comment/goods/{{$Goods->id}}",//+tab,
                success: function(data){
                    $("#ajax_comment_return").html('');
                    $("#ajax_comment_return").append(data);
                }
            });
        }
        /**
         * 切换图片
         */
        function switch_zooming(img)
        {
            if(img != ''){
                $('#zoomimg').attr('jqimg', img);
                $('#zoomimg').attr('src', img);
            }
        }
    </script>
@include('layout.footer')
</body></html>
