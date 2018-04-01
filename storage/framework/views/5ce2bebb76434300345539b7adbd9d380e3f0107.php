<?php echo $__env->make('layout.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>账号安全</title>
	<link rel="stylesheet" type="text/css" href="/css/zhanghaosafe.css">
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<div class="content">
		<div class="dingbu"><span>当前位置：<a href="/">首页</a> > <a href="/user/me">用户中心</a> > <a href="/user/safe">账号安全</a></span></div>
		<div class="one">
			<ul>
				<li ><a href="/user/me" >首页</a></li>
                <li><a href="/user/order/0">我的订单</a></li>
                <li><a href="/user/address">收货地址</a></li>
                <li><a href="/user/myaccount">我的账户</a></li>
                <li id="bian"><a href="/user/safe">账户安全</a></li>
                <li><a href="/user/collection">我的收藏</a></li>
                <?php if($me->has_store): ?>
                <li><a href="/store/home/index" target="_black">高级管理</a></li>
                <?php endif; ?>
			</ul>
		</div>
		<div class="mid">
			<span class="shaiow">账号安全</span>
			<div class="heng1"></div>
			<div class="heng2"></div>
			<div class="heng3"></div>
			<div class="shu1"></div>
			<div class="shu2"></div>
			<img src="/img/fini.png">
			
			<img src="/img/fini.png">
			
			<!-- <img src="/img/fini.png"> -->
			<span>登陆密码</span>
			<span>邮箱绑定</span>
			<span></span>
			<span>建议您定期更改密码以保护账户安全。</span>
			<!-- <span>建议绑定您的手机号以保护账户的安全。</span> -->
			<span>您当前绑定的邮箱地址<?php echo e($me->email); ?></span>
			<a href="/user/retpass">修改</a>
			<a href="javascript:;"></a>
			
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
</script>
<?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</html>