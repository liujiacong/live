<?php

namespace App\admin\Http\Controllers;

use Illuminate\Http\Request;
use  \App\GoodsCate;
use App\Goods;
class ShopController extends Controller
{
  public function cate_list(){
    $cate = GoodsCate::where('user_id',-1)->orderBy('order','desc')->paginate(10);
    return view('/admin/shop/cate_list',compact('cate'));
  }
  public function cate_add(request $request){
    $this->validate($request, [
        'name' => 'required|min:2',
        'is_show' => 'required',
        'is_hot'=>'required',
        'order' => 'required',
    ]);
      GoodsCate::create(request(['name', 'is_show','is_hot','order']));
      return redirect('/admin/shop/cate/list.html');
  }
  public function cate_edi(goodscate $goodscate){
    return view('/admin/shop/cate_edi',compact('goodscate'));
  }
  public function cate_del(goodscate $goodscate){
    $goodscate->delete();
    return back();
  }
  public function cate_updata(request $request,goodscate $goodscate){
    $this->validate($request, [
        'name' => 'required|min:2',
        'is_show' => 'required',
        'is_hot'=>'required',
        'order' => 'required',
    ]);
    $goodscate->name=request('name');
    $goodscate->is_show=request('is_show');
    $goodscate->is_hot=request('is_hot');
    $goodscate->order=request('order');
    $goodscate->save();
    return redirect('/admin/shop/cate/list.html');
  }
  public function goods_list(){
    $cate = GoodsCate::where('user_id',-1)->orderBy('order','desc')->get();
    $goods=Goods::paginate(10);
    // dd($goods);
   return view('/admin/shop/list',compact('goods','cate'));
  }
  public function goods_cate($id){
         $cate = GoodsCate::where('user_id',-1)->orderBy('order','desc')->get();
          $goods = Goods::where(['extend_cate'=>$id])->orderBy('order','desc')->paginate(8);
            return view('/admin/shop/list',compact('goods','me'));
        }
  public function goods_delect($id){
         Goods::destroy($id);
            return back();
        } 
}
