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
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加模型</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">模型名称</th>
      <th width="10%">属性and规格</th>
      <th width="10%">操作</th>
    </tr>
    <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($value->id); ?></td>
      <td><?php echo e($value->name); ?></td>
      <td><div class="button-group">
        <a class="button border-main" href="/store/my/attr_cate/<?php echo e($value->id); ?>"><span class="icon"></span> 属性</a>
        <a class="button border-red" href="/store/my/spec_cate/<?php echo e($value->id); ?>"><span class="icon"></span> 规格</a>
      </div>
    </td>
      <td><div class="button-group">
        <a class="button border-main" href="/store/my/<?php echo e($value->id); ?>/type_edi"><span class="icon-edit"></span> 修改</a>
        <a class="button border-red" href="javascript:void(0)" onclick="return del(1,2)"><span class="icon-trash-o"></span> 删除</a>
      </div>
    </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
  <?php echo e($type->links()); ?>

</div>
<script type="text/javascript">
function del(id,mid){
	if(confirm("您确定要删除吗?")){

	}
}
</script>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/store/my/type_add">
        <?php echo e(csrf_field()); ?>

      <div class="form-group">
        <div class="label">
          <label>模型名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name" required/>
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
