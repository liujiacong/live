<?php

namespace App;
use \App\Model;
use Illuminate\Http\Request;
use Auth;
use \App\GoodsAttr;
use \App\SpecGoodsPrice;



class Goods extends Model
{

    public function addGoods(request $request){
      $me = \Auth::user();

      foreach(request('pic') as $key=>$value){
        $base64_image_content = $value;
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
        $type = $result[2];
        $new_file = "store/user/goodsIMG/".date('Ymd',time())."/";

        if(!file_exists($new_file))
        {
          // echo $new_file;
        //检查是否有该文件夹，如果没有就创建，并给予最高权限
        mkdir($new_file,755,true);
        }
        $new_file = $new_file.time().$me->id.$key.".{$type}";
        $files[$key] = "/".$new_file;
        if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
        // echo '新文件保存成功：', $new_file;
        }else{
        // echo '新文件保存失败';
        }
        }
      }
      $pic=serialize($files);

        $goods=new Goods;
        $goods->goods_title=request('goods_name');
        $goods->goods_title2=request('goods_remark');
        $goods->cate_id=request('cate_id');
        $goods->extend_cate=request('extend_cate_id');
        $goods->goods_type=request('goods_type');
        $goods->shop_price=request('shop_price');
        $goods->market_price=request('market_price');
        $goods->user_id=$me->id;
        $goods->order=request('order');
        $goods->picture=$pic;
        $goods->goods_content=request('content');
        $goods->save();
        if(request('attr_')){
          foreach (request('attr_')  as $key => $value) {
          $goodsattr=new GoodsAttr;
          $goodsattr->goods_id=$goods->id;
          $goodsattr->attr_id=$key;
          $goodsattr->attr_value=$value;
          $goodsattr->save();
        }
        }
        
        $count=0;
        foreach (request('item') as $k => $v) {
          $SpecGoodsPrice=new SpecGoodsPrice;
          $SpecGoodsPrice->goods_id=$goods->id;
          $SpecGoodsPrice->key=$k;
          $SpecGoodsPrice->price=$v['price'];
          $SpecGoodsPrice->store_count=$v['store_count'];
          $SpecGoodsPrice->key_name=$v['key_name'];
          $SpecGoodsPrice->save();
          $count=$count+$v['store_count'];

        }
        $goods->store_count=$count;
        $goods->save();

    }
    public function updatagoods(request $request,goods $goods){
      $me = \Auth::user();
      if(is_array(request('pic'))){
        foreach(request('pic') as $key=>$value){
          $base64_image_content = $value;
          //匹配出图片的格式
          if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
          $type = $result[2];
          $new_file = "store/user/goodsIMG/".date('Ymd',time())."/";

          if(!file_exists($new_file))
          {
            // echo $new_file;
          //检查是否有该文件夹，如果没有就创建，并给予最高权限
          mkdir($new_file,755,true);
          }
          $new_file = $new_file.time().$me->id.$key.".{$type}";
          $files[$key] = "/".$new_file;
          if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
          // echo '新文件保存成功：', $new_file;
          }else{
          // echo '新文件保存失败';
          }
          }
        }
      }else{
        $files=array();
      }
      if(is_array(request('pic2'))){
        $pic2=request('pic2');
      }else{
        $pic2=array();
      }

      $pic=array_merge($pic2,$files);
      $pic=serialize($pic);

        $goods->goods_title=request('goods_name');
        $goods->goods_title2=request('goods_remark');
        $goods->cate_id=request('cate_id');
        $goods->extend_cate=request('extend_cate_id');
        $goods->goods_type=request('goods_type');
        $goods->shop_price=request('shop_price');
        $goods->market_price=request('market_price');
        $goods->user_id=$me->id;
        $goods->order=request('order');
        $goods->picture=$pic;
        $goods->goods_content=request('content');
        $goods->save();
        GoodsAttr::where('goods_id',$goods->id)->delete();
        if(request('attr_')){
          foreach (request('attr_')  as $key => $value) {
          $goodsattr=new GoodsAttr;
          $goodsattr->goods_id=$goods->id;
          $goodsattr->attr_id=$key;
          $goodsattr->attr_value=$value;
          $goodsattr->save();
        }
        }
        $count=0;
        SpecGoodsPrice::where('goods_id',$goods->id)->delete();
        foreach (request('item') as $k => $v) {
          $SpecGoodsPrice=new SpecGoodsPrice;
          $SpecGoodsPrice->goods_id=$goods->id;
          $SpecGoodsPrice->key=$k;
          $SpecGoodsPrice->price=$v['price'];
          $SpecGoodsPrice->store_count=$v['store_count'];
          $SpecGoodsPrice->key_name=$v['key_name'];
          $SpecGoodsPrice->save();
          $count=$count+$v['store_count'];

        }
        $goods->store_count=$count;
        $goods->save();

    }
            public function cate()
        {
            return $this->belongsTo('App\GoodsCate');
        }
        public function extend_cates()
        {
        return $this->belongsTo('App\GoodsCate','extend_cate');
        }
        public function store()
        {
        return $this->belongsTo('App\Store','user_id','user_id');
        }
        public function GoodsCate()
        {
        return $this->hasMany('App\GoodsCate','user_id','user_id');
        }
        public function attr(){
          return $this->hasMany('App\GoodsAttr');
        }
        public function spec_price(){
          return $this->hasMany('App\SpecGoodsPrice','goods_id');
        }
      

}
