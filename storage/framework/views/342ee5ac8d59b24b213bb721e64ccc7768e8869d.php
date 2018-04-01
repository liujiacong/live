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
      <ul class="search" style="padding-left:10px;">
        <li> <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加属性</button> </li>
        <li>搜索：</li>

          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="window.location=this.value;">
              <option value="">请选择分类</option>
              <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value='/store/my/attr_cate/<?php echo e($value->id); ?>'><?php echo e($value->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </li>
      </ul>
    </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">属性名</th>
      <th width="10%">所属模型</th>
      <th width="10%">更新时间</th>
      <th width="10%">排序</th>
      <th width="10%">操作</th>
    </tr>
    <?php $__currentLoopData = $GoodsAttribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($value->id); ?></td>
      <td><?php echo e($value->attr_name); ?></td>
      <td><?php echo e($value->type->name); ?></td>
      <td><?php echo e($value->updated_at); ?></td>
      <td><?php echo e($value->order); ?></td>
      <td><div class="button-group"><a class="button border-main" href="/store/my/<?php echo e($value->id); ?>/attr_edi"><span class="icon-edit"></span> 修改</a>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
  <?php echo e($GoodsAttribute->links()); ?>

</div>
<script type="text/javascript">
function del(id){
	if(confirm("您确定要删除吗?")){
window.location.href="/admin/shop/cate/"+id+"/del";
	}
}
</script>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/store/my/attr_add">
      <?php echo e(csrf_field()); ?>

      <div class="form-group">
        <div class="label">
          <label>属性名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="attr_name"  required/>
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>所属模型：</label>
        </div>
        <div class="field">
          <select name="type_id" class="input w50">
            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order" value="0"  data-validate="number:排序必须为数字" />
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
