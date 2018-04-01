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
        <li> <a class="button border-main icon-plus-square-o" href="/store/my/goods/add"> 添加内容</a> </li>
        <li>搜索：</li>

        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="window.location=this.value;">
              <option value="/store/my/goods_cate/">请选择分类</option>
              <?php $__currentLoopData = $me->GoodsCate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="/store/my/goods_cate/<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </li>
        </if>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th width="10%">上下架</th>
        <th>图片</th>
        <th>标题</th>
        <th>价格</th>


        <th>本店分类</th>
        <th>平台分类</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>

        <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td style="text-align:left; padding-left:20px;"><?php echo e($value->id); ?></td>
          <?php if($value->is_sale==0): ?>
          <td ><font color="#00CC99">上架</font></td>
          <?php else: ?>
          <td ><font color="red">下架</font></td>
          <?php endif; ?>
              <?php   $picture=unserialize($value->picture) ?>
          <td width="10%"><img src="<?php echo e($picture[0]); ?>" alt="" width="70" height="50" /></td>
          <td><?php echo e($value->goods_title); ?></td>
          <td><font color="#00CC99"><?php echo e($value->shop_price); ?></font></td>
          <td><font color="#00CC99"><?php echo $value->cate->name; ?></font></td>
          <td><font color="#00CC99"><?php echo $value->extend_cates->name; ?></font></td>

          <td><?php echo e($value->updated_at); ?></td>
          <td><div class="button-group"> <a class="button border-main" href="/store/my/goods/<?php echo e($value->id); ?>/edit"><span class="icon-edit"></span> 修改</a>
            <?php if($value->is_sale==0): ?>
             <a class="button border-red" href="javascript:void(0)" onclick="return unsale(<?php echo e($value->id); ?>)"><span class="icon-trash-o"></span> 下架</a>
             <?php else: ?>
             <a class="button border-red" href="javascript:void(0)" onclick="return sale(<?php echo e($value->id); ?>)"><span class="icon-trash-o"></span> 上架</a>
             <?php endif; ?>
             <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo e($value->id); ?>)"><span class="icon-trash-o"></span> 删除</a>
            </div></td>
        </tr>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




    </table>
      <?php echo e($goods->links()); ?>

  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){

}
function unsale(id){
	if(confirm("您确定要下架吗?")){
          window.location.href="/store/my/goods/"+id+"/unsale";
	}
}
function sale(id){
	if(confirm("您确定要上架吗?")){
          window.location.href="/store/my/goods/"+id+"/sale";
	}
}

//单个删除
function del(id){
	if(confirm("您确定要删除吗?")){
          window.location.href="/store/my/goods/"+id+"/delete";
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
