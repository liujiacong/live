<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/css/top.css">

	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<!-- 头部 -->
	<!-- //顶部 -->
	<div class="top_all">
		<div class="top_con">
			<div class="top_left">
				<a href="/" class="left_1">
					<img src="/img/jia.png">
					<span>校园-live</span>
				</a>
				@if (\Auth::check())
				<span class="nihao">您好，<a href="/user/me"><font class="sjhm" style="color:#81a3f6">{{Auth::user()->name}}</font></a> <a style="color:#999999" href="/logout">[退出]</a>  </span>
				@else
				<a href="/login" class="login">登录</a>
				<a href="/register" class="zhuce">免费注册</a>
				@endif
			</div>
			<div class="top_right">
				<a href="javascript:;" id="tew">联系我们</a>
				<a href="javascript:;">帮助中心</a>
				@if (\Auth::check())
				<a href="/cart">购物车（<font style="color: #fe4d45">{{ count(Auth::user()->Cart)}}</font>）</a>
				<a href="/user/me">个人中心</a>
				@endif
			</div>
		</div>
	</div>
	<!-- 头部 -->
	<div class="head_all">
		<div class="head_con">
			<div class="head_left">
				<a href="javascript:;">
					<img src="/img/timg.jpg" class="logo1">
				</a>

			</div>
			<div class="head_right">

				<div class="sousuo">
					<img src="/img/sousuo.png">
				</div>
				<input type="text" placeholder="搜一个商品，开始您的试用之旅！">
			</div>
		</div>
	</div>
	<!-- 导航 -->
	<div class="nav" style="width: 100%;height: 46px;background: #fe4d45;">
		<div class="nav_con">
			<div class="nav_left">
				<div class="feilei">
					<a href="javascript:;">

						<span>{{$Store->name}}</span>
					</a>
				</div>
				<a href="/shop/{{$Store->id}}" class="nav_a">首页</a>
			@foreach($Store->cate as $key=>$value)
			<a href="/shop/{{$Store->id}}/{{$value->id}}"  class="nav_a">{{$value->name}}</a>
			@endforeach

			</div>
			<div class="nav_right">
				<!-- <a href="javascript:;" class="">
					<img src="/img/nav_left.png">
				</a> -->

				@if(!(\Auth::check())||Auth::user()->has_store==0)
				@if(!(\Auth::check()))
				<a href="/login" class="">
				@else
				<a href="/user/creatstore" class="">
				@endif
					<img src="/img/nav_right.png">
				</a>
				@endif

			</div>


		</div>

	</div>




</body>
</html>
<script type="text/javascript">
	$('.nav_a').each(function(){
		$(this).click(function(){
			var card = $(this);
			card.attr('id','mainte').siblings().removeAttr("id")
		})
	})
	$('.list ul li ').on('mouseover',function() {
		var cd = $(this)
		cd.find('a').css('color','#744ebd')
		cd.find('img').attr('src','/img/jianzhi.jpg')
	});
	$('.list ul li ').on('mouseout',function() {
		var cd = $(this)
		cd.find('a').css('color','#747474')
		cd.find('img').attr('src','/img/jian.jpg')
	});

   $('.feilei,.list').on('mouseover',function(){
   		$('.list').show();
   })
    $('.feilei,.list').on('mouseout',function(){
   		$('.list').hide();
   })
</script>
