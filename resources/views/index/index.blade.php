<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<script src="/js/jquery-1.7.2.min.js"></script>
		<!-- <script src="js/jquery-1.11.1.min.js"></script> -->
		<script src="/js/unslider.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/css/top.css">
		<link rel="stylesheet" type="text/css" href="/css/footer.css">
		<script type="text/javascript" src="/js/content.js"></script>
		<style>
			.banner { position: relative; overflow: auto; text-align: center;margin-top:10px }
			.banner li { list-style: none; }
			.banner ul li { float: left; }

			#b04 { width: 640px;}
			#b04 .dots { position: absolute; left:44%; right: 0; bottom: 20px;
				width: 98px;
				height: 20px;
				z-index: 111;
			}
			#b04 .dots li
			{
				display: inline-block;
				width: 10px;
				height: 10px;
				margin: 0 4px;
				text-indent: -999em;
				background: #efe8e0;
				border-radius: 50%;
				cursor: pointer;
				opacity: .4;
				-webkit-transition: background .5s, opacity .5s;
				-moz-transition: background .5s, opacity .5s;
				transition: background .5s, opacity .5s;
			}
			#b04 .dots li.active
			{
				background: #fe4d45;
				opacity: 1;
			}
			#b04 .arrow { position: absolute; top: 154px;}
			#b04 #al { left: 15px;}
			#b04 #ar { right: 15px;}
		</style>
		<link rel="stylesheet" type="text/css" href="/css/content.css">



	</head>
	<body>
		<!-- 头部 -->
		<!-- //顶部 -->
		<div class="top_all">
			<div class="top_con">
				<div class="top_left">
					<a href="/" class="left_1">
						<img src="/img/jia.png">
						<span>校园-live</span>
					</a>
					@if (\Auth::check())
					<span class="nihao">您好，<a href="/user/me"><font class="sjhm" style="color:#81a3f6">{{Auth::user()->name}}</font></a> <a style="color:#999999" href="/user/logout">[退出]</a>  </span>
					@else
					<a href="/user/login" class="login">登录</a>
					<a href="/user/register" class="zhuce">免费注册</a>
					@endif
				</div>
				<div class="top_right">
					<a href="javascript:;" id="tew">联系我们</a>
					@if (\Auth::check())
					<a href="/user/collection">我的收藏</a>
					@endif
					@if (\Auth::check())
					<a href="/user/me">个人中心</a>
					@endif
				</div>
			</div>
		</div>
		<!-- 头部 -->
		<div class="head_all">
			<div class="head_con">
				<div class="head_left">
					<a href="javascript:;">
						<img src="/img/logo1.jpg" class="logo1">
					</a>

				</div>
				<div class="head_right">
				<form action="/like" method="POST">
				{{ csrf_field() }}
					<div class="sousuo">
						<img src="/img/sousuo.png">
					</div>
					<input type="text" name='like' placeholder="搜一个商品，开始您的校园美好生活！">
				</div>
				</form>
			</div>
		</div>
		<!-- 导航 -->
		<div class="nav" style="width: 100%;height: 46px;background: #fe4d45;">
			<div class="nav_con">
				<div class="nav_left">
					<div class="feilei">
						<a href="javascript:;">
							<img src="/img/rr.png">
							<span>热门分类</span>
						</a>
					</div>
					@foreach($navi as $key=>$value)
					<a href="{{$value->url}}" class="nav_a">{{$value->name}}</a>
					@endforeach
				
				</div>
				<div class="nav_right">
					
					@if(!(\Auth::check())||Auth::user()->has_store==0)
					@if(!(\Auth::check()))
					<a href="/login" class="">
					@else
					<a href="/user/creatstore" class="">
					@endif
						<img src="/img/nav_right.png">
					</a>
					@endif
				</div>
				
				<div class="list" style="width: 168px;height: 391px;border:1px solid #e5e5e5;position:absolute;left:0px;z-index:100;top:101%;background:#ffffff;display: none;">
					<ul>
						@foreach($cate as $key=>$value)
						<li><a href="/cate/{{$value->id}}">{{$value->name}}</a><img src="/img/jian.jpg"></li>
						@endforeach
					</ul>
				</div>
			</div>

		</div>
		<!-- 内容 -->
		<div class="content">
			<div class="diyibu">
				<div class="diyibu_con">
					<div class="ph">
						<div class="list" style="float:left;width: 168px;height: 391px;border:1px solid #e5e5e5;background:#ffffff;">
							<ul>
								@foreach($cate as $key=>$value)
								<li><a href="/cate/{{$value->id}}">{{$value->name}}</a><img src="/img/jian.jpg"></li>
								@endforeach
							</ul>
						</div>
						<div class="banner" id="b04">
							<div class="meng"></div>
						    <ul>
						    @foreach($Banner as $key=>$value)
						        <li><a href="{{$value->url}}"><img src="{{$value->pic}}" alt="" width="771" height="381" ></a></li>
						    @endforeach
						    </ul>
						    <a href="javascript:void(0);" class="unslider-arrow04 prev"><img class="arrow" id="al" src="/img/arrowl.png" alt="prev" width="20" height="35"></a>
						    <a href="javascript:void(0);" class="unslider-arrow04 next"><img class="arrow" id="ar" src="/img/arrowr.png" alt="next" width="20" height="37"></a>
						</div>
						<div class="login_right">
							
							<div class="login_z">
								<div class="lei">

									<div class="zhutig">@if($articlecate[0]){{$articlecate[0]->name}}@endif</div>
									<div class="shike" id="te">@if($articlecate[1]){{$articlecate[1]->name}}@endif</div>
									<div class="shangjia">@if($articlecate[2]){{$articlecate[2]->name}}@endif</div>

									<div id="jiag" style="display: block;">
										@if($articlecate[2])
										@foreach($articlecate[2]->article()->limit(4)->get() as $k=>$v)
												<a href="news/{{$v->id}}">{{$v->title}}</a>
										@endforeach
										@endif
									</div>
									<div id="keg" style="display: none;">
										@if($articlecate[1])
										@foreach($articlecate[1]->article()->limit(4)->get() as $k=>$v)
												<a href="news/{{$v->id}}">{{$v->title}}</a>
										@endforeach
										@endif
									</div>
									<div id="keg1" style="display: none;">
										@if($articlecate[0])
										@foreach($articlecate[0]->article()->limit(4)->get() as $k=>$v)
												<a href="news/{{$v->id}}">{{$v->title}}</a>
										@endforeach
										@endif
									</div>
								</div>
							</div>
							

						</div>
					</div>
					
					
				</div>
			</div>
			<div class="dierbu">
				<div class="dierbu_con">
					<div class="ypmk">
						<div class="yptj">
							<span>每日推荐</span>
							<img src="/img/jingxizi.png" alt="">
							<div class="yptj_right">
								
							</div>
						</div>
						<div class="zhanshi youpin">
							@foreach($tui as $key=>$val)
							<?php   $picture=unserialize($val->picture);   ?>
								<div class="migs">
									<div class="dakz">
										<a href="/item/{{$val->id}}"><img src="{{$picture[0]}}" alt=""></a>
									</div>
									<a href="/item/{{$val->id}}"><span class="spbt">{{$val->goods_title}}<font style="color:red;">{{$val->goods_title2}}</font></span></a>
									<span class="pri_ce">￥{{$val->shop_price}}</span>
									<div class="xianliang">销量<font style="color:red">{{$val->sale_count}}</font></div>
									
									<a class="mflq" href="/item/{{$val->id}}">立即查看</a>
								</div>
							@endforeach
						
						</div>
					</div>
				</div>
			</div>


			<div class="disanbu">
				<div class="disanbu_con">
					<div class="ypmk1">
						<div class="yptj">
							<span>猜你喜欢</span>
							<img src="" alt="">
							<img src="/img/zuoyi.jpg" class="zuoyi">
							<img src="/img/youyi.jpg" class="youyi">
						</div>
						<div class="zhanshi hia">
							<div class="hezizou">
						@foreach($like as $key=>$val)
						<?php   $picture=unserialize($val->picture);   ?>
								<div class="migs">
									<div class="dakz">
										<a href="/item/{{$val->id}}"><img src="{{$picture[0]}}" alt=""></a>
									</div>
									<a href="/item/{{$val->id}}"><span class="spbt">{{$val->goods_title}}<font style="color:red;">{{$val->goods_title2}}</font></span></a>
									<span class="pri_ce">￥{{$val->shop_price}}</span>
									<div class="xianliang">销量<font style="color:red">{{$val->sale_count}}</font></div>
									
									<a class="mflq" href="/item/{{$val->id}}">立即查看</a>
								</div>
						@endforeach
								
							</div>

						</div>
					</div>
				</div>
			</div>
			
		
		</div>



		</div>
		@include('layout.footer')
	</body>
