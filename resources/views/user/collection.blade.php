@include('layout.head')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的账户</title>
	<link rel="stylesheet" type="text/css" href="/css/account.css">
	<link rel="stylesheet" type="text/css" href="/css/myaccount.css">
	<link rel="stylesheet" type="text/css" href="/css/tpshop.css">
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/js/account.js"></script>
</head>
<body>
	<div class="content">
		<div class="dingbu"><span>当前位置：<a href="javascript:;">首页</a> > <a href="javascript:;">用户中心</a> > <a href="javascript:;">我的账户</a></span></div>
		<div class="one">
			<ul>
				<li ><a href="/user/me" >首页</a></li>
                <li><a href="/user/order/0">我的订单</a></li>
                <li><a href="/user/address">收货地址</a></li>
                <li ><a href="/user/myaccount">我的账户</a></li>
                <li><a href="/user/safe">账户安全</a></li>
                <li id="bian"><a href="/user/collection">我的收藏</a></li>
                 @if($me->has_store)
                <li><a href="/store/home/index" target="_black">高级管理</a></li>
                @endif
			</ul>
		</div>
		<div class="mid">
			
			<div class="ri-menu fr">
						<div class="menumain p">
							<div class="goodpiece">
								<h1>我的收藏</h1>
							</div>
							<div class="time-sala ma-to-20">
								<ul>
									<li class="red"><a href="#">商品收藏</a></li>
									
								</ul>
							</div>
							<div class="he"></div>
							
							<div class="orderbook-list sc_collect">
				    			<div class="book-tit">
				    				<ul>
				    					<li class="sx2">&nbsp;</li>
				    					<li class="sx1">商品</li>
				    					<li class="sx3">单价</li>
				    					<li class="sx4">状态</li>
				    					<li class="sx5">操作</li>
				    				</ul>
				    			</div>
				    		</div>
				    	<div class="sc_collect book-tit shop-listanadd">
							@foreach($goods as $key=>$value)
							 <?php
							 if($value->picture){
								 $picture=unserialize($value->picture); 
							 }   
							 ?>
							<ul>
										<li class="sx2">&nbsp;&nbsp;</li>
										<li class="sx1">
											<div class="shop-if-dif texle">
												<div class="shop-difimg">
													<img src="{{$picture[0]}}" width="100" height="100">
												</div>
												<div class="shop_name">
												<a href="/item/{{$value->id}}">{{$value->goods_title}}&nbsp;&nbsp;&nbsp;&nbsp;{{$value->goods_title2}}</a>
												</div>
											</div>
										</li>
										<li class="sx3"><span><em>￥</em>{{$value->shop_price}}</span></li>
										<li class="sx4">
											@if($value->is_sale==1 ||$value->is_delect==1)
                                            <span>已下架</span>
                                            @else
                                            <span>正常</span>
                                            @endif
                                        </li>
										<li class="sx5">
											<div class="adhscar">
						<a class="add_p_shop" href="/item/{{$value->id}}">立即查看</a>
						<a class="dele_g" href="/store/unlike/{{$value->id}}" href="javascript:">删除</a>
											</div>
										</li>
								</ul>
								@endforeach
						</div>
						<div class="all_pluscar p">
			    				
								<div class="operating fixed" id="bottom">
									<div class="fn_page clearfix">
							<div class="dataTables_paginate paging_simple_numbers"><ul class="pagination">    </ul>
							</div>									
							</div>
								</div>
			    			</div>
						</div>
			    	</div>


			

		</div>
	</div>
</body>
<script type="text/javascript">
	$('.one ul li').each(function(j){
		$(this).on("click",function(){
			var card = $(this);
			card.attr('id',"bian").siblings().removeAttr("id")

		})
	})
	$('.e').each(function(){
		$(this).on("click",function(){
			var card1 = $(this);
			card1.attr('id',"xunhzo").siblings().removeAttr("id")
		})
	})
	$('.ff').each(function(){
		$(this).on("click",function(){
			var card12 = $(this);
			card12.parent().attr('id',"teshu").siblings().removeAttr("id")
		})
	})
	$(".yue").click(function(){
		$(".mid2").show();
		$(".mid1").hide();
	})
	$(".hongbb").click(function(){
		$(".mid1").show();
		$(".mid2").hide();
	})
</script>
</html>
