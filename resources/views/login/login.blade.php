<!DOCTYPE html>
<html>
<head>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>校园-live-登陆</title>
<script type="text/javascript" src="/js/jquery-1.12.3.min.js"></script>
{!! Captcha::script() !!}
<link type="text/css" href="/css/base.css" rel="stylesheet" />
<link href="/css/login.css" rel="stylesheet" />

</head>

<body style="background: #f6f6f6">

<div class="wrapper" id="login_head" style="display:">
	<div class="log_head">
		<h1 class="log_logo left"><a href="/"><span>欢迎登录</span></a></h1>
	</div>
</div>
<div class="login_wrap" style="width:; background:#fff url(../img/20161209115754_5628.jpg) no-repeat center top; padding:40px 0;">
	<div class="wrapper" id="login_body" style="width:;">
		<div class="log_ad" style="display:"><a href="javascript:;"></a></div>
		<div class="login_border" style="padding:8px;">
			<div class="login" style="display: block;">
				<div style="position:absolute; right:30px; top:14px;">
					<a href="/user/register">账号注册
					<em style="width:16px; height:16px; background:#999; float:right; color:#fff; border-radius:100%; text-align:center; line-height:16px; margin:1px 0 0 5px; font-family:'宋体'; font-weight:bold;">&gt;</em>
					</a>
				</div>
				<ul class="login-tab">
					<li class="login-on">普通登录</li>
					<!-- <li>手机登录</li> -->
				</ul>
				<div class="login-body">
					<form action="/user/login" method='post' id="account-login" >
						{{ csrf_field() }}

					<div class="login-style" style="display: block;">
						<dl><dd><input name="name" type="text" id="txtUser" placeholder="用户名/邮箱/手机号" /></dd></dl>
						<dl>
							<dd><input type="password" name="password" id="Userpwd"  placeholder="请输入您的密码" /></dd>
						</dl>
						<dl>
						{!! Form::captcha() !!}
					 </dl>
						<div class="psword" style="margin-top:15px;"><a href="/password/reset" onClick="zhaohui(this)" tabindex="-1" class="right" target="_blank">忘记密码?</a></div>
						<div class="remember">
							<input type="checkbox" id="issave" name="is_remember" checked /><label for="issave">下次自动登录</label>
						</div>
						<div class="tishi"></div>
						@if (count($errors) > 0)
							<div class="alert alert-danger">

								 @foreach ($errors->all() as $error)
										 <div class="tishi">{{ $error }}</div>
									@endforeach

						</div>
						@endif
						<button type="button" onClick="cliLogin()" id="logbtn" >登 录</button>
					</div>
				</form>
					<div class="login-style">
						<dl><dd><input name="phone" type="text" id="phone" placeholder="您的手机号码" /></dd></dl>
						<dl>
							<dd><input type="text" id="dynamicPWD" onKeyDown="enterHandler(event)" style="width: 133px;" placeholder="短信验证码" /><input type="button" id="btn" class="btn_mfyzm" value="获取动态密码" onClick="Sendpwd(this)" /></dd>
						</dl>
						<div class="remember">
							<input type="checkbox" id="issave1" checked /><label for="issave1">下次自动登录</label>
						</div>
						<div class="tishi"></div>
						<button type="button" id="dynamicLogon" style="outline:none">登 录</button>
					</div>
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
<div id="bindweixin" style="display:none;">
	<div class="bindWeixin">
		<p class="login-success">登录成功！</p>
		<div class="login-tips">为了您的帐号安全，建议绑定微信号</div>
		<img id="twocodetemp" src="#" />
	</div>
</div>
@include('layout.footer')
<script type="text/javascript" src="/js/login.js"></script>

</body>

</html>
