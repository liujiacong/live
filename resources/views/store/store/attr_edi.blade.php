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
    <form method="post" class="form-x" action="/store/my/{{$GoodsAttribute->id}}/attr_update">
      {{ csrf_field() }}
      <div class="form-group">
        <div class="label">
          <label>属性名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="attr_name" value="{{$GoodsAttribute->attr_name}}" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>所属模型：</label>
        </div>
        <div class="field">
          <select name="type_id" class="input w50">
            @foreach($type as $key=>$value)
            <option value="{{$value->id}}"@if($GoodsAttribute->type_id==$value->id) selected @endif>{{$value->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order" value="{{$GoodsAttribute->order}}"  data-validate="number:排序必须为数字" />
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
