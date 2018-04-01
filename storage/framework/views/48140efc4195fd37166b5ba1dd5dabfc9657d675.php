<!doctype html>
<html>
<head>
<?php echo $__env->make('UEditor::head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="/static/css/main.css" rel="stylesheet" type="text/css">
<link href="/static/css/page.css" rel="stylesheet" type="text/css">
<link href="/static/font/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="__PUBLIC__/static/font/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="/static/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="/static/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/static/js/jquery.js"></script>
  <script src="http://www.jq22.com/jquery/vue.min.js"></script>
<script type="text/javascript" src="/static/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="/static/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
<script type="text/javascript" src="/static/js/admin.js"></script>
<script type="text/javascript" src="/static/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="/static/js/common.js"></script>
<script type="text/javascript" src="/static/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.mousewheel.js"></script>
<script src="/js/myFormValidate.js"></script>
<script src="/js/myAjax2.js"></script>
</head>
<style>
  .upload_warp_img_div_del {
    position: absolute;
    top: 6px;
    width: 16px;
    right: 4px;
  }

  .upload_warp_img_div_top {
    position: absolute;
    top: 0;
    width: 100%;
    height: 30px;
    background-color: rgba(0, 0, 0, 0.4);
    line-height: 30px;
    text-align: left;
    color: #fff;
    font-size: 12px;
    text-indent: 4px;
  }

  .upload_warp_img_div_text {
    white-space: nowrap;
    width: 80%;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .upload_warp_img_div img {
    max-width: 100%;
    max-height: 100%;
    vertical-align: middle;
  }

  .upload_warp_img_div {
    position: relative;
    height: 100px;
    width: 120px;
    border: 1px solid #ccc;
    margin: 0px 30px 10px 0px;
    float: left;
    line-height: 100px;
    display: table-cell;
    text-align: center;
    background-color: #eee;
    cursor: pointer;
  }

  .upload_warp_img {
    border-top: 1px solid #D2D2D2;
    padding: 14px 0 0 14px;
    overflow: hidden
  }

  .upload_warp_text {
    text-align: left;
    margin-bottom: 10px;
    padding-top: 10px;
    text-indent: 14px;
    border-top: 1px solid #ccc;
    font-size: 14px;
  }

  .upload_warp_right {
    float: left;
    width: 57%;
    margin-left: 2%;
    height: 100%;
    border: 1px dashed #999;
    border-radius: 4px;
    line-height: 130px;
    color: #999;
  }

  .upload_warp_left img {
    margin-top: 32px;
  }

  .upload_warp_left {
    float: left;
    width: 40%;
    height: 100%;
    border: 1px dashed #999;
    border-radius: 4px;
    cursor: pointer;
  }

  .upload_warp {
    margin: 14px;
    height: 130px;
  }

  .upload {
    border: 1px solid #ccc;
    background-color: #fff;
    width: 650px;
    box-shadow: 0px 1px 0px #ccc;
    border-radius: 4px;
  }

  .hello {
    width: 650px;
    margin-left: 34%;
    text-align: center;
  }
</style>
<style>
    ul.group-list {
        width: 96%;min-width: 1000px; margin: auto 5px;list-style: disc outside none;
    }
    ul.group-list li {
        white-space: nowrap;float: left;
        width: 150px; height: 25px;
        padding: 3px 5px;list-style-type: none;
        list-style-position: outside;border: 0px;margin: 0px;
    }
    .row .table-bordered td .btn,.row .table-bordered td img{
        vertical-align: middle;
    }
    .row .table-bordered td{
      padding: 8px;
      line-height: 1.42857143;
    }
    .table-bordered{
      width: 100%
    }
    .table-bordered tr td{
      border: 1px solid #f4f4f4;
    }
    .btn-success {
        color: #fff;
        background-color: #449d44;
        border-color: #398439 solid 1px;
    }
    .btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
.col-xs-8 {
    width: 66.66666667%;
}
.col-xs-4 {
    width: 33.33333333%;
}
.col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    float: left;
}
.row .tab-pane h4{
  padding: 10px 0;
}
.row .tab-pane h4 input{
  vertical-align: middle;
}
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}
.ncap-form-default .title{
  border-bottom: 0;
}
.ncap-form-default dl.row, .ncap-form-all dd.opt{
    /*border-color: #F0F0F0;*/
    border: none;
}
.ncap-form-default dl.row:hover, .ncap-form-all dd.opt:hover{
    border: none;
    box-shadow: inherit;
}
</style>
<!--物流配置 css -end-->
<!--以下是在线编辑器 代码 -->

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
<?php if(count($errors) > 0): ?>
              <div class="alert alert-danger">

                 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="tishi"><?php echo e($error); ?></div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
      <?php endif; ?>
    <div class="fixed-bar">
        <div class="item-title">

        </div>
    </div>

    <!--表单数据-->
    <form method="post" id="addEditGoodsForm" action="/store/my/goods/addgoods">
