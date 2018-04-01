		<link rel="stylesheet" href="/css/bootstrap.min.css" />

<?php echo $__env->make('layout.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<script type="text/javascript" src="/js/jquery-1.11.3.js" ></script>
		<script type="text/javascript" src="/js/jquery-3.1.1.js" ></script>
		<title></title>
		<!-- 该页面的css样式 -->
		<link rel="stylesheet" href="/css/product-list.css" />
		<!-- <script type="text/javascript" src="/js/bootstrap.min.js" ></script> -->
		<script type="text/javascript" src="/js/product-list.js"></script>
	</head>
	<body>
		<div class="wrapper">

			<!-- 搜索组 -->
			<div class="container mt-70">
				<div class="row">
					<div class="col-lg-1">
						<span class="dis-inlineblock drow-8">所有商品共<?php echo e($goods->total()); ?>个</span>
					</div>
					<div class="col-lg-2">
					
					</div>
				</div>
			<!-- 列表展示 -->
				<div class="mt-20">
					<div class="container bgc-grad pl-20 pt-20 pb-20">
					
						<!-- 排序列表 -->
						<div class="row mt-20">
							<div class="col-lg-12"  id="list">
								<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-lg-3 pr-20 mt-20">
									<div class="product-plane border">
										<div class="img-banner">
											  <?php   $picture=unserialize($value->picture) ?>
											<a href="/item/<?php echo e($value->id); ?>"><img src="<?php echo e($picture[0]); ?>"></a>
											<div class="is-follow" data="<?php echo e($value->id); ?>" collection="<?php if(in_array($value->id,$arr)): ?> 1 <?php else: ?> 0 <?php endif; ?>" >
												<?php if(in_array($value->id,$arr)): ?>
												<span class="dis-none"><img src="/img/un-follow.png">关注</span>
											 	<span class='dis-block'><img src='/img/y-follow.png'>已关注</span>
											  <?php else: ?>
												<span class="dis-block"><img src="/img/un-follow.png">关注</span>
												<span class='dis-none'><img src='/img/y-follow.png'>已关注</span>
												<?php endif; ?>

											</div>
										</div>
										<div class="info mt-20">
											<div class="row">
												<div class="col-lg-12 pb-20 pl-20 pr-20">
													<div class='col-lg-12 text-left pb-20'>
														<span class="info-intro"><?php echo e($value->goods_title); ?></span>
														<span class="info-intro"><?php echo e($value->goods_title2); ?></span>
													</div>
													<div class='col-lg-4 text-left'>
														<span class="info-price">￥<?php echo e($value->shop_price); ?></span>
													</div>
													<div class="col-lg-8 text-right">
														<span class="info-comment">已有<?php echo e($value->comment_count); ?>

															<span class='info-pernum'></span>人评价
														</span>
													</div>
													<div class="col-lg-8 text-right">
														<span class="info-comment">销量<?php echo e($value->sale_count); ?>

															<span class="info-comment">库存<?php echo e($value->store_count); ?>

														</span>
													</div>


												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					</div>
					<!-- 分页 -->

					<?php echo e($goods->links()); ?>


				</div>
			</div>
		</div>
	</body>
	<script>
	//关注
	var isfollow= false;
	$(".is-follow").click(function(){
		<?php if(\Auth::check()): ?>
		 var chek=true;
		<?php else: ?>
		var chek=false;
		<?php endif; ?>

		if(!chek){
			window.location.href="/user/login";
		}else{
			isfollow= $(this).attr("collection");
			goods_id= $(this).attr("data");
			if(isfollow==0){
				console.log('like');
				$.ajax({
					headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
								type:'POST',
								data:{goods_id:goods_id},
								url:"/like/"+goods_id,
								success:function(data){
									$(this).find("span").css("display","none");
									$(this).find("span").eq(1).css("display","block");
									$(this).attr("collection",1);
								}
				});
				$(this).find("span").css("display","none");
				$(this).find("span").eq(1).css("display","block");
				$(this).attr("collection",1);
			}
			else{
								console.log('unlike');
				$.ajax({
					headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
								type:'POST',
								data:{goods_id:goods_id},
								url:"/unlike/"+goods_id,
								success:function(data){
									$(this).find("span").css("display","none");
									$(this).find("span").eq(0).css("display","block");
									$(this).attr("collection",0);
								}
				});

				$(this).find("span").css("display","none");
				$(this).find("span").eq(0).css("display","block");
				$(this).attr("collection",0);


			}
		}

		//保存状态值
	})
	</script>
	<?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</html>

