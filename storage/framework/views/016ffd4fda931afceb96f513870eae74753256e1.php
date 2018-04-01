<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <?php echo $__env->make('UEditor::head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
  <?php if(count($errors)): ?>
      <div class=" xuan" role="alert">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
  <?php endif; ?>
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>编辑内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/article/<?php echo e($Article->id); ?>/edi">
      <?php echo e(csrf_field()); ?>

      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo e($Article->title); ?>" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>

      <if condition="$iscid eq 1">
        <div class="form-group">
          <div class="label">
            <label>分类标题：</label>
          </div>
          <div class="field">
            <select name="cid" class="input w50">
              <option value="">请选择分类</option>
              <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($value->id); ?>" <?php if($value->id==$Article->cid): ?> selected <?php endif; ?>><?php echo e($value->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="tips"></div>
          </div>
        </div>
      </if>

      <div class="form-group">

        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <!-- <textarea name="content" class="input" style="height:450px; border:1px solid #ddd;"></textarea> -->
          <script id="container" name="content" type="text/plain"><?php echo $Article->content;?></script>
          <script type="text/javascript">
              var ue = UE.getEditor('container');
                  ue.ready(function() {
                  ue.execCommand('serverparam', '_token', '<?php echo e(csrf_token()); ?>');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
              });
          </script>
          <div class="tips"></div>
        </div>
      </div>

      <div class="clear"></div>


      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="sort_order" value="0"  data-validate="number:排序必须为数字" />
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

</body></html>
