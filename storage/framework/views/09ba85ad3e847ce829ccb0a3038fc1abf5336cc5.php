<!DOCTYPE html>
<html>
<head>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>校园-live-注册</title>
<script type="text/javascript" src="/js/jquery-1.12.3.min.js"></script>
<?php echo Captcha::script(); ?>


<link type="text/css" href="/css/base.css" rel="stylesheet" />
<link href="/css/login.css" rel="stylesheet" />

</head>

<body style="background: #f6f6f6">

<div class="wrapper" id="login_head" style="display:">
	<div class="log_head">
		<h1 class="log_logo left"><a href="/"><span>新用户注册</span></a></h1>
	</div>
</div>
<div class="login_wrap" style="width:; background:#fff url(../img/20161209115754_5628.jpg) no-repeat center top; padding:40px 0;">
	<div class="wrapper" id="login_body" style="width:;">
		<div class="log_ad" style="display:"><a href="javascript:;"></a></div>
		<div class="login_border" style="padding:8px;">
			<div class="login" style="display: block;">
				<div style="position:absolute; right:30px; top:14px;">
					<a href="/user/login">已有账户，点击登陆
					<em style="width:16px; height:16px; background:#999; float:right; color:#fff; border-radius:100%; text-align:center; line-height:16px; margin:1px 0 0 5px; font-family:'宋体'; font-weight:bold;">&gt;</em>
					</a>
				</div>
				<ul class="login-tab">
					<li class="login-on">用户注册</li>
					<!-- <li>手机登录</li> -->
				</ul>

				<form action="/user/register" method="post" id="account-reg">
					  <?php echo e(csrf_field()); ?>

				<div class="login-body">
					<div class="login-style" style="display: block;">
						<dl><dd><input name="name" type="text" id="txtUser" placeholder="用户名" /></dd></dl>
						<dl>
							<dd><input name="email" type="text" id="txtUser"  placeholder="邮箱" /></dd>
						</dl>
						<dl>
							<dd><input name="password" type="password" id="Userpwd"  placeholder="请输入您的密码" /></dd>
						</dl>
						<dl>
							<dd><input name="password_confirmation" id="Userpwd2" type="password" placeholder="确认密码" /></dd>
						</dl>
						<dl>
							<?php echo Form::captcha(); ?>

						</dl>
						<div class="tishi"></div>
						<?php if(count($errors) > 0): ?>
		           <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		            <div class="tishi"> <?php echo e($error); ?> </div>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    	</div>
					<?php endif; ?>
						<button type="button" onClick="cliregister()"  style="outline:none">马上注册</button>
					</div>
				</form>
				</div>
				


			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="wxlogma">
	<a class="close" onClick="closewx()"></a>
	<h3>微信扫一扫二维码登录</h3>
	<iframe width="200" height="200" scrolling="no" frameborder="0" id="weixinCode"></iframe>
</div>
<?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript" src="/js/login.js"></script>

</body>

</html>
