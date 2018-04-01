<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Goods;
use App\GoodsCate;
use App\SpecGoodsPrice;
use App\GoodsAttribute;
use App\Comment;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\User_address;



class GoodsController extends Controller
{
    public function store(Store $Store){
      $cate_id=0;
      $me = \Auth::user();
      $arr=unserialize($me->collection_shop);
      $goods=Goods::where(['is_sale'=>0,'user_id'=>$Store->user_id,'is_delect'=>0])->paginate(8);
        return view('goods/store',compact('Store','goods','cate_id','arr'));
    }
    public function cate(Store $Store,$cate_id){
      $me = \Auth::user();
      $arr=unserialize($me->collection_shop);
      $goods=Goods::where(['is_sale'=>0,'user_id'=>$Store->user_id,'cate_id'=>$cate_id,'is_delect'=>0])->paginate(8);
      return view('goods/store',compact('Store','goods','cate_id','arr'));
    }
    public function like($id){
      $goods=Goods::where(['is_sale'=>0,'is_delect'=>0])->find($id);
          if($goods){
            $me = \Auth::user();
            $arr=unserialize($me->collection_shop);
            if(in_array($id,$arr)){
              return 1;
            }else{
              array_push($arr,$id);
              $me->collection_shop=serialize($arr);
              $me->save();
              return 1;
            }
          }else{
              return 0;
          }
    }
    public function unlike($id){
      $goods=Goods::where(['is_sale'=>0,'is_delect'=>0])->find($id);
          if($goods){
            $me = \Auth::user();
            $arr=unserialize($me->collection_shop);
            if(!in_array($id,$arr)){
              return 1;
            }else{
            $arr2=array($id);
            $result=array_diff($arr,$arr2);

              $me->collection_shop=serialize($result);
              $me->save();
              return 1;
            }
          }else{
              return 0;
          }
    }
  public function dellike($id){
    // dd($id);
            $me = \Auth::user();
            $arr=unserialize($me->collection_shop);
            $arr2=array($id);
            $result=array_diff($arr,$arr2);
            $me->collection_shop=serialize($result);
            $me->save();
            return back();

    }
    public function cates($id){
      // dd($GoodsCate->extend_goods);
      $me = \Auth::user();
      // dd($me);
      if($me){
      $arr=unserialize($me->collection_shop);
      }else{
        $arr=[];
      }
      $goods=Goods::where(['is_sale'=>0,'extend_cate'=>$id,'is_delect'=>0])->paginate(8);
      return view('goods/cate',compact('goods','me','arr'));

    }
    public function goodsinfo(Goods $Goods){
      if($Goods->is_delect==1 ||$Goods->is_sale==1){
        return redirect('/');
      }
      if (!Cache::has("goods[$Goods->id]")) {
        $attr_ = DB::table('goods_attrs')
                ->leftJoin('goods_attributes', 'goods_attrs.attr_id', '=', 'goods_attributes.id')
                ->where('goods_id',$Goods->id)
                ->get()->toArray();
        $spec_goods_price = DB::table('spec_goods_prices')
                            ->where('goods_id',$Goods->id)
                            ->select('key','price','store_count','id')
                            ->get()
                            ->toArray();
        foreach ($spec_goods_price as $key => $value){$peice[$value->key]=$value;}
        $spec_goods_price=  json_encode($peice);
        $keys = DB::select("select GROUP_CONCAT(`key` ORDER BY store_count desc SEPARATOR '_') as 'key'  from spec_goods_prices where goods_id = $Goods->id");

         $filter_spec = array();
         if ($keys) {
              $keys = explode('_', $keys[0]->key);
              $filter_spec2 = DB::table('specs')
              ->join('spec_items', 'specs.id', '=', 'spec_items.spec_id')
              ->select('specs.name','specs.order','spec_items.*')
              ->whereIn('spec_items.id',$keys)
              ->get()->toArray();
             foreach ($filter_spec2 as $key => $val) {
                    $filter_spec[$val->name][] = array('item_id' => $val->id,'item' => $val->item);
                  }
              }
              $goods[$Goods->id]['info']=$Goods;
              $goods[$Goods->id]['attr_']=$attr_;
              $goods[$Goods->id]['spec_goods_price']=$spec_goods_price;
              $goods[$Goods->id]['filter_spec']=$filter_spec;
              Cache::put("goods[$Goods->id]", $goods[$Goods->id], 120);
        }
        $value = Cache::get("goods[$Goods->id]");
        $attr_=$value['attr_'];
        $spec_goods_price=$value['spec_goods_price'];
        $filter_spec=$value['filter_spec'];

      return view('goods/item',compact('Goods','attr_','spec_goods_price','filter_spec'));

    }
    public function addcart(Request $Request){
        // $me = \Auth::user();
        $goods=Goods::where(['id'=>request('goods_id'),'is_delect'=>0])->first();
        if(!$goods){
          return ['status'=>'-3','msg'=>'商品不存在'];
        }
        $goods_spec_price=SpecGoodsPrice::find(request('item_id'));
        if(!$goods_spec_price){
          return ['status'=>'-1','msg'=>'商品规格不存在'];
        }
        if(empty(request('goods_num'))){
          return ['status'=>'-2','msg'=>'购买商品数量不能为0'];
        }else {
          if(request('goods_num')>$goods_spec_price->store_count){
            return ['status'=>'-4','msg'=>'商品库存不足'];
          }
        }
  
        return ['status'=>'1','msg'=>'以添加到购物车'];
    }


    public function ajaxaddr(){
      return view('goods/ajaxaddr');

    }


    public function select(Cart $Cart){
      $Cart->select=1;
      $Cart->save();
    }
    public function unselect(Cart $Cart){
      $Cart->select=0;
      $Cart->save();
    }
    public function ediaddr(user_address $user_address){
      $this->authorize('update', $user_address);
      return view('goods/ajaxediaddr',compact('user_address'));
    }
    public function shopping2order(request $request){
      // dd($request);
      if(!request('address_id')){
        exit(json_encode(array('status'=>-3,'msg'=>'请先填写收货人信息','result'=>0)));
      }
      $me = \Auth::user();
      
      $order=new Order();
      $result=$order->addOrder($me->id,request('address_id'),request('user_note'),request('item_id'),request('goods_num'));
      exit(json_encode($result));

    }
    function carto3(order $order){

      return view('goods/carto3',compact('order'));
    }

    public function shopping(request $request){
      // dd($request);
      $num=request('goods_num');
      $me = \Auth::user();
      $goods_spec_price=SpecGoodsPrice::find(request('item_id'));
      $goods=Goods::where(['id'=>request('goods_id'),'is_delect'=>0])->first();
      if($goods->user_id==$me->id){
        return back()->withErrors("不能购买自己发布的商品");
      }
      return view('goods/shopping',compact('goods_spec_price','goods','me','num'));
    }
    public function ajax_comment($id){
      $Comment=Comment::where(['goods_id'=>$id,'is_show'=>1])->get();

      return view('goods/ajax_comment',compact('Comment'));
    }
    public function like_goods(request $request){
      // dd($request);
      $me = \Auth::user();
      // dd($me);
      if($me){
      $arr=unserialize($me->collection_shop);
      }else{
        $arr=[];
      }
      $goods=DB::table('goods')->where([['is_sale','=',0,],['is_delect','=',0],['goods_title','like','%'.request('like').'%']])->paginate(8);
      return view('goods/cate',compact('goods','me','arr'));
    }
   

}
