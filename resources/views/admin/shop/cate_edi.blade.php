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
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改分类</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/shop/cate/{{$goodscate->id}}/edi">
      {{ csrf_field() }}
      <div class="form-group">
        <div class="label">
          <label>分类标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name" value="{{$goodscate->name}}" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>是否首页展示：</label>
        </div>
        <div class="field">
          <select name="is_show" class="input w50">
            <option value="0"@if($goodscate->is_show==0) selected @endif>否</option>
            <option value="1" @if($goodscate->is_show==1) selected @endif>是</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>是否热门：</label>
        </div>
        <div class="field">
          <select name="is_hot" class="input w50">
            <option value="0"@if($goodscate->is_hot==0) selected @endif>否</option>
            <option value="1" @if($goodscate->is_hot==1) selected @endif>是</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order" value="{{$goodscate->order}}"  data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>
