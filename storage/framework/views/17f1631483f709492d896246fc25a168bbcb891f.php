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
    <div class="panel-head"><strong class="icon-reorder"> 门店列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>

    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th width="10%">销售额</th>
        <th>门店名</th>
        <th>描述</th>
        <th>状态</th>
        <th>所属用户</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
        <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td style="text-align:left; padding-left:20px;"><?php echo e($value->id); ?></td>
          <td><?php echo e($value->money_count); ?></td>
          <td width="10%"><?php echo e($value->name); ?></td>
          <td><?php echo e($value->store_conten); ?></td>
          <td>
            <font color="#00CC99">
              <?php if($value->status==0): ?>
              代审核
              <?php elseif($value->status==1): ?>
              已审核
              <?php elseif($value->status==-1): ?>
              已驳回
              <?php elseif($value->status==-2): ?>
              冻结
              <?php endif; ?>
          </font>
        </td>
          <td><?php echo e($value->user->name); ?></td>
          <td><?php echo e($value->updated_at); ?></td>
          <td>
            <div class="button-group">
            <?php if($value->status==0): ?>
          <a class="button border-main" href="/admin/store/<?php echo e($value->id); ?>/allow"><span class="icon-edit"></span>通过</a>
          <a class="button border-red" href="javascript:void(0)" onclick="return unallow(<?php echo e($value->id); ?>)"><span class="icon-trash-o"></span> 驳回</a>
            <?php elseif($value->status==1): ?>
          <a class="button border-red" href="javascript:void(0)" onclick="return lock(<?php echo e($value->id); ?>)"><span class="icon-trash-o"></span> 冻结</a>
            <?php elseif($value->status==-2): ?>
            <a class="button border-main" href="javascript:void(0);" onclick="return unlock(<?php echo e($value->id); ?>)"><span class="icon-edit"></span>解冻</a>
            <?php endif; ?>

            </div>
        </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>
    <?php echo e($store->links()); ?>

  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){

}

//驳回
function unallow(id){
	if(confirm("您确定要驳回吗?")){
    window.location.href="/admin/store/"+id+"/unallow";
	}
}
//冻结
function lock(id){
	if(confirm("您确定要冻结吗?")){
    window.location.href="/admin/store/"+id+"/lock";
	}
}
//解冻
function unlock(id){
	if(confirm("您确定要解除冻结吗?")){
    window.location.href="/admin/store/"+id+"/unlock";
	}
}
</script>
</body>
</html>
