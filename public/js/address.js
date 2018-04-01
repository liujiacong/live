// window.onload = function(){
// 	// var addred  = $('.biao').find('tr').eq(1).find('td').eq(2)//详细地址
// 	// var named  = $('.biao').find('tr').eq(1).find('td').eq(0)//收货人
// 	// var phoned  = $('.biao').find('tr').eq(1).find('td').eq(1)//手机号
// 	// var youbd  = $('.biao').find('tr').eq(1).find('td').eq(3)//邮编码
// 	// $.ajax({
// 	// 	url: 'http://zs.newphp.com/index/usercentent/myaddress',
// 	// 	type: 'GET',
// 	// 	dataType: 'json',
// 	// 	success:function(data){
// 	// 		console.log(data)
// 	// 		// 默认地址
// 	// 		addred.text(data.Maddress.sheng+data.Maddress.shi+ data.Maddress.jiedao)
// 	// 		named.text(data.Maddress.shouhuoren)
// 	// 		phoned.text(data.Maddress.mobile)
// 	// 		youbd.text(data.Maddress.youbian)
// 	// 		if(data.Maddress.default=="Y"){
// 	// 			console.log("默认地址")
// 	// 		}
// 	// 		for(var i=0;i<data.address.length;i++){
// 	// 			$('.biao').find('.dff').eq(i).find('td').eq(0).text(data.address[i].shouhuoren)
// 	// 			$('.biao').find('.dff').eq(i).find('td').eq(1).text(data.address[i].mobile)
// 	// 			$('.biao').find('.dff').eq(i).find('td').eq(2).text(data.address[i].sheng+data.address[i].shi+ data.address[i].jiedao)
// 	// 			$('.biao').find('.dff').eq(i).find('td').eq(3).text(data.address[i].youbian)
// 	// 			// for(var j=0;j<4;j++){
// 	// 			// 	$('.biao').find('dff').eq(i).find('td').eq('j').text()
// 	// 			// }
// 	// 		}
// 	// 		$('.shet').each(function(j){
// 	// 			$(this).on("click",function(){
// 	// 				console.log(j)
// 	// 				var gh = data.address[j].id;//默认id
// 	// 				$.ajax({
// 	// 					url: 'http://zs.newphp.com/index/usercentent/setMaddress',
// 	// 					type: 'GET',
// 	// 					dataType: 'json',
// 	// 					data:{id:gh},
// 	// 					success:function(data){
// 	// 						console.log(data)
// 	// 					},
// 	// 					error:function(data){
// 	// 						console.log(404)
// 	// 						window.location.reload()
// 	// 					}
// 	// 				})
// 	// 			})
// 	// 		})
// 	// 		$('.chu').each(function(j){
// 	// 			$(this).on("click",function(){
// 	// 				console.log(j)
// 	// 				var gh = data.address[j].id;//默认id
// 	// 				console.log(gh)
// 	// 				// $.ajax({
// 	// 				// 	url: 'http://zs.newphp.com/index/usercentent/setMaddress',
// 	// 				// 	type: 'GET',
// 	// 				// 	dataType: 'json',
// 	// 				// 	data:{id:gh},
// 	// 				// 	success:function(data){
// 	// 				// 		console.log(data)
// 	// 				// 	},
// 	// 				// 	error:function(data){
// 	// 				// 		console.log(404)
// 	// 				// 		window.location.reload()
// 	// 				// 	}
// 	// 				// })
// 	// 			})
// 	// 		})
// 	// 		$('.chu1').click(function(){
// 	// 			console.log(1)
// 	// 		})
// 	// 	},
// 	// 	error:function(data){
// 	// 		console.log(404)
// 	// 	}
// 	// })
// 	$.ajax({
// 		url: 'http://zs.newphp.com/index/usercentent/myaddress',
// 		type: 'GET',
// 		dataType: 'json',
// 		success:function(data){
// 			console.log(data)
// 			if(data.Maddress.default=="Y"){
// 				var biaoti = "<div class='addre'><table border='1' class='biao'><tr id='yi'><th>收货人</th><th>手机/电话号码</th><th>详细地址</th><th>邮政编码</th><th>操作</th><th></th></tr><tr class='er'><td>"+data.Maddress.shouhuoren+"</td><td>"+data.Maddress.mobile+"</td><td>"+data.Maddress.sheng+data.Maddress.shi+ data.Maddress.jiedao+"</td><td>"+data.Maddress.youbian+"</td><td class='hh'><a class='c1' href='javascript:;'>修改</a> &nbsp;  <a class='c2' href='javascript:;'>删除</a></td><td><div class='moren'>默认地址</div></td></tr></table></div>"
// 				$('.mid').append(biaoti)
// 			}
// 			for(var i=0;i<data.address.length;i++){
// 				// $('.biao').find('.dff').eq(i).find('td').eq(0).text(data.address[i].shouhuoren)
// 				// $('.biao').find('.dff').eq(i).find('td').eq(1).text(data.address[i].mobile)
// 				// $('.biao').find('.dff').eq(i).find('td').eq(2).text(data.address[i].sheng+data.address[i].shi+ data.address[i].jiedao)
// 				// $('.biao').find('.dff').eq(i).find('td').eq(3).text(data.address[i].youbian)
// 				// for(var j=0;j<4;j++){
// 				// 	$('.biao').find('dff').eq(i).find('td').eq('j').text()
// 				// }
// 				var qita = "<tr class='er dff'><td>"+data.address[i].shouhuoren+"</td><td>18826472020</td><td>广州市白云区越秀城市广场12号</td><td>123456</td><td class='hh'><a class='c3' href='javascript:;'>修改</a> &nbsp; <a class='c4' href='javascript:;'>删除</a></td><td class='jju'><a href='javascript:;' class='moren1'>设为默认地址</a></td></tr>"
// 				$('.biao').append(qita)
// 			}

// 		},
// 		error:function(data){
// 			console.log(404)
// 		}
// 	})
	
	
// }