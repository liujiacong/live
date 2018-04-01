

//登录操作
function cliLogin() {

	var txtUser = $.trim($("#txtUser").val());
	var txtPwd = $("#Userpwd").val();
	var txtCode = $.trim($('#lc-captcha-response').val());
	if ($.trim(txtUser) == "") {
		Tip('请输入账号！');
		$("#txtUser").focus();
		return;
	}
	if ($.trim(txtPwd) == "") {
		Tip('请输入密码！');
		$("#Userpwd").focus();
		return;
	}
	if ($('#lc-captcha-response').val() == "") {
		Tip('请进行人机验证');
		return false;
	}
  if(txtUser&&txtPwd&&txtCode){
    $('#account-login').submit();
  }

}
//注册操作
function cliregister() {

	var txtUser = $.trim($("#txtUser").val());
	var txtPwd = $("#Userpwd").val();
  var txtPwd2 = $("#Userpwd2").val();

	var txtCode = $.trim($('#lc-captcha-response').val());
	if ($.trim(txtUser) == "") {
		Tip('请输入你的用户名！');
		$("#txtUser").focus();
		return;
	}
	if ($.trim(txtPwd) == "") {
		Tip('请输入密码！');
		$("#Userpwd").focus();
		return;
	}
  if ($.trim(txtPwd2) == "") {
		Tip('请确认你的密码！');
		$("#password_confirmation").focus();
		return;
	}
  if(($.trim(txtPwd))!=($.trim(txtPwd2))){
Tip('两次密码不一致');
  }
	if ($('#lc-captcha-response').val() == "") {
		Tip('请进行人机验证');
		return false;
	}
  if(txtUser&&txtPwd&&txtCode){
    $('#account-reg').submit();
  }

}

function Sendpwd(sender) {
	var code = $("#txtCode2").val();
	var phone = $.trim($("#phone").val());
	if ($.trim(phone) == "") {
		Tip('请填写手机号码！');
		$("#phone").focus();
		return;
	}
	if ($("#yz-code").is(":visible") && $.trim(code) == "") {
		Tip('请填写验证码！');
		$("#txtCode2").focus();
		return;
	}
	return;
}
$("#dynamicLogon").click(function() {
	var pwd = $.trim($("#dynamicPWD").val());
	var phone = $.trim($("#phone").val());
	var code = $("#txtCode2").val();
	if ($.trim(phone) == "") {
		Tip('请填写手机号码！');
		$("#phone").focus();
		return;
	}
	if ($("#yz-code").is(":visible") && $.trim(code) == "") {
		Tip('请填写验证码！');
		$("#txtCode2").focus();
		return;
	}
	if ($.trim(pwd) == "") {
		Tip('动态密码未填写！');
		$("#dynamicPWD").focus();
		return;
	}
	return;
});
function Tip(msg) {
	$(".tishi").show().text(msg);
}
