@include('layout.storehead')
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="/css/bootstrap.css" />
		<script type="text/javascript" src="/js/jquery-1.11.3.js" ></script>
		<script type="text/javascript" src="/js/jquery-3.1.1.js" ></script>
		<title></title>
		<!-- 该页面的css样式 -->
		<link rel="stylesheet" href="/css/product-list.css" />
		<script type="text/javascript" src="/js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="/js/product-list.js"></script>
	</head>
	<body>
		<div class="wrapper">

			<!-- 搜索组 -->
			<div class="container mt-70">
				<div class="row">
					<div class="col-lg-1">
						<span class="dis-inlineblock drow-8">@if($cate_id==0)所有商品@endif共{{$goods->total()}}个</span>
					</div>
					<div class="col-lg-2">
						<div class="input-group search-plane">
							<input type="text" class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-default btn-search" type="button">
									搜索
								</button>
							</span>
						</div>
					</div>
				</div>
			<!-- 列表展示 -->
				<div class="mt-20">
					<div class="container bgc-grad pl-20 pt-20 pb-20">
						<!-- 排序按钮组 -->
						<div class="btn-group btn-group-sm">
							<button type="button" class="btn btn-default">综合排序</button>
						    <button type="button" class="btn btn-default">销量</button>
						    <button type="button" class="btn btn-default">价格</button>
						    <button type="button" class="btn btn-default">评价数</button>
						    <button type="button" class="btn btn-default">新品</button>
						</div>
						<!-- 排序列表 -->
						<div class="row mt-20">
							<div class="col-lg-12"  id="list">
								@foreach($goods as $key=>$value)
								<div class="col-lg-3 pr-20 mt-20">
									<div class="product-plane border">
										<div class="img-banner">
											  <?php   $picture=unserialize($value->picture) ?>
											<a href="/item/{{$value->id}}"><img src="{{$picture[0]}}"></a>
											<div class="is-follow" data="{{$value->id}}" collection="@if(in_array($value->id,$arr)) 1 @else 0 @endif" >
												@if(in_array($value->id,$arr))
												<span class="dis-none"><img src="/img/un-follow.png">关注</span>
											 	<span class='dis-block'><img src='/img/y-follow.png'>已关注</span>
											  @else
												<span class="dis-block"><img src="/img/un-follow.png">关注</span>
												<span class='dis-none'><img src='/img/y-follow.png'>已关注</span>
												@endif

											</div>
										</div>
										<div class="info mt-20">
											<div class="row">
												<div class="col-lg-12 pb-20 pl-20 pr-20">
													<div class='col-lg-12 text-left pb-20'>
														<span class="info-intro">{{$value->goods_title}}</span>
														<span class="info-intro">{{$value->goods_title2}}</span>
													</div>
													<div class='col-lg-4 text-left'>
														<span class="info-price">￥{{$value->shop_price}}</span>
														<span class="info">￥{{$value->shop_price}}</span>

													</div>
													<div class="col-lg-8 text-right">
														<span class="info-comment">已有{{$value->comment_count}}
															<span class='info-pernum'></span>人评价
														</span>
													</div>
													<div class="col-lg-8 text-right">
														<span class="info-comment">销量{{$value->sale_count}}
															<span class="info-comment">库存{{$value->store_count}}
														</span>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					<!-- 分页 -->

					{{ $goods->links() }}

				</div>
			</div>
		</div>
	</body>
	<script>
	//关注
	var isfollow= false;
	$(".is-follow").click(function(){
		@if(\Auth::check())
		 var chek=true;
		@else
		var chek=false;
		@endif

		if(!chek){
			window.location.href="/login";
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
								url:"/store/like/"+goods_id,
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
								url:"/store/unlike/"+goods_id,
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
</html>
