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
   
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th width="10%">用户</th>
        <th>商品ID</th>
        <th>内容</th>
        <th>是否展示</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>

        @foreach($Comment as $key=>$value)
        <tr>
          <td style="text-align:left; padding-left:20px;">{{$value->id}}</td>         
          <td ><font color="#00CC99">{{$value->user_name}}</font></td>
          <td width=""><a href="/item/{{$value->goods_id}}">{{$value->goods_id}}</a></td>
          <td>{{$value->content}}</td>
          <td><font color="#00CC99">
          @if($value->is_show==1)
          是
          @else
          否
          @endif
          </font></td>
          <td>{{$value->updated_at}}</td>
          <td><div class="button-group">
          @if($value->is_show==1)
          <a class="button border-red" href="javascript:void(0)" onclick="return not_show({{$value->id}})"><span class="icon-trash-o"></span> 取消展示</a>
          @else
             <a class="button border-red" href="javascript:void(0)" onclick="return is_show({{$value->id}})"><span class="icon-trash-o"></span> 展示</a>
          @endif
            </div></td>
        </tr>


        @endforeach




    </table>
      {{ $Comment->links() }}
  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){

}
function is_show(id){
	if(confirm("您确定要展示吗?")){
          window.location.href="/store/my/"+id+"/is_show";
	}
}
function not_show(id){
	if(confirm("您确定要取消展示吗?")){
          window.location.href="/store/my/"+id+"/is_notshow";
	}
}



</script>
</body>
</html>
