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
    <div class="panel-head"><strong class="icon-reorder"> 订单列表</strong> <a href="" style="float:right; display:none;"></a></div>
<div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li>订单分类：</li>

        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="window.location=this.value;">
              <option value="/store/my/goods_cate/">订单状态</option>
              
              <option value="/admin/order/list?id=0">未支付</option>
              <option value="/admin/order/list?id=1">待发货</option>
              <option value="/admin/order/list?id=2">待收货</option>
              <option value="/admin/order/list?id=3">已取消</option>
              <option value="/admin/order/list?id=4">代评价</option>
              <option value="/admin/order/list?id=5">已完成</option>
  
            </select>
          </li>
        </if>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">订单号</th>
        <th width="10%">所属用户</th>
        <th>总价</th>
        <th>订单状态</th>
        <th>支付状态</th>
        <th>支付方式</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
       <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td style="text-align:left; padding-left:20px;"><a href="<?php echo e($val->id); ?>" target="_blank"><?php echo e($val->order_sn); ?></a></td>
          <td><?php echo e($val->user->name); ?></td>
          <td width="10%"><?php echo e($val->total_price); ?></td>
          <td>
          <font color="#00CC99">
              <?php if($val->order_status==0): ?>
                待支付
                <?php elseif($val->order_status==1): ?>
                代发货
                <?php elseif($val->order_status==2): ?>
                待收货
                <?php elseif($val->order_status==3): ?>
                已取消
                <?php elseif($val->order_status==4): ?>
                代评价
                <?php elseif($val->order_status==5): ?>
                已完成

                <?php endif; ?>

          </font>
          </td>
          <td>
           <?php if($val->pay_status==1): ?>
          已支付
          <?php else: ?>
          未支付
          <?php endif; ?>
           
        </td>
          <td><?php echo e($val->pay_name); ?></td>
          <td><?php echo e($val->updated_at); ?></td>
          <td>
            <div class="button-group">
           
          <a class="button border-main"  href="<?php echo e($val->id); ?>" target="_blank"><span class="icon-edit"></span>查看详情</a>
          <!-- <a class="button border-red" href="javascript:void(0)" onclick="return unallow()"><span class="icon-trash-o"></span> 驳回</a> -->
           

            </div>
        </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>
    <?php echo e($order->links()); ?>


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
