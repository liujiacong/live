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
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 导航列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加导航</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="10%">标题</th>
      <th width="10%">是否展示</th>
      <th width="15%">图片</th>
      <th width="10%">url</th>
      <th width="10%">排序</th>
      <th width="10%">操作</th>
    </tr>
    <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($value->id); ?></td>
      <td><?php echo e($value->name); ?></td>
      <td>
        <?php if($value->is_show==1): ?>
        是
        <?php else: ?>
        否
        <?php endif; ?>
      </td>
      <td>
      <img  src="<?php echo e($value->pic); ?>" width="50" height="50">
       
      </td>
      <td><?php echo e($value->url); ?></td>
      <td><?php echo e($value->order); ?></td>
      <td><div class="button-group"><a class="button border-main" href="/admin/shop/banner/<?php echo e($value->id); ?>/edi"><span class="icon-edit"></span> 修改</a>
        <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo e($value->id); ?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
  <?php echo e($banner->links()); ?>

</div>
<script type="text/javascript">
function del(id){
	if(confirm("您确定要删除吗?")){
window.location.href="/admin/shop/banner/"+id+"/del";
	}
}
</script>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/shop/banner/add" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name"  required/>
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>是否展示：</label>
        </div>
        <div class="field">
          <select name="is_show" class="input w50">
            <option value="0">否</option>
            <option value="1">是</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
         <input type="file" class="ol" name="pic">
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>url：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="url" value=""  required/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order" value="10"  data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>