<!--通用信息-->
        <div class="ncap-form-default tab_div_1">
            <dl class="row">
                <dt class="tit">
                    <label for="record_no">商品主标题</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="<?php echo e($goods->goods_title); ?>" name="goods_name" class="input-txt"/>
                    <span class="err" id="err_goods_name" style="color:#F00; display:none;"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="store_name">商品副标题</label>
                </dt>
                <dd class="opt">
                    <textarea rows="3" cols="80" name="goods_remark" class="input-txt"><?php echo e($goods->goods_title); ?></textarea>
                    <span id="err_goods_remark" class="err" style="color:#F00; display:none;"></span>
                </dd>
            </dl>
			<!-- <dl class="row">
                <dt class="tit">
                    <label for="record_no">商品货号</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="" name="goods_sn" class="input-txt" required/>
                    <span class="err" id="err_goods_sn" style="color:#F00; display:none;"></span>
                    <p class="notic">如果不填会自动生成</p>
                </dd>
            </dl> -->
            <dl class="row">
                <dt class="tit">
                    <label for="record_no">本店商品分类</label>
                </dt>
                <dd class="opt">
                      <select name="cate_id" id="cat_id" onChange="get_category(this.value,'cat_id_2','0');" class="small form-control">
                        <option value="0">请选择商品分类</option>
                        <?php $__currentLoopData = $me->GoodsCate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($val->id); ?>" <?php if($goods->cate_id==$val->id): ?> selected=ture <?php endif; ?>>
                             <?php echo e($val->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>

                    <span class="err" id="err_cat_id" style="color:#F00; display:none;"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="record_no">平台商品分类</label>
                </dt>
                <dd class="opt">
                  <select name="extend_cate_id" id="extend_cat_id" onChange="get_category(this.value,'extend_cat_id_2','0');" class="small form-control">
                    <option value="">请选择商品分类</option>
                    <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($val->id); ?>" <?php if($goods->extend_cate==$val->id): ?> selected=ture <?php endif; ?>>
                         <?php echo e($val->name); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                  </select>

                    <span class="err" id="" style="color:#F00; display:none;"></span>
                </dd>
            </dl>
            <!-- 商品模型-->
            		<div class="ncap-form-default tab_div_3">
                        <dl class="row">

                                    <div class="tab-pane" id="tab_goods_spec">
                                        <table class="table table-bordered" id="goods_spec_table">
                                            <tr>
                                                <td>商品模型:</td>
                                                <td>
                                                  <select name="goods_type" id="spec_type" class="form-control" style="width:250px;">
                                                    <option value="">选择商品模型</option>
                                                    <?php $__currentLoopData = $me->GoodsType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value=<?php echo e($val->id); ?> <?php if($goods->goods_type==$val->id): ?> selected=ture <?php endif; ?>>
                                                         <?php echo e($val->name); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </select>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="row">
                                        	<!-- ajax 返回规格-->
                                        	<div id="ajax_spec_data" class="col-xs-8" ></div>
                                        	<div id="" class="col-xs-4" >
                                        	    <table class="table table-bordered" id="goods_attr_table">
            		                                <tr>
            		                                    <td><b>商品属性</b>：</td>
            		                                </tr>
            		                            </table>
                                        	</div>
                                        </div>
                                    </div>

                        </dl>
                    </div>
            <!-- 商品模型-->



            <dl class="row">
                <dt class="tit">
                    <label for="record_no">本店售价</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="<?php echo e($goods->shop_price); ?>" name="shop_price" class="t_mane" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                    <span class="err" id="err_shop_price" style="color:#F00; display:none;"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="record_no">市场价</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="<?php echo e($goods->market_Price); ?>" name="market_price" class="t_mane" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                    <span class="err" id="err_market_price" style="color:#F00; display:none;"></span>
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit">
                    <label for="record_no">成本价</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="<?php echo e($goods->cost_price); ?>" name="cost_price" class="t_mane" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                    <span class="err" id="err_cost_price" style="color:#F00; display:none;"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="record_no">排序</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="<?php echo e($goods->order); ?>" name="order" class="t_mane" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                    <span class="err" id="err_market_price" style="color:#F00; display:none;"></span>
                </dd>
            </dl>
            <div class="ncap-form-default tab_div_3">
                <label for="record_no">商品图集</label>
          <div id="app">
            <div class="hello">
              <div class="upload">
                <div class="upload_warp">
                  <div class="upload_warp_left" @click="fileClick">
                    <img src="/img/upload.png">
                  </div>
                  <div class="upload_warp_right" @drop="drop($event)" @dragenter="dragenter($event)" @dragover="dragover($event)">
                    或者将文件拖到此处
                  </div>
                </div>
                <div class="upload_warp_text">
                  选中{{imgList.length}}张文件，共{{bytesToSize(this.size)}}
                </div>
                <input @change="fileChange($event)" type="file" id="upload_file" multiple style="display: none"/>

                  <?php   $picture=unserialize($goods->picture);
                                  if($picture==''){$picture=array();}
          ?>
                <div class="upload_warp_img" <?php if($picture==''): ?>style="display: none;"<?php endif; ?> >

                  <?php foreach ($picture as $key => $value){ ?>
                              <?php if($value!=''){ ?>
                              <div class="upload_warp_img_div" id="div{$key}">
                                  <div class="upload_warp_img_div_top">
                                      <div class="upload_warp_img_div_text">
                                          <?php echo preg_replace('/.*\//','',$value); ?>
                                      </div>
                                      <img src="/img/del.png" onclick="document.getElementById('div{$key}').remove()" class="upload_warp_img_div_del">
                                  </div>
                                  <img src="<?php echo e($value); ?>">
                                  <input type="hidden" name="pic2[]" value="<?php echo e($value); ?>">
                              </div>
                            <?php } ?>
                            <?php } ?>



                  <div class="upload_warp_img_div" v-for="(item,index) of imgList">
                    <div class="upload_warp_img_div_top">
                      <div class="upload_warp_img_div_text">
                        {{item.file.name}}
                      </div>
                      <img src="/img/del.png" class="upload_warp_img_div_del" @click="fileDel(index)">
                    </div>
                    <input type="hidden" name="pic[]" :value="item.file.src">

                    <img :src="item.file.src">
                  </div>
                </div>
              </div>
            </div>
          </div>
            </div>

            <dl class="row">
                <dt class="tit">
                    <label for="record_no">商品详情描述</label>
                </dt>
                <!-- 加载编辑器的容器 -->
  <script id="container" name="content" type="text/plain">

  </script>

  <!-- 实例化编辑器 -->
  <script type="text/javascript">
      var ue = UE.getEditor('container');
  </script>
            </dl>
        </div>
<!--通用信息-->




		<div class="ncap-form-default">
            <div class="bot">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="goods_id" value="0">
                <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onClick="buttonsubmit();">确认提交</a>
            </div>
        </div>
     </form>
    <!--表单数据-->
</div>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
<script>
  //  import up from  './src/components/Hello'
  var app = new Vue({
    el: '#app',
    data () {
      return {
        imgList: [],
        size: 0
      }
    },
      methods: {
          fileClick() {
              document.getElementById('upload_file').click()
          },
          fileChange(el) {
              if (!el.target.files[0].size) return;
              this.fileList(el.target);
              el.target.value = ''
          },
          fileList(fileList) {
              let files = fileList.files;
              for (let i = 0; i < files.length; i++) {
                  //判断是否为文件夹
                  if (files[i].type != '') {
                      this.fileAdd(files[i]);
                  } else {
                      //文件夹处理
                      this.folders(fileList.items[i]);
                  }
              }
          },
          //文件夹处理
          folders(files) {
              let _this = this;
              //判断是否为原生file
              if (files.kind) {
                  files = files.webkitGetAsEntry();
              }
              files.createReader().readEntries(function (file) {
                  for (let i = 0; i < file.length; i++) {
                      if (file[i].isFile) {
                          _this.foldersAdd(file[i]);
                      } else {
                          _this.folders(file[i]);
                      }
                  }
              })
          },
          foldersAdd(entry) {
              let _this = this;
              entry.file(function (file) {
                  _this.fileAdd(file)
              })
          },
          fileAdd(file) {
              //总大小
              this.size = this.size + file.size;
              //判断是否为图片文件
              if (file.type.indexOf('image') == -1) {
                  file.src = 'wenjian.png';
                  this.imgList.push({
                      file
                  });
              } else {
                  let reader = new FileReader();
                  reader.vue = this;
                  reader.readAsDataURL(file);
                  reader.onload = function () {
                      file.src = this.result;
                      this.vue.imgList.push({
                          file
                      });
                  }
              }
          },
          fileDel(index) {
              this.size = this.size - this.imgList[index].file.size;//总大小
              this.imgList.splice(index, 1);
          },
          bytesToSize(bytes) {
              if (bytes === 0) return '0 B';
              let k = 1000, // or 1024
                  sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
                  i = Math.floor(Math.log(bytes) / Math.log(k));
              return (bytes / Math.pow(k, i)).toPrecision(3) + ' ' + sizes[i];
          },
          dragenter(el) {
              el.stopPropagation();
              el.preventDefault();
          },
          dragover(el) {
              el.stopPropagation();
              el.preventDefault();
          },
          drop(el) {
              el.stopPropagation();
              el.preventDefault();
              this.fileList(el.dataTransfer);
          }
      }
  })
</script>
<script type="text/javascript">

     function buttonsubmit(){
         document.getElementById('addEditGoodsForm').submit()
         //下面为用jquery方法提交，不过需要引入js文件
         //$('#myform').submit();
     }
 </script>
<script>

    // 物流设置相 关
     $(document).ready(function(){
        $(":checkbox[cka]").click(function(){
            var $cks = $(":checkbox[ck='"+$(this).attr("cka")+"']");
            if($(this).is(':checked')){
                $cks.each(function(){$(this).prop("checked",true);});
            }else{
                $cks.each(function(){$(this).removeAttr('checked');});
            }
        });
    });
    // 物流设置相 关
    function choosebox(o){
        var vt = $(o).is(':checked');
        if(vt){
            $('input[type=checkbox]').prop('checked',vt);
        }else{
            $('input[type=checkbox]').removeAttr('checked');
        }
    }
    /*
     * 以下是图片上传方法
     */
    // 上传商品图片成功回调函数
    function call_back(fileurl_tmp){
        $("#original_img").val(fileurl_tmp);
    	$("#original_img2").attr('href', fileurl_tmp);
    }

    // 上传商品相册回调函数
    function call_back2(paths){

        var  last_div = $(".goods_xc:last").prop("outerHTML");
        for (i=0;i<paths.length ;i++ )
        {
            $(".goods_xc:eq(0)").before(last_div);	// 插入一个 新图片
                $(".goods_xc:eq(0)").find('a:eq(0)').attr('href',paths[i]).attr('onclick','').attr('target', "_blank");// 修改他的链接地址
            $(".goods_xc:eq(0)").find('img').attr('src',paths[i]);// 修改他的图片路径
                $(".goods_xc:eq(0)").find('a:eq(1)').attr('onclick',"ClearPicArr2(this,'"+paths[i]+"')").text('删除');
            $(".goods_xc:eq(0)").find('input').val(paths[i]); // 设置隐藏域 要提交的值
        }
    }
    /*
     * 上传之后删除组图input
     * @access      public
     * @val            string  删除的图片input
     */
    function ClearPicArr2(obj,path)
    {
    	$.ajax({
                    type:'GET',
                    url:"{:U('Admin/Uploadify/delupload')}",
                    data:{action:"del", filename:path},
                    success:function(){
                           $(obj).parent().remove(); // 删除完服务器的, 再删除 html上的图片
                    }
		});
		// 删除数据库记录
    	$.ajax({
                    type:'GET',
                    url:"{:U('Admin/Goods/del_goods_images')}",
                    data:{filename:path},
                    success:function(){
                          //
                    }
		});
    }



/** 以下 商品属性相关 js*/

// 属性输入框的加减事件
function addAttr(a)
{
	var attr = $(a).parent().parent().prop("outerHTML");
	attr = attr.replace('addAttr','delAttr').replace('+','-');
	$(a).parent().parent().after(attr);
}
// 属性输入框的加减事件
function delAttr(a)
{
   $(a).parent().parent().remove();
}


/** 以下 商品规格相关 js*/
$(document).ready(function(){

    // 商品模型切换时 ajax 调用  返回不同的属性输入框
    $("#spec_type").change(function(){
        var spec_type = $(this).val();
        console.log(spec_type)
            $.ajax({
              headers: {
          				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
                    type:'POST',
                    data:{spec_type:spec_type},
                    url:"/store/my/goods/spec",
                    success:function(data){
                           $("#ajax_spec_data").html('')
                           $("#ajax_spec_data").append(data);
			                        ajaxGetSpecInput();	// 触发完  马上触发 规格输入框
                    }
            });
            //商品类型切换时 ajax 调用  返回不同的属性输入框
            $.ajax({
              headers: {
          				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
                 type:'POST',
                 data:{type_id:spec_type},
                 url:"/store/my/goods/ajaxGetAttrInput",
                 success:function(data){
                         $("#goods_attr_table tr:gt(0)").remove()
                         $("#goods_attr_table").append(data);
                 }
           });
    });
	// 触发商品规格
	$("#spec_type").trigger('change');

    $("input[name='exchange_integral']").blur(function(){
        var shop_price = parseInt($("input[name='shop_price']").val());
        var exchange_integral = parseInt($(this).val());
        if (shop_price * 100 < exchange_integral) {

        }
    });
});

/** 以下是编辑时默认选中某个商品分类*/



    $(document).ready(function(){

        //插件切换列表
        $('.tab-base').find('.tab').click(function(){
            $('.tab-base').find('.tab').each(function(){
                $(this).removeClass('current');
            });
            $(this).addClass('current');
			var tab_index = $(this).data('index');
			$(".tab_div_1, .tab_div_2, .tab_div_3, .tab_div_4").hide();
			$(".tab_div_"+tab_index).show();
		});

    });

    function img_call_back(fileurl_tmp)
    {
        $("#imagetext").val(fileurl_tmp);
        $("#img_a").attr('href', fileurl_tmp);
        $("#img_i").attr('onmouseover', "layer.tips('<img src="+fileurl_tmp+">',this,{tips: [1, '#fff']});");
    }
</script>
</body>
</html>
