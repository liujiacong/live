<!DOCTYPE html><?php echo $__env->make('layout.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>校园-live</title>
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="/css/tpshop.css">
    <script src="/js/global.js"></script>
    <script src="/js/pc_common.js"></script>
    <script src="/js/layer/layer.js"></script>
    <link href="/css/common.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/jh.css"></head>

  <body>
    <div class="fn-cart-confirm">

        <!-- end收货信息 -->
        <form name="cart2_form" id="cart2_form" method="post" action="/shopping2order">
              <?php echo e(csrf_field()); ?>

               <input type="hidden" id="item_id" name="item_id" value="<?php echo e($goods_spec_price->id); ?>"/><!-- 商品规格id -->
               <input type="hidden" id="goods_id" name="goods_id" value="<?php echo e($goods->id); ?>"/><!-- 商品id -->
               <input type="hidden" id="goods_num" name="goods_num" value="<?php echo e($num); ?>"/><!-- 商品num -->
          <div class="layout be-table fo-fa ma-bo-45">
            <div class="con-info">
              <div class="con-y-info ma-bo-35">
                <h3>收货人信息
                  <b>[
                    <a href="javascript:void(0);" onclick="add_edit_address(0);">使用新地址</a>]</b></h3>
                <div id="ajax_address">
                  <?php $__currentLoopData = $me->user_address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <!--默认选中的地址-->
                  <?php if($val->is_default==1): ?>
                  <div class="order-address-list  address_current">
                    <table width="100%" cellspacing="0" cellpadding="0" border="1" class="address">
                      <tbody>
                        <tr>
                          <td width="60" class="default">
                            <i>
                            </i>
                          </td>
                          <td width="60" class="co-red default">寄送至</td>
                          <td width="60" class="address_id">
                            <input type="radio" onclick="swidth_address(this);" name="address_id" value="<?php echo e($val->id); ?>" checked="checked"></td>
                          <td width="160" class="consignee">
                            <b>收货人:<?php echo e($val->consignee); ?></b>
                          </td>
                          <td width="460" class="address2">
                            <span>地址:<?php echo e($val->province); ?> <?php echo e($val->city); ?> <?php echo e($val->district); ?> <?php echo e($val->address); ?></span></td>
                          <td width="200" class="mobile">
                            <span>电话：<?php echo e($val->mobile); ?></span></td>
                          <td width="60" class="wi100">
                            <span>默认地址</span></td>
                          <td width="60" class="wi100">
                            <span>
                              <a onclick="add_edit_address(<?php echo e($val->id); ?>);">修改</a></span>
                          </td>
                          
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <?php else: ?>
                  <div class="order-address-list">
                    <table width="100%" cellspacing="0" cellpadding="0" border="1" class="address">
                      <tbody>
                        <tr>
                          <td width="60" class="default">
                            <i>
                            </i>
                          </td>
                          <td width="60" class="co-red default">寄送至</td>
                          <td width="60" class="address_id">
                            <input type="radio" onclick="swidth_address(this);" name="address_id" value="<?php echo e($val->id); ?>"></td>
                          <td width="160" class="consignee">
                            <b>收货人:<?php echo e($val->consignee); ?></b>
                          </td>
                          <td width="460" class="address2">
                            <span>地址: <?php echo e($val->province); ?> <?php echo e($val->city); ?> <?php echo e($val->district); ?> <?php echo e($val->address); ?> </span></td>
                          <td width="200" class="mobile">
                            <span>电话：<?php echo e($val->mobile); ?></span></td>
                          <td width="60" class="wi100">
                            <span>&nbsp;&nbsp;</span></td>
                          <td width="60" class="wi100">
                            <span>
                              <a onclick="add_edit_address(<?php echo e($val->id); ?>);">修改</a></span>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
              </div>
            </div>
            <div class="sc-area">
              <div class="dt-order-area">
                <div class="order-pro-list">
                  <!--商品列表-->
                  <div class="order-pro-list">
                    <div class="yxspy">
                      <div class="hv"></div>
                      <div class="bv">
                        <table border="0" cellpadding="0" cellspacing="0">
                          <thead>
                            <tr>
                              <th class="tr-pro">商品</th>
                              <th class="tr-price">单价（元）</th>
                              <!--/if condition="($user[discount] neq 1)"-->
                              <!--<th class="tr-price">会员折扣价</th>-->
                              <th class="tr-price"></th>
                              <!--//if-->
                              <th class="tr-quantity">数量</th>
                              <th class="tr-subtotal">小计（元）</th></tr>
                          </thead>
                        </table>
                      </div>
                    </div>
                    <div class="leiliste">
                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                          <?php $a=0 ?>
                          
                          <tr>
                            <td class="tr-pro">
                              <ul class="pro-area-2">
                                <li>
                                  <a title="<?php echo e($goods->goods_name); ?>" target="_blank" href="/item/<?php echo e($goods->id); ?>" seed="item-name"><?php echo e($goods->goods_title); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo e($goods_spec_price->key_name); ?></a></li></ul>
                            </td>
                            <td class="tr-price te-al">¥<?php echo e($goods_spec_price->price); ?></td>
                            <td class="tr-price te-al"></td>
                            <td class="tr-quantity te-al"><?php echo e($num); ?></td>
                            <td rowspan="1" class="tr-subtotal te-al">
                              <p>
                                <b class='price'><?php echo e($num * $goods_spec_price->price); ?></b>
                              </p>
                            </td>
                          </tr>
                            <?php

                            $a=$a+($num * $goods_spec_price->price);
                             ?>
                       

                          <tr></tr>
                          <tr>
                            <td colspan="5">
                              <span class="span_ored">给卖家留言:</span>
                              <input class="span_text texter tapassa" type="text" name="user_note" onkeyup="checkfilltextarea('.tapassa','50')">
                              <span class="xianzd">
                                <em id="zero">50</em>/50</span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <br>
                  <!--商品列表 end--></div>
                <div class="order-pro-total">
                  <div class="fl wctmes"></div>
                  <div class="fr wcnhy">
                    <div class="fzoubddv">
                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                          <tr>
                            <td class="tal">商品总金额：</td>
                            <td class="tar">&nbsp;¥&nbsp;
                              <em id="order-cost-area"><?php echo e($a); ?></em></td>
                          </tr>

                        </tbody>
                      </table>
                      <p class="yifje-order">
                        <span class="p-subtotal-price">应付金额：
                          <b class="total">¥</b>
                          <b class="total" id="payables"><?php echo e($a); ?></b></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="order-action-area te-al-ri">
                <div class="woypdbe sc-acti-list">
                  <!-- <a class="Sub-orders gwc-qjs" href="javascript:void(0);" onclick="submit_order2();"><span>提交订单</span></a> -->

                  <a class="Sub-orders gwc-qjs" href="javascript:void(0);" onclick="submit_order();"><span>提交订单</span></a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script>
        /**
         * 留言字数限制
         * tea ：要限制数字的class名
         * nums ：允许输入的最大值
         * zero ：输入时改变数值的ID
         */
        function checkfilltextarea(tea,nums){
            var len = $(tea).val().length;
            if(len > nums){
                $(tea).val($(tea).val().substring(0,nums));
            }
            var num = nums - len;
            num <= 0 ? $("#zero").text(0): $("#zero").text(num);  //防止出现负数
        }

        /**
         * 新增修改收货地址
         * id 为零 则为新增, 否则是修改
         */
        function add_edit_address(id) {
            if (id > 0)
                var url = "/ajaxedi/" + id; // 修改地址
            else
                var url = "/ajaxaddr";	// 新增地址
            layer.open({
                type: 2,
                title: '添加收货地址',
                shadeClose: true,
                shade: 0.8,
                area: ['880px', '580px'],
                content: url,
            });
        }
        // 添加修改收货地址回调函数
        function call_back_fun(v) {
            layer.closeAll(); // 关闭窗口
            location.reload();
        }




        // 切换收货地址
        function swidth_address(obj) {
            var province_id = $(obj).attr('data-province-id');
            var city_id = $(obj).attr('data-city-id');
            var district_id = $(obj).attr('data-district-id');
            if (typeof($(obj).attr('data-province-id')) != 'undefined') {
                ajax_pickup(province_id,city_id,district_id,0);
            }
            $(".order-address-list").removeClass('address_current');
            $(obj).parent().parent().parent().parent().parent().addClass('address_current');
        }



        // 提交订单
        ajax_return_status = 1;
        function submit_order()
        {
            if(ajax_return_status == 0)
                return false;
            ajax_return_status = 0;
            // $('#cart2_form').submit()
            $.ajax({
                type : "POST",
                url:"/shopping2order",
                data : $('#cart2_form').serialize(),
                dataType: "json",
                success: function(data){

                    if(data.status != '1')
                    {
                        // alert(data.msg); //执行有误
                        layer.alert(data.msg, {icon: 2});

                        ajax_return_status = 1; // 上一次ajax 已经返回, 可以进行下一次 ajax请求

                        return false;
                    }else{
                      layer.msg('订单提交成功，正在跳转!', {
                          icon: 1,   // 成功图标
                          time: 2000 //2秒关闭
                      }, function(){ // 关闭后执行的函数
                          location.href = "/carto3/"+data.result; // 跳转到结算页
                      });
                    }

                }
            });
        }
        function submit_order2(){
          $('#cart2_form').submit();
        }




    </script>
<?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </body>

</html>
