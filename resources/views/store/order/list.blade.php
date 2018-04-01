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
              
              <option value="/store/my/order_list?id=0">未支付</option>
              <option value="/store/my/order_list?id=1">待发货</option>
              <option value="/store/my/order_list?id=2">待收货</option>
              <option value="/store/my/order_list?id=3">已取消</option>
              <option value="/store/my/order_list?id=4">代评价</option>
              <option value="/store/my/order_list?id=5">已完成</option>
  
            </select>
          </li>
        </if>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">订单号</th>
        <th width="10%">收货人</th>
        <th>总价</th>
        <th>支付状态</th>
        <th>支付方式</th>
        <th>订单状态</th>
        <th>用户留言</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
       @foreach($Order as $key=>$val)
        <tr>
          <td style="text-align:left; padding-left:20px;"><a href="/store/my/order/{{$val->id}}" target="_blank">{{$val->order_sn}}</a></td>
          <td>{{$val->consignee}}</td>
          <td width="10%">{{$val->total_price}}</td>
          <td>
         @if($val->pay_status==0)
         未支付
         @else
         已支付
         @endif
          </td>
          <td>
            <font color="#00CC99">
              {{$val->pay_name}}

          </font>
        </td>
         <td>
            <font color="#009999">
              @if($val->order_status==0)
                待支付
                @elseif($val->order_status==1)
                代发货
                @elseif($val->order_status==2)
                待收货
                @elseif($val->order_status==3)
                已取消
                @elseif($val->order_status==4)
                代评价
                @elseif($val->order_status==5)
                已完成

                @endif

          </font>
        </td>
          <td>{{$val->user_note}}</td>
          <td>{{$val->updated_at}}</td>
          <td>
            <div class="button-group">
           
          <a class="button border-main"  href="/store/my/order/{{$val->id}}" target="_blank"><span class="icon-edit"></span>查看详情</a>
          @if($val->shipping_status==0&&$val->order_status!=0)
          <a class="button border-main"  href="#" onclick="return fahuo({{$val->id}})"><span class="icon-edit"></span>发货</a>
          @endif
          @if($val->pay_code=='cod'&&$val->shipping_status!=0&&$val->pay_status==0)
          <a class="button border-main"  href="#" onclick="return pay({{$val->id}})"><span class="icon-edit"></span>支付</a>
          @endif
         

            </div>
        </td>
        </tr>
        @endforeach

    </table>
    {{ $Order->links() }}

  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){

}


function fahuo(id){
	if(confirm("你这是在发货哦！！！")){
    window.location.href="/store/my/fahuo/"+id;
	}
}

function pay(id){
  if(confirm("你这是到付的支付哦！！！")){
    window.location.href="/store/my/pay/"+id;
  }
}

</script>
</body>
</html>
