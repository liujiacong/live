@include('layout.head')
<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:15 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>开启新网店，开启新校园生活</title>
<script src="http://www.jq22.com/jquery/vue.min.js"></script>

    <link rel="shortcut icon" href="/static/index/images/favicon.ico"> <link href="/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <link href="/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" href="/js/kindeditor/themes/default/default.css" />
    <link href="/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<style>
.form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: right;
    margin-left: 15%;
}
.upload {
    border: 1px solid #ccc;
    background-color: #fff;
    width: 650px;
    box-shadow: 0px 1px 0px #ccc;
    border-radius: 4px;
      margin-left: 44%;
}
</style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <form method="post" class="form-horizontal" id="tf" enctype="multipart/form-data" action="/user/creatstore">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">门店名</label>

                                <div class="col-sm-3">
                                    <input name="name" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">店主真实姓名</label>

                                <div class="col-sm-3">
                                    <input name="true_name" type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">简单描述</label>

                                <div class="col-sm-3">
                                    <input name="store_conten" type="text" class="form-control" placeholder="" value="">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">注意</label>

                                <div class="col-sm-3">
                                    <label class="col-sm-100">请上传与真实姓名相符的校园卡，身份证，学生证其中两样进行认证,平台确认无误后就能正常营业</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">上传证件照</label>

                                <div class="col-sm-3">
                                    <label class="col-sm-100"></label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">

    <div class="clone">

    </div>




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
        选中@{{imgList.length}}张文件，共@{{bytesToSize(this.size)}}
      </div>
      <input @change="fileChange($event)" type="file" id="upload_file" multiple style="display: none"/>
      <div class="upload_warp_img" v-show="imgList.length!=0">
        <div class="upload_warp_img_div" v-for="(item,index) of imgList">
          <div class="upload_warp_img_div_top">
            <div class="upload_warp_img_div_text">
              @{{item.file.name}}
            </div>
            <img src="/img/del.png" class="upload_warp_img_div_del" @click="fileDel(index)">
          </div>
          <img :src="item.file.src">
          <input type="hidden" name="pic[]" :value="item.file.src">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
                      <div class="hr-line-dashed"></div>
                      <div class="hr-line-dashed"></div>
                      <div class="hr-line-dashed"></div>
                      <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2" style="margin-left:43.6%;">
                      <button class="btn btn-primary" type="submit">提交</button>
                      <a class="btn btn-white" href="#" onclick="#" >返回</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <style type="text/css">
        .btn-add{background-color: #1ab394;border-color: #1ab394;color: #FFF;margin-top: 10px;}
        .btn-add:hover{background-color: #1ab394;border-color: #1ab394;color: #666;}
    </style>
<style type="text/css">
  .table-bordered input{
        width:100%;
    }
</style>






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
      margin-left: 17%;
      text-align: center;
    }
  </style>


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
                      console.log(app.imgList)
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

  });
</script>


</head>
<body>




</body>
</html>
