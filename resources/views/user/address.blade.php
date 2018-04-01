@include('layout.head')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>收货地址</title>
	<link rel="stylesheet" type="text/css" href="/css/address.css">
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
	<!-- <script src="http://www.my97.net/dp/My97DatePicker/WdatePicker.js"></script> -->

	<!-- 地区插件 -->
	<link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
  	<script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
 	<!-- <script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script> -->
  	<script src="/js/distpicker.data.js"></script>
 	<script src="/js/distpicker.js"></script>
  	<script src="/js/main.js"></script>
  	<script type="text/javascript" src="/js/address.js"></script>
</head>
<body>
	<div class="content">
		<div class="dingbu"><span>当前位置：<a href="javascript:;">首页</a> > <a href="javascript:;">用户中心</a> > <a href="javascript:;">收货地址</a></span></div>
		<div class="one">
			<ul>
				<li ><a href="/user/me" >首页</a></li>
                <li><a href="/user/order/0">我的订单</a></li>
                <li id="bian"><a href="/user/address">收货地址</a></li>
                <li ><a href="/user/myaccount">我的账户</a></li>
                <li><a href="/user/safe">账户安全</a></li>
                <li><a href="/user/collection">我的收藏</a></li>
                 @if($me->has_store)
                <li><a href="/store/home/index" target="_black">高级管理</a></li>
                @endif
			</ul>
		</div>
		@if (count($errors) > 0)
							<div class="alert alert-danger">

								 @foreach ($errors->all() as $error)
										 <div class="tishi">{{ $error }}</div>
									@endforeach

						</div>
			@endif
		<div class="mid">	
			<span class="shaiow">收货地址
			
			</span>
			<div class="addre">
				<table border="1" class="biao">
				  <tr id="yi">
				    <th>收货人</th>
				    <th>手机/电话号码</th>
				    <th>详细地址</th>
				    <th>邮政编码</th>
				    <th>操作</th>
				    <th></th>
				  </tr>
					@foreach ($me->user_address as $key=>$val)
				  <tr class="er">
				    <td>{{$val->consignee}}</td>
				    <td>{{$val->mobile}}</td>
				    <td>{{$val->province}}-{{$val->city}}-{{$val->district}}-{{$val->address}}</td>
				    <td>{{$val->zipcode}}</td>
				    <td class="hh"><a class="c1 h11" href="javascript:;" data="{{$val->id}}">修改</a> &nbsp;  <a class="c2" href="/user/address/{{$val->id}}/delete">删除</a></td>
						@if($val->is_default==1)
						<td><div class="moren">默认地址</div></td>
						@else
						<td><div class="smoren" data="{{$val->id}}"><a href="javascript:;" style="color:rgb(226, 103, 124);">设为默认</a></div></td>
						@endif
					</tr>
					@endforeach
				</table>
			</div>
			<a href="javascript:;" class="vd" id="vd">添加新地址</a>
			<span class="zuiduo">最多可添加4条收货地址</span>

			<div class="addzhidi">
				<form id='form' action="/user/address/creat" method="post">
					 {{ csrf_field() }}
				<span class="tijid">添加收货地址</span>
				<ul class="jgjg">
					<li>收 货  人 ：<input class="shouren" type="text" name="consignee" required>&nbsp;<span class="hong">*</span></li>
					<li>手机号码：<input class="phon" type="text" name="mobile"  required>&nbsp;<span class="hong">*</span></li>
					<li>所在地区：
						<div class="form-inline">
								      <div data-toggle="distpicker">
								        <div class="form-group">
								          <label class="sr-only" for="province1">Province</label>
								          <select class="form-control" id="province1" name="province"></select>
								        </div>
								        <div class="form-group">
								          <label class="sr-only" for="city1">City</label>
								          <select class="form-control" id="city1" name="city"></select>
								        </div>
								        <div class="form-group">
								          <label class="sr-only" for="district1">District</label>
								          <select class="form-control" id="district1" name="district"></select>
								        </div>
								      </div>
								    </div>

					</li>

					<li>详细地址：<input class="xiaxss" type="text" name="address" required>&nbsp;<span class="hong">*</span> <span class="hong3">无需重复填写所在区域</span></li>
					<li>邮政编码：<input class="yougf" type="text" name="zipcode" required></li>
					<!-- <li>固定电话：<input class="gud" type="text" name=""></li> -->
				</ul>
				<input class="xunji" type="checkbox" name="is_default" value="1"> <span class="kl">设为默认地址</span>
				<!-- <a class="bao" href="javascript:;">保存</a> -->
				<input type="submit" class="bao" value="保存">
				<a class="quxio" href="javascript:;">取消</a>
				<span class="hong1">*</span>
			</form>
			</div>
			<div class="addzhidi" id="addzhidi">
				<form id='formeid' method="post">
					 {{ csrf_field() }}
				<span class="tijid">修改收货地址</span>
				<ul class="jgjg">
					<li>收 货  人 ：<input class="shouren" type="text" name="consignee" required>&nbsp;<span class="hong">*</span></li>
					<li>手机号码：<input class="phon" type="text" name="mobile"  required>&nbsp;<span class="hong">*</span></li>
					<li>所在地区：
						<div class="form-inline">
											<div data-toggle="distpicker">
												<div class="form-group">
													<label class="sr-only" for="province1">Province</label>
													<select class="form-control" id="province1" name="province"></select>
												</div>
												<div class="form-group">
													<label class="sr-only" for="city1">City</label>
													<select class="form-control" id="city1" name="city"></select>
												</div>
												<div class="form-group">
													<label class="sr-only" for="district1">District</label>
													<select class="form-control" id="district1" name="district"></select>
												</div>
											</div>
										</div>

					</li>

					<li>详细地址：<input class="xiaxss" type="text" name="address" required>&nbsp;<span class="hong">*</span> <span class="hong3">无需重复填写所在区域</span></li>
					<li>邮政编码：<input class="yougf" type="text" name="zipcode" required></li>
					<!-- <li>固定电话：<input class="gud" type="text" name=""></li> -->
				</ul>
				<input class="xunji" type="checkbox" name="is_default" value="1"> <span class="kl">设为默认地址</span>
				<!-- <a class="bao" href="javascript:;">保存</a> -->
				<input type="submit" class="bao" value="保存">
				<a class="quxio" href="javascript:;">取消</a>
				<span class="hong1">*</span>
			</form>
			</div>
		</div>
	</div>
	@include('layout.footer')
	
