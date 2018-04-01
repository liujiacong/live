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
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改分类</strong></div>
  <div class="body-content">
  <?php if(count($errors) > 0): ?>
              <div class="alert alert-danger">

                 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="tishi"><?php echo e($error); ?></div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
      <?php endif; ?>
    <form method="post" class="form-x" action="/admin/shop/banner/<?php echo e($Banner->id); ?>/edi" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <div class="form-group">
        <div class="label">
          <label>导航名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name" value="<?php echo e($Banner->name); ?>" required />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>是否首页展示：</label>
        </div>
        <div class="field">
          <select name="is_show" class="input w50">
            <option value="0"<?php if($Banner->is_show==0): ?> selected <?php endif; ?>>否</option>
            <option value="1" <?php if($Banner->is_show==1): ?> selected <?php endif; ?>>是</option>
          </select>
        </div>
      </div>
     
      <div class="form-group">
        <div class="label">
          <label>url:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="url" value="<?php echo e($Banner->url); ?>" required />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片:</label>
        </div>
        <div class="field">
          <input type="file" class="ol" name="pic">
          <div class="tips">如要更新，即上传图片</div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order" value="<?php echo e($Banner->order); ?>"  data-validate="number:排序必须为数字" />
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
