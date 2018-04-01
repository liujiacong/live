@include('layout.head')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人资料</title>
	<link rel="stylesheet" type="text/css" href="/css/gerenziliao.css">
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/gerenziliao.js"></script>
</head>
<body>
	<div class="content">
		<div class="dingbu"><span>当前位置：<a href="javascript:;">首页</a> > <a href="javascript:;">用户中心</a> > <a href="javascript:;">个人资料</a></span></div>
		<div class="one">
			<ul>
				<li id="bian"><a href="/user/me" >首页</a></li>
                <li><a href="/user/order/0">我的订单</a></li>
                <li><a href="/user/address">收货地址</a></li>
                <li><a href="/user/myaccount">我的账户</a></li>
                <li><a href="/user/safe">账户安全</a></li>
                <li><a href="/user/collection">我的收藏</a></li>
                @if($me->has_store)
                <li><a href="/store/home/index" target="_black">高级管理</a></li>
                @endif

			</ul>
		</div>
		<div class="mid">
			<form action="/user/me" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
			<span>个人资料</span>
			<div class="shu"></div>

			<div id="touxiang" >
            <img id="preview" src="{{$me->head_pic}}" width="124" height="121" style="display: block; width: 124px;height: 121px;border-radius:50%;position: absolute;left: 6%;top:18%">
      </div>
			<a class="shanc" href="javascript:;">修改头像 </a>
           
			<input type="file" class="ol" name="head_pic" id="doc" onchange="javascript:setImagePreview();">
          
			<a href="javascript:;"><img class="phone" src="/img/phone.png"></a>
			@if($me->mobile)
			<span>已绑定</span>
			<span>{{$me->mobile}}</span>
			@else
			<span>未绑定</span>
			<span></span>
			@endif
			<a href="javascript:;"><img class="duan" src="/img/duanxin.png"></a>
			@if($me->email)
			<span>已绑定</span>
			<span>{{$me->email}}</span>
			@else
			<span>未绑定</span>
			<span></span>
			@endif
			<div class="sxiang"></div>
			<div class="tip">
				<img  src="/img/tanhao.png">
				<span id="tishi">温馨提示：我们绝不会通过任何形式公开您的个人隐私！</span>
				@if (count($errors) > 0)
					<div class="alert alert-danger">

						 @foreach ($errors->all() as $error)
								<span> {{ $error }} </span>
							@endforeach

				</div>
				@endif
			</div>
			<ul>
				<li>昵 &nbsp;&nbsp;&nbsp;称 &nbsp;:<input class="nicheng" type="text" name="name" placeholder="请输入昵称" value="{{$me->name}}"><span id="bitian">*</span></li>
				<li>性 &nbsp;&nbsp;&nbsp;别 &nbsp;:<label class="nan">
					<input class="zi" name="sex" type="radio" value="1" @if($me->sex==1) checked  @endif />男 </label>
					<label class="nv"><input class="zi" name="sex" type="radio" value="2" @if($me->sex==2) checked  @endif />女 </label>
					<label class="nan"><input class="baomi" name="sex" type="radio" value="0" @if($me->sex==0) checked  @endif />保密 </label> </li>
					<li>生 &nbsp;&nbsp;&nbsp;日 &nbsp;:<input type="text" class="nicheng" required="" value="{{$me->birthday}}" name="birthday" id="test1"></li>
				<li>QQ号码 :<input class="qqnum" type="text" name="qq" value="{{$me->qq}}" placeholder="您的QQ号码"></li>
			</ul>
			<input type="submit" class="baocun" value="保存">
			</form>
		</div>
	</div>
	@include('layout.footer')

</body>
<script src="/laydate/laydate.js"></script>
<script>
	laydate.render({
	  elem: '#test1'
	});
</script>
<script type="text/javascript">
//下面用于图片上传预览功能
function setImagePreview(avalue) {
var docObj=document.getElementById("doc");

var imgObjPreview=document.getElementById("preview");
if(docObj.files &&docObj.files[0])
{
//火狐下，直接设img属性
imgObjPreview.style.display = 'block';
imgObjPreview.style.width = '124px';
imgObjPreview.style.height = '121px';
//imgObjPreview.src = docObj.files[0].getAsDataURL();

//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
}
else
{
//IE下，使用滤镜
docObj.select();
var imgSrc = document.selection.createRange().text;
var localImagId = document.getElementById("localImag");
//必须设置初始大小
localImagId.style.width = "124px";
localImagId.style.height = "121px";
//图片异常的捕捉，防止用户修改后缀来伪造图片
try{
localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
}
catch(e)
{
alert("您上传的图片格式不正确，请重新选择!");
return false;
}
imgObjPreview.style.display = 'none';
document.selection.empty();
}
return true;
}

</script>
<!-- @include('layout.footer') -->
</html>
