<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/css/pintuer.css">
<link rel="stylesheet" href="/css/admin.css">
<script src="/js/jquery.js"></script>
<script src="/js/pintuer.js"></script>
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li>搜索：</li>

        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="window.location=this.value;">
              <option value="">请选择分类</option>
             
              <option value="/admin/account/list?type=1">提现</option>
              <option value="/admin/account/list?type=2">出售</option>
              <option value="/admin/account/list?type=0">消费</option>
            
            </select>
          </li>
        </if>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th width="10%">用户名</th>
         <th>类型</th>
        <th>金额</th>
        <th>备注</th>
        <th>状态</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>

        @foreach($account as $key=>$value)
        <tr>
          <td style="text-align:left; padding-left:20px;">{{$value->id}}</td>
       
          <td ><font color="red">{{$value->user->name}}</font></td>

             
          <td>
								@if($value->type==0)
						  		消费
						  		@elseif($value->type==1)
						  		提现
						  		@else
						  		出售
						  		@endif
          </td>
          <td><font color="#00CC99">{{$value->money}}</font></td>

          <td><font color="#00CC99">{{$value->note}}</font></td>

          <td>
          @if($value->status==0)
          待处理
          @else
          已完成
          @endif
          </td>
          <td>{{$value->updated_at}}</td>
          <td>
          @if($value->type==1&&$value->status==0)
         <a class="button border-main" onclick="return zz({{$value->id}})"><span class="icon-edit"></span> 转账</a>
          @endif
          </td>
        </tr>


        @endforeach




    </table>
      {{ $account->links() }}
  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){

}
function zz(id){
	if(confirm("请确认对方的支付宝账号，并对其进行转账?")){
          window.location.href="/admin/account/zhuang/"+id;
	}
}

//全选
$("#checkall").click(function(){
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;
		$("#listform").submit();
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){

		$("#listform").submit();
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){

		$("#listform").submit();
	}
	else{
		alert("请选择要操作的内容!");

		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){


		$("#listform").submit();
	}
	else{
		alert("请选择要操作的内容!");

		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){

		$("#listform").submit();
	}
	else{
		alert("请选择要操作的内容!");

		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){

		$("#listform").submit();
	}
	else{
		alert("请选择要操作的内容!");

		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}
	    });
		if(i>1){
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{

			$("#listform").submit();
		}
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>
</body>
</html>
