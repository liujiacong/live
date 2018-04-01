@include('layout.head')
<style>
.nav .classify{display: none;height: 380px;}
.nav .classify span{display: none;}
.center{    padding-left: 170px;width: 75%;margin: 0 auto;position: relative;float: left;transform: translateX(-600px);margin-left: 50%;}
.wrap .navs{font-size: 18px;color: #1b1b1b;margin: 20px 0;background-color: transparent;}
.wrap .navs span{color: #f02110;}
.cons h1{font-size: 24px;text-align: center;line-height: 42px;display: block;padding: 22px;border-bottom: 1px solid #d2d2d2;}
.cons span{color: #8d8d8d;text-align: center;margin: 20px 0;display: block;}
.wrap .content{margin: 0 auto;height: auto;}
.wrap .content img {width: auto;float: none;}
.cons_left{width: 788px;float: left;margin-right: 30px;border: 1px solid #d2d2d2;padding: 0 30px 20px 30px;position: relative;margin-bottom: 30px;}
</style>
<div class="wrap center clearfix">
<div class="cons_left">
<div class="cons">
	<h1 title="{{$article->title}}">{{$article->title}}</h1>
	<span>时间：{{$article->updated_at}}</span>
</div>
<div class="content">
	<style>
		.content p{line-height: 24px;}
	</style>
	<?php echo htmlspecialchars_decode($article->content); ?>
</div>
</div>
</div>
