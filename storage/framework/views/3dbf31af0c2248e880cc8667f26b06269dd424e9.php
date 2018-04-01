<?php echo $__env->make('layout.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>账号安全</title>
	<link rel="stylesheet" type="text/css" href="/css/zhanghusafe.css">
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<div class="content">
		<div class="dingbu"><span>当前位置：<a href="javascript:;">首页</a> > <a href="javascript:;">用户中心</a> > <a href="javascript:;">账号安全</a></span></div>
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
			<div class="heng"></div>
			
			<form action="/user/retpass" method='post' id="ret">
			<?php if(count($errors) > 0): ?>
							<div class="alert alert-danger">

								 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										 <div class="tishi"><?php echo e($error); ?></div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</div>
			<?php endif; ?>
			 <?php echo e(csrf_field()); ?>

			<span class="shoujihao">请输入原密码 : <input id="old" class="sjma" type="password" name="oldpassword" placeholder="请输入原密码"></span>
			
			<span class="jiaoyanma">新密码 : <input id='password' class="sjma" type="password" name="password" placeholder="请输入新的密码"></span>
			<span class="jiaoyanma2">确认密码 : <input id='repassword' class="sjma2" type="password" name="password_confirmation" placeholder="确认密码"></span>
			<a href="javascript:;"  class="enter1">确定</a>
			</form>
		</div>
	</div>
</body>
<script>
$('.enter1').click(function(){
	if($('#old').val()!="" && $('#password').val()==$('#repassword').val()){
			$('#ret').submit();
	}
	if($('#old').val()==""){
		alert("请输入原密码");
	}
	if($('#password').val()!=$('#repassword').val()){
		alert("密码不一致");
	}

	
});
	



</script>

<?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</html>