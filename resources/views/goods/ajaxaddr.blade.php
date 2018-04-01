<html>
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>收货地址</title>
	<link rel="stylesheet" type="text/css" href="/css/address.css">
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
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
<div class="addzhidi" style="display:block;top:0px;">
  <form id='form' action="/user/address/creattocart" method="post">
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
<script>
</script>
</html>
