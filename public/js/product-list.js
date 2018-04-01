$(function(){
	//页面最多显示条数
	var maxPageSize = 16;

	//下一页
	function nexpage(){
		$('.pageNum').val();
	}

	//排序
	function sort(index){


	}

	//查询
	$(".btn-search").click(function(){
		var searchStr = $('.search-plane>input').val();
		console.log('searchStr： ',searchStr);
	});

	

	//$("#list").on("click",".is-follow",follow(true));

	/*function listHTML(data){
		var strHTML=  "<div class='col-lg-3 pr-20 mt-20'><div class='product-plane border'>";
		var strHTML1= "<div class='img-banner'><a href="+data.href+"><img src="+data.imgs[0]+"></a><div class='is-follow' onclick='follow(true)'><span class='dis-block'><img src='img/un-follow.png'>关注</span><span class='dis-none'><img src='img/y-follow.png'>已关注</span></div></div>";
		var strHTML2= "<div class='row mt-20'><div class='col-lg-12 img-swiper'><div class='col-lg-3'><img src="+data.imgs[0]+"></div><div class='col-lg-3'><img src="+data.imgs[1]+"></div><div class='col-lg-3'><img src="+data.imgs[2]+ "></div><div class='col-lg-3'><img src="+data.imgs[3]+"></div></div></div>";
		var strHTML3= "<div class='info mt-20'><div class='row'><div class='col-lg-12'><div class='col-lg-4 text-left'><span class='info-price'>￥"+data.price;
		var strHTML4= "</span></div><div class='col-lg-8 text-right'><span class='info-comment'>已有<span class='info-pernum'>"+data.pernum;
		var strHTML5= "+</span>人评价</span></div><div class='col-lg-12 text-left'><span class='info-intro'>"+data.intro;
		var strHTML6="</span></div></div></div></div></div></div>";
		return strHTML+strHTML1+strHTML2+strHTML3+strHTML4+strHTML5+strHTML6;
	}

	//获取json内容,生成列表元素
	$.getJSON("dataJson/product-list.json",function(resp){
		console.log("--------resp",resp);
		if(resp.code==="0000"){
			$.each(resp.dataList,function(index,data){
				$("#list").append(listHTML(data));
			})
			var total = "共有"+resp.total+"条记录";
			$('.total').text(total);
			$("#list").hide().show();
		}
	})
	*/
})
