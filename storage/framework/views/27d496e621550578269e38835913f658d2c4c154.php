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
				<?php if(\Auth::check()): ?>
				<span class="nihao">您好，<a href="/user/me"><font class="sjhm" style="color:#81a3f6"><?php echo e(Auth::user()->name); ?></font></a> <a style="color:#999999" href="/user/logout">[退出]</a>  </span>
				<?php else: ?>
				<a href="/user/login" class="login">登录</a>
				<a href="/user/register" class="zhuce">免费注册</a>
				<?php endif; ?>
			</div>
			<div class="top_right">
				<a href="javascript:;" id="tew">联系我们</a>
				<?php if(\Auth::check()): ?>
					<a href="/user/collection">我的收藏</a>
					<?php endif; ?>
				<?php if(\Auth::check()): ?>
				<a href="/user/me">个人中心</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- 头部 -->
	<div class="head_all">
		<div class="head_con">
			<div class="head_left">
				<a href="/">
					<img src="/img/logo1.jpg" class="logo1">
				</a>

			</div>
			<div class="head_right">
				<form action='/like' method='POST' class='selected'>
				<?php echo e(csrf_field()); ?>

					<input type="text" name='like' placeholder="搜一个商品，开始您的校园美好生活！">
				<div class="sousuo">
					<img src="/img/sousuo.png">
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- 导航 -->
	<div class="nav_top" style="width: 100%;height: 46px;background: #fe4d45;">
		<div class="nav_con">
			<div class="nav_left">
				<div class="feilei">
					<a href="javascript:;">
						<img src="/img/rr.png">
						<span>热门分类</span>
					</a>
				</div>
				<?php $__currentLoopData = $navi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<a class="nav_a" href="<?php echo e($value->url); ?>" style='color:#ffffff;text-decoration:none;' ><?php echo e($value->name); ?></a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="nav_right">
				<!-- <a href="javascript:;" class="">
					<img src="/img/nav_left.png">
				</a> -->

				<?php if(!(\Auth::check())||Auth::user()->has_store==0): ?>
				<?php if(!(\Auth::check())): ?>
				<a href="/login" class="">
				<?php else: ?>
				<a href="/user/creatstore" class="">
				<?php endif; ?>
					<img src="/img/nav_right.png">
				</a>
				<?php endif; ?>

			</div>

			<div class="list" style="width: 168px;height: 391px;border:1px solid #e5e5e5;position:absolute;left:0px;z-index:100;top:101%;background:#ffffff;display: none;">
				<ul>
					<?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a href="/cate/<?php echo e($value->id); ?>"><?php echo e($value->name); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>

	</div>




</body>
</html>
<script type="text/javascript">
	$('.sousuo').click(function(){
		$('.selected').submit();
	});
	$('.nav_a').each(function(){
		$(this).click(function(){
			var card = $(this);
			card.attr('id','mainte').siblings().removeAttr("id")
		})
	})
	$('.list ul li ').on('mouseover',function() {
		var cd = $(this)
		cd.find('a').css('color','#744ebd')
		cd.find('img').attr('src','/img/jian.jpg')
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