</html>
<!-- 头部 -->
<script type="text/javascript">
	$('.nav_a').each(function(){
		$(this).click(function(){
			var card = $(this);
			card.attr('id','mainte').siblings().removeAttr("id")
		})
	})
	$('.list ul li ').on('mouseover',function() {
		var cd = $(this)
		cd.find('a').css('color','#e31d14')
		cd.find('img').attr('src','img/jianzhi.png')
	});
	$('.list ul li ').on('mouseout',function() {
		var cd = $(this)
		cd.find('a').css('color','#747474')
		cd.find('img').attr('src','img/jian.jpg')
	});

</script>
<!-- 中间 -->
<script>

$(document).ready(function(e) {
	
    var unslider04 = $('#b04').unslider({
		dots: true
	}),
	data04 = unslider04.data('unslider');
	$('.unslider-arrow04').click(function() {
        var fn = this.className.split(' ')[1];
        data04[fn]();
    });
    $('#b04').find('.dots').eq(1).find('li').eq(0).attr('class','hgh')
    $('.shike').click(function(){
    	$(this).css({'border':'none',"background":"none"})
    	$('.zhutig').css({'border-right':" 1px solid #e5e5e5","border-bottom":  "1px solid #e5e5e5","background":"#f5f5f5"})
    	$('.shangjia').css({'border-left':" 1px solid #e5e5e5","border-bottom":  "1px solid #e5e5e5","background":"#f5f5f5"})
    	$('#jiag').hide()
    	$('#keg').show()
    	$('#keg1').hide()
    })
     $('.shangjia').click(function(){
    	$(this).css({'border':'none',"background":"none"})
    	$('.shike').css({'border-right':" 1px solid #e5e5e5","border-bottom":  "1px solid #e5e5e5","background":"#f5f5f5"})
    	$('.zhutig').css({'border-right':" 1px solid #e5e5e5","border-bottom":  "1px solid #e5e5e5","background":"#f5f5f5"})
    	$('#jiag').show()
    	$('#keg').hide()
    	$('#keg1').hide()
    })
     $('.zhutig').click(function(){
     	$(this).css({'border':'none',"background":"none"})
     	$('.shike').css({'border-left':" 1px solid #e5e5e5","border-bottom":  "1px solid #e5e5e5","background":"#f5f5f5"})
    	$('.shangjia').css({'border-left':" 1px solid #e5e5e5","border-bottom":  "1px solid #e5e5e5","background":"#f5f5f5"})
     	$('#jiag').hide()
    	$('#keg').hide()
    	$('#keg1').show()
     })
     $('.yptj_right a').each(function(){
     	$(this).on('click',function(){
     		var bg = $(this);
     		bg.attr('id','uy').siblings().removeAttr("id")
     	})
     })
     $('.yptj_right1 a').each(function(){
     	$(this).on('click',function(){
     		var bg = $(this);
     		bg.attr('id','gg').siblings().removeAttr("id")
     	})
     })
     var current = 0;
     $('.paixu a').each(function(){
     	$(this).on('click',function(){
     		var bg = $(this);
     		bg.attr('id','ko').siblings().removeAttr("id")
     		bg.find('img').attr('src','img/zhongde.jpg')
     		bg.siblings().find('img').attr('src','img/bude.jpg')
     		 current = (current+180)%360;
     		bg.find('img').css('transform',"rotate("+current+"deg)")
     	})
     })

      $('.f1').each(function(){
      	$(this).on('mouseover',function(){
      		$(this).find('div').stop().animate({
      			"right":"40px",
      			"opacity":"1"
      		},500)
      	})
      })
      $('.f1').each(function(){
      	$(this).on('mouseout',function(){
      		$(this).find('div').stop().animate({
      			"right":"70px",
      			"opacity":"0"
      		},500)
      	})
      })
      //滚动条滚动
      $(window).bind("scroll", function () {
                var sTop = $(window).scrollTop();
                var sTop = parseInt(sTop);
                if (sTop >= 1000) {
                    if (!$("#xsdb").is(":visible")) {
                        try {
                            $("#xsdb").slideDown();
                        } catch (e) {
                            $("#xsdb").show();
                        }
                    }
                }
                else {
                    if ($("#xsdb").is(":visible")) {
                        try {
                            $("#xsdb").slideUp();
                        } catch (e) {
                            $("#xsdb").hide();
                        }
                    }
                }
            });
       $("#xsdb").click(function() {
     		$("html,body").animate({scrollTop:0}, 500);
  		});

  		$('.renwu_sanjiao,.renwu_list').mouseover(function(){
  			$('.renwu_list').show();
  		})
  		$('.renwu_sanjiao,.renwu_list').mouseout(function(){
  			$('.renwu_list ').hide();
  		})
  		
	  // 中部轮播
			var index = 0;
			 var lastClickTime = new Date().getTime();
			 var delay = 500; //动画的延迟
			    $('.youyi').bind('click',function(){
			    	 if (new Date().getTime() - lastClickTime < delay) {
		   				 return;
		  			}
		  			lastClickTime = new Date().getTime();
			      	var index1 = $('.hezizou').find('.migs').length
			      	console.log(index1)
			      	console.log($('.hezizou').position().left)
			      	 var newLeft;
				      if($('.hezizou').position().left === -1198*(Math.ceil(index1/5)-1)){
				        newLeft = 0;
				      }else{
				        newLeft = $('.hezizou').position().left-1198;
				      }
				      // $('.hezizou').css('left',newLeft + "px");
				      $('.hezizou').css({left:newLeft +"px"});
			    })
			     $('.zuoyi').click(function(){
			     	 if (new Date().getTime() - lastClickTime < delay) {
		   				 return;
		  			}
		  			lastClickTime = new Date().getTime();
			    	var index1 = $('.hezizou').find('.migs').length
			      console.log($('.hezizou').position().left)
			      	 var newLeft;
				      if($('.hezizou').position().left === 0){
				        newLeft = -1198*(Math.ceil(index1/5)-1);
				      }else{
				        newLeft = $('.hezizou').position().left+1198;
				      }
				      // $('.hezizou').css('left',newLeft + "px");
				      $('.hezizou').css({left:newLeft +"px"});
				    })
  		
});

</script>

<!-- 底部 -->
