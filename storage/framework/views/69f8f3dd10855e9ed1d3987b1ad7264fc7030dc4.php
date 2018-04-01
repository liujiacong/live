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
  <!-- <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加属性</button>
  </div> -->
  <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加属性</button> </li>
        <li>搜索：</li>

          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="window.location=this.value;">
              <option value="/store/my/spec_list">请选择分类</option>
              <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value='/store/my/spec_cate/<?php echo e($value->id); ?>'><?php echo e($value->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </li>
      </ul>
    </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">规格名</th>
      <th width="10%">所属模型</th>
      <th width="15%">规格项</th>
      <th width="10%">更新时间</th>
      <th width="10%">排序</th>
      <th width="10%">操作</th>
    </tr>
    <?php $__currentLoopData = $spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($value->id); ?></td>
      <td><?php echo e($value->name); ?></td>
      <td><?php echo e($value->type->name); ?></td>
      <td>
        <?php $__currentLoopData = $value->SpecItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php echo e($val->item); ?>;
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </td>
      <td><?php echo e($value->updated_at); ?></td>
      <td><?php echo e($value->order); ?></td>
      <td><div class="button-group"><a class="button border-main" href="/store/my/<?php echo e($value->id); ?>/spec_edi"><span class="icon-edit"></span> 修改</a>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
  <?php echo e($spec->links()); ?>

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
    <form method="post" class="form-x" action="/store/my/spec_add">
      <?php echo e(csrf_field()); ?>

      <div class="form-group">
        <div class="label">
          <label>属性名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name"  required/>
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
          <label>规格项：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input" name="spec_item" style="height:100px;" required></textarea>
          <div class="tips">一行为一个规格项</div>
        </div>
     </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order" value="0" required  data-validate="number:排序必须为数字" />
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