</body>
<script type="text/javascript">
	$('.one ul li').each(function(j){
		$(this).on("click",function(){
			var card = $(this);
			card.attr('id',"bian").siblings().removeAttr("id")

		})
	})
	var kaiguan = 2;
	var kaiguan1 = 2;

		$('.vd').click(function(){
			if(kaiguan%2==0){
				$('.addzhidi').show();
				$('#addzhidi').hide();
			}
			else{
				$('.addzhidi').hide()
			}
			kaiguan++;
		})


	$('.quxio').click(function(){
		console.log(1)
		$('.addzhidi').hide()
	})

	$('.h11').click(function(){
		if(kaiguan1%2==0){
			$('.addzhidi').hide();
			$('#addzhidi').show();
		}
		else{
			$('#addzhidi').hide()
		}
		kaiguan1++;

	})
	$('.c1').click(function(){
		alert('请在下方修改你的收货地址');
		var id=$(this).attr('data');
		$.ajax({
		headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type:'POST',
		url:'/user/address/'+id+'/edit',
		dataType: "json",
		data:'id'+id,
		success:function(data){
			$('.shouren').val(data.consignee)
			$('.phon').val(data.mobile)
			$('.xiaxss').val(data.address)
			$('.yougf').val(data.zipcode)
			$('#formeid').attr('action','/user/address/'+data.id+'/store')
			if(data.is_default==1){
				$('.xunji').attr("checked",'true');
			}
		}
	})
	})
$('.smoren').click(function(){
	var id=$(this).attr('data');
	$.ajax({
	headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	},
	type:'POST',
	url:'/user/address/'+id+'/default',
	dataType: "json",
	data:'id'+id,
	success:function(data){
		window.location.reload();

	}
})
})
</script>
</html>
