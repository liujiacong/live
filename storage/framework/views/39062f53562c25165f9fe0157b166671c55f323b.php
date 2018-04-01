<?php echo $__env->make('layout.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的账户</title>
	<link rel="stylesheet" type="text/css" href="/css/account.css">
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/js/account.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<style>
		.money {
			position: absolute;
			left: 300px;
			top: 100px;
		}
	</style>
</head>
<body>
	<div class="content">
		<div class="dingbu"><span>当前位置：<a href="javascript:;">首页</a> > <a href="javascript:;">用户中心</a> > <a href="javascript:;">我的账户</a></span></div>
		<div class="one">
			<ul>
				<li ><a href="/user/me" >首页</a></li>
                <li><a href="/user/order/0">我的订单</a></li>
                <li><a href="/user/address">收货地址</a></li>
                <li id="bian"><a href="/user/myaccount">我的账户</a></li>
                <li><a href="/user/safe">账户安全</a></li>
                <li><a href="/user/collection">我的收藏</a></li>
                 <?php if($me->has_store): ?>
                <li><a href="/store/home/index" target="_black">高级管理</a></li>
                <?php endif; ?>
			</ul>
		</div><?php if(count($errors) > 0): ?>
							<div class="alert alert-danger">

								 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										 <div class="tishi"><?php echo e($error); ?></div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</div>
			<?php endif; ?>
		<div class="mid">
		
			<div class="hongbao">
				<span class="shaiow">我的账户</span>
				<span>我的余额</span>
				<span>￥<?php echo e($me->money); ?></span>
				<span>我的过度余额</span>
				<span>￥<?php echo e($me->guodu_money); ?></span>
				<form action="/user/tixian" method="POST" id='tixian' class="money">
					<?php echo e(csrf_field()); ?>

					提现到:<input style="width:150px; height:30px;" placeholder="支付宝账号" name='alipay' required="" />
					<a href="#" class='tixian' >提现</a>
					<a href="javascript:;"></a>
				</form>
				
			</div>
		<div class="mid2">
				<div class="biaoti">
					<div class="zuuo"></div>
					<div class="sange">
						<div id="teshu"><a href="javascript:;" class="ff">账户流水</a></div>
					</div>
				</div>
				<div class="liebiao">
					<table border="1" class="biao">
						 	<tr id="yi">
						  		<th>时间</th>
						  		<th>类型</th>
						  		<th>金额</th>
						  		<th>备注</th>
						  		<th>状态</th>
						  		<th>操作</th>
						  	</tr>
						  	<?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  	<tr class="hexian">
						  		<td class="timeer"><?php echo e($value->created_at); ?></td>
						  		<td class="huaq">
						  		<?php if($value->type==0): ?>
						  		消费
						  		<?php elseif($value->type==1): ?>
						  		提现
						  		<?php else: ?>
						  		出售
						  		<?php endif; ?>
						  		</td>
						  		<td class="fu">￥<?php echo e($value->money); ?></td>
						  		<td class="yyu"><?php echo e($value->note); ?></td>
						  		<td class="yyu">
						  		<?php if($value->status==0): ?>
						  		待处理
						  		<?php else: ?>
						  		已完成
						  		<?php endif; ?>
						  		</td>
						  		<td class="yyu">
						  		<?php if($value->type==1&&$value->status==0): ?>
						  		<a href='/user/qx_tixian/<?php echo e($value->id); ?>'>撤销</a>
						  		<?php endif; ?>
						  		</td>
						  	</tr>
						  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>
					<?php echo e($account->links()); ?>

				</div>
			</div>



		</div>
	</div>
	<?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
</body>
<script type="text/javascript">
	$('.one ul li').each(function(j){
		$(this).on("click",function(){
			var card = $(this);
			card.attr('id',"bian").siblings().removeAttr("id")

		})
	})
	$('.e').each(function(){
		$(this).on("click",function(){
			var card1 = $(this);
			card1.attr('id',"xunhzo").siblings().removeAttr("id")
		})
	})
	$('.ff').each(function(){
		$(this).on("click",function(){
			var card12 = $(this);
			card12.parent().attr('id',"teshu").siblings().removeAttr("id")
		})
	})

	$(".tixian").click(function(){
		$('#tixian').submit();
	})
</script>
</html>
