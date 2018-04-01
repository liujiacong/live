@include('layout.head')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>评价订单-{{$order->order_sn}}</title>
    
    <link rel="stylesheet" type="text/css" href="/css/tpshop.css" />
    <link rel="stylesheet" type="text/css" href="/css/myaccount.css" />
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <link type="text/css" rel="stylesheet" href="/css/saved_resource.css">
    <link type="text/css" rel="stylesheet" href="/css/saved_resource(2).css" source="widget">
    <link href="/css/jquery.raty.css" media="screen" rel="stylesheet" type="text/css">
    <script src="/js/jquery.raty.js"></script>
    <script src="/js/global.js"></script>
     <script src="/js/layer-min.js"></script>
     <link rel="stylesheet" href="/css/layer.css" id="layui_layer_skinlayercss" style="">
    <style type="text/css">
        .ev-img img {
            width: 50px;
            height: 50px;
            position: absolute;
            z-index: 2;
            border-width: 0;
        }
        body{
            font: 12px/1.67em Tahoma, Arial, "Simsun", sans-serif !important;
        }
        .commstargoods.a_number img{
            vertical-align: text-bottom;
        }
    </style>
</head>
<body class="bg-f5">
<include file="user/header"/>
@if($order->order_status==4)
<div class="home-index-middle">
    <div class="w1224">
        <div class="home-main">
                                <div class="w">
                    <div class="mycomment-detail">
                    <div class="detail-hd" id="o-info-orderinfo" oid="20703525920" payid="4" ot="0" shipmentid="70" venderid="32+ro+cdrp0=">
                        <div class="orderinfo">
                            <h3 class="o-title">评价订单</h3>
                            <div class="o-info"> <span class="mr20">订单号：{{$order->order_sn}}</span> <span>{{$order->created_at}}</span> </div>
                        </div>
                    </div>
                    <form method="post" id="add_comment" action='/order/comment/{{$order->id}}' >
                     {{ csrf_field() }}
                        <input type="hidden" id="order_id" name="order_id" value="{{$order->id}}">
                        <input type="hidden" id="goods_id" name="goods_id" value="{{$goods->id}}">
                
                        <div class="mycomment-form">
                            <!-- page -->
                            <div class="form-part1">
                                <!--待评价商品-s-->
                                    <div class="f-cutline"></div>
                                    <div class="f-item f-goods product-741538" voucherstatus="0" catefi="670" catese="677" cateth="680">
                                        <!--商品信息-s-->
                                         <?php   $picture=unserialize($goods->picture);   ?>
                                        @foreach($order->OrderGoods as $key=>$val)
                                        <div class="fi-info">
                                            <div class="comment-goods">
                                                <div class="p-img"><a href="/item/{{$val->goods_id}}" target="_blank"><img src="{{$picture[0]}}" alt=""></a></div>
                                                <div class="p-name"><a href="/item/{{$val->goods_id}}" target="_blank">{{$val->goods_name}}</a></div>
                                                <div class="p-price"><strong>￥{{$val->goods_num*$val->goods_price}}</strong></div>
                                                <div class="p-attr">{{$val->spec_key_name}}</div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!--商品信息-e-->
                                        <div class="fi-operate" id="div_40">
                                            <!--评分--->
                                            
                                            <!--评分-e-->
                                            <div class="fop-item J-mjyx"></div>
                                            <div class="fop-tip">
                                                <i class="tip-icon"></i><em class="tip-text"></em>
                                            </div>
                                        <!--</div>-->
                                            <div class="fop-item ">
                                                <div class="fop-label">评价晒单</div>
                                                 <div class="fop-main">
                                                    <div class="f-textarea">
                                                        <textarea name="content" data-id="40" class="content" onkeyup="setval(this,'200')" id="comment_content" placeholder="商品是否给力？快分享你的购买心得吧~" style="height:140px" maxlength="200"></textarea>
                                                        <div class="textarea-ext"><em class="textarea-num">
                                                            <b id="textarea_40">200</b> / 200</em>
                                                            <span class="tips">（评价多于<span class="ftc1">10</span>个字）</span>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                                <div class="fop-tip"><i class="tip-icon"></i><em class="tip-text"></em></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--</div>-->
                                <!--待评价商品-e-->
                            </div>
                            <!-- page -->
                            <div class="f-btnbox">
                                <a href="javascript:void(0);" onclick="comment_submit(this);" class="btn-submit">提交</a>
                                <span class="f-checkbox">
                                    <label><input name="hide_username" class="i-check" type="checkbox" value="1">匿名评价</label>
                                </span>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                    </div>
    </div>
</div>
@else
                <div class="mycomment-detail">
                    <div class="detail-hd">
                        <div class="m-success-tip">
                            <div class="tip-inner">
                                <i class="tip-icon"></i>
                                <h3 class="tip-title">该商品已评价过啦~</h3>
                                <div class="tip-hint"><a clstag="pageclick|keycount|pingjiachenggong_201605192|1" href="/user/order/0" class="ftc3 ml10">订单列表 &gt;</a></div>
                            </div>
                        </div>
                    </div>
                </div>
@endif
<script>
    store_comment_flag = false;

    //判断内容填写和评分
    function setval(obj,sum){
        var len = $(obj).val().length;
        var textarea = $('#textarea_'+$(obj).attr('data-id'));
        if(len > sum){
            $(obj).val($(obj).val().substring(0,sum));  //截取规定长度字符串
        }
        var num = sum - len;
        num <= 0 ? textarea.text(0): textarea.text(num);  //防止出现负数
    }

  
function comment_submit(){
        var flag = false;
        $('.rank').each(function(i,o){
            if($(o).attr('rel')==1){
                flag = true;
            }
        })
        var comment_content = $('#comment_content').val()
        if(comment_content == ''){
            showErrorMsg('请输入评论内容');
            return false;
        }
        if(comment_content.length < 10){
            showErrorMsg('评论内容最少10个字符');
            return false;
        }
        
      $('#add_comment').submit();
    }

    function showErrorMsg(msg){
        layer.alert(msg,{icon:3});
    }
</script>
    @include('layout.footer')
</body>
</html>