<?php

namespace App\Store\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use \App\GoodsType;
use \App\GoodsCate;
use \App\GoodsAttr;
use \App\SpecItem;
use \App\GoodsAttribute;
use \App\Spec;
use \App\SpecGoodsPrice;
use App\User;
use App\Goods;
use Illuminate\Support\Facades\DB;
class GoodsController extends Controller
{


    public function list(){
      $me = \Auth::user();
      $goods = Goods::where(['user_id'=>$me->id,'is_delect'=>0])->orderBy('order','desc')->paginate(8);
        return view('/store/goods/list',compact('goods','me'));
    }
     public function goods_cate($id){
          $me = \Auth::user();
          $goods = Goods::where(['user_id'=>$me->id,'is_delect'=>0,'cate_id'=>$id])->orderBy('order','desc')->paginate(8);
            return view('/store/goods/list',compact('goods','me'));
        }

    public function add(){
      $me = \Auth::user();
      $goods=new goods;
      return view('/store/goods/add',compact('me','goods'));
    }
    public function deletegoods(goods $goods){
      $this->authorize('view', $goods);
      $goods->is_delect=1;
      $goods->save();
      return back();
    }
    public function unsale(goods $goods){
      $this->authorize('view', $goods);
      $goods->is_sale=1;
      $goods->save();
      return back();
    }
    public function sale(goods $goods){
      $this->authorize('view', $goods);
      $goods->is_sale=0;
      $goods->save();
      return back();
    }
    /**
     * 动态获取商品规格选择框 根据不同的数据返回不同的选择框
     */
    public function ajaxGetSpecSelect(request $request){
        $me = \Auth::user();
        $goods_id =request('goods_id') ? request('goods_id') : 0;
        $type_id=request('spec_type');
        $specList=Spec::where(['type_id'=>$type_id,'user_id'=>$me->id])->get();
        //$specList = M('Spec')->where("type_id = ".I('get.spec_type/d'))->order('`order` desc')->select();

        $items_id = DB::select("select GROUP_CONCAT(`key` SEPARATOR '_') AS items_id from spec_goods_prices where goods_id = $goods_id");
        $items_id = array_map('get_object_vars', $items_id);


        $items_ids = explode('_', $items_id[0]['items_id']);
        // var_dump($items_ids);

        return view('/store/goods/spec',compact('me','items_ids','items_id','specList'));

    }
    /**
 * 动态获取商品属性输入框 根据不同的数据返回不同的输入框类型
 */
public function ajaxGetAttrInput(request $request){
  // $str = $this->getAttrInput(1);

    $str = $this->getAttrInput(request('type_id'),request('goods_id'));
    exit($str);
}
    /**
 * 动态获取商品规格输入框 根据不同的数据返回不同的输入框
 */
public function ajaxGetSpecInput(request $request){
     $spec_arr=request('spec_arr') ? request('spec_arr') : [[]];
     $str = $this->getSpecInput($spec_arr,request('goods_id'));
     exit($str);
}
function combineDika() {
	$data = func_get_args();
	$data = current($data);
	$cnt = count($data);
	$result = array();
    $arr1 = array_shift($data);
	foreach($arr1 as $key=>$item)
	{
		$result[] = array($item);
	}

	foreach($data as $key=>$item)
	{
		$result = $this->combineArray($result,$item);
	}
	return $result;
}
function combineArray($arr1,$arr2) {
	$result = array();
	foreach ($arr1 as $item1)
	{
		foreach ($arr2 as $item2)
		{
			$temp = $item1;
			$temp[] = $item2;
			$result[] = $temp;
		}
	}
	return $result;
}

public function getSpecInput( $spec_arr,$goods_id)
   {
       if(!$goods_id){
         foreach ($spec_arr as $k => $v)
         {
             $spec_arr_sort[$k] = count($v);
         }
         asort($spec_arr_sort);
         foreach ($spec_arr_sort as $key =>$val)
         {
             $spec_arr2[$key] = $spec_arr[$key];
         }


          $clo_name = array_keys($spec_arr2);
          $spec_arr2 = $this->combineDika($spec_arr2); //  获取 规格的 笛卡尔积
          $spec=DB::table('specs')->select('id','name')->get()->toArray();
          $spec = array_map('get_object_vars', $spec);
          $ids = array_column($spec, 'id');
          $spec = array_column($spec, 'name','id');
          // $spec = M('Spec')->getField('id,name'); // 规格表
          $specItem=DB::table('spec_items')->select('id','item','spec_id')->get()->toArray();
          $specItem = array_map('get_object_vars', $specItem);
          foreach ($specItem as $key => $value) {
            $specItems[$value['id']]=$value;
          }
          $specItem=$specItems;


          $keySpecGoodsPrice=DB::table('spec_goods_prices')->where('goods_id',0)->get()->toArray();
          $keySpecGoodsPrice = array_map('get_object_vars', $keySpecGoodsPrice);

  // dd($keySpecGoodsPrice);

        $str = "<table class='table table-bordered' id='spec_input_tab'>";
        $str .="<tr>";
        // 显示第一行的数据
        foreach ($clo_name as $k => $v)
        {
            $str .=" <td><b>{$spec[$v]}</b></td>";
        }
         $str .="<td><b>价格</b></td>
                <td><b>库存</b></td>
                <td><b>SKU</b></td>
              </tr>";
        // 显示第二行开始
        foreach ($spec_arr2 as $k => $v)
        {
             $str .="<tr>";
             $item_key_name = array();
             foreach($v as $k2 => $v2)
             {
                 $str .="<td>{$specItem[$v2]['item']}</td>";
                 $item_key_name[$v2] = $spec[$specItem[$v2]['spec_id']].':'.$specItem[$v2]['item'];
             }
             ksort($item_key_name);
             $item_key = implode('_', array_keys($item_key_name));
             $item_name = implode(' ', $item_key_name);
             $str .="<td><input name='item[$item_key][price] value='0' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")' /></td>";
             $str .="<td><input name='item[$item_key][store_count]' value='0' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")'/></td>";
             $str .="<td><input name='item[$item_key][sku]' value='' />
                 <input type='hidden' name='item[$item_key][key_name]' value='$item_name' /></td>";
             $str .="</tr>";
        }
         $str .= "</table>";
        return $str;
      }else{
        foreach ($spec_arr as $k => $v)
        {
            $spec_arr_sort[$k] = count($v);
        }
        asort($spec_arr_sort);
        foreach ($spec_arr_sort as $key =>$val)
        {
            $spec_arr2[$key] = $spec_arr[$key];
        }


         $clo_name = array_keys($spec_arr2);
         $spec_arr2 = $this->combineDika($spec_arr2); //  获取 规格的 笛卡尔积
         $spec=DB::table('specs')->select('id','name')->get()->toArray();
         $spec = array_map('get_object_vars', $spec);
         $ids = array_column($spec, 'id');
         $spec = array_column($spec, 'name','id');
         $specItem=DB::table('spec_items')->select('id','item','spec_id')->get()->toArray();
         $specItem = array_map('get_object_vars', $specItem);
         foreach ($specItem as $key => $value) {
           $specItems[$value['id']]=$value;
         }
         $specItem=$specItems;


         $keySpecGoodsPrice=DB::table('spec_goods_prices')->where('goods_id',$goods_id)->get()->toArray();
         $keySpecGoodsPrice = array_map('get_object_vars', $keySpecGoodsPrice);
         foreach ($keySpecGoodsPrice as $key => $value) {
          $spec_value[$value['key']]=$value;
         }
         $keySpecGoodsPrice=$spec_value;

 // dd($keySpecGoodsPrice);

       $str = "<table class='table table-bordered' id='spec_input_tab'>";
       $str .="<tr>";
       // 显示第一行的数据
       foreach ($clo_name as $k => $v)
       {
           $str .=" <td><b>{$spec[$v]}</b></td>";
       }
        $str .="<td><b>价格</b></td>
               <td><b>库存</b></td>
               <td><b>SKU</b></td>
             </tr>";
       // 显示第二行开始
       foreach ($spec_arr2 as $k => $v)
       {
            $str .="<tr>";
            $item_key_name = array();
            foreach($v as $k2 => $v2)
            {
                $str .="<td>{$specItem[$v2]['item']}</td>";
                $item_key_name[$v2] = $spec[$specItem[$v2]['spec_id']].':'.$specItem[$v2]['item'];
            }
            ksort($item_key_name);
            $item_key = implode('_', array_keys($item_key_name));
            $item_name = implode(' ', $item_key_name);
            $keySpecGoodsPrice[$item_key]['price']=isset($keySpecGoodsPrice[$item_key]['price']) ?  $keySpecGoodsPrice[$item_key]['price'] :0;// 价格默认为0
            $keySpecGoodsPrice[$item_key]['store_count']=isset($keySpecGoodsPrice[$item_key]['store_count']) ?  $keySpecGoodsPrice[$item_key]['store_count'] :0;//库存默认为0
              $str .="<td><input name='item[$item_key][price]' value='".$keySpecGoodsPrice[$item_key]['price']."' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")' /></td>";
              $str .="<td><input name='item[$item_key][store_count]' value='".$keySpecGoodsPrice[$item_key]['store_count']."' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")'/></td>";
              $str .="<td><input name='item[$item_key][sku]' value='' />
                  <input type='hidden' name='item[$item_key][key_name]' value='$item_name' /></td>";
              $str .="</tr>";
         }
          $str .= "</table>";
       return $str;
      }
   }
   public function getGoodsAttrVal($goods_attr_id = 0 ,$goods_id = 0, $attr_id = 0)
{

    if($goods_attr_id > 0)
        return GoodsAttr::where('goods_attr_id' ,$goods_attr_id)->get();
    if($goods_id > 0 && $attr_id > 0)
        return GoodsAttr::where(['goods_id' => $goods_id, 'attr_id' => $attr_id])->get();
}
   public function getAttrInput($type_id,$goods_id)
{
  if($goods_id){
    header("Content-type: text/html; charset=utf-8");
    $attr=GoodsAttr::where('goods_id',$goods_id)->get()->toArray();
    foreach ($attr as $key => $value) {
      $attr_value[$value['attr_id']]=$value;
    }
    $attributeList = GoodsAttribute::where('type_id', $type_id)->get()->toArray();

    $str="";
        foreach($attributeList as $k =>$v)
        {
                        $str.=  "<tr class='attr_324'><td>" .$v['attr_name']."</td> <td><input type='text' size='40' value='".$attr_value[$v['id']]['attr_value']."' name='attr_[".$v['id']."]'></td></tr>";
                        $str .= "</td></tr>";
        }


    return  $str;
  }else{
    header("Content-type: text/html; charset=utf-8");

    $attributeList = GoodsAttribute::where('type_id', $type_id)->get()->toArray();

    $str="";
        foreach($attributeList as $k =>$v)
        {
                        $str.=  "<tr class='attr_324'><td>" .$v['attr_name']."</td> <td><input type='text' size='40' value='' name='attr_[".$v['id']."]'></td></tr>";
                        $str .= "</td></tr>";
        }


    return  $str;
  }

}
public function addgoods(request $request){
  // dd($request);
  $this->validate(request(),[
    'goods_name'=>'required',
    'goods_remark'=>'required',
    'cate_id'=>'required',
    'extend_cate_id'=>'required',
    'goods_type'=>'required',
    'shop_price'=>'required',
    'market_price'=>'required',
    'cost_price'=>'required',
    'order'=>'required',
    'pic'=>'required',
    'content'=>'required',
    'item'=>'required',
    
  ]);
  $goods=new goods;
  $goods->addGoods($request);
  return redirect('/store/my/goods/list');

}
public function editgoods(Goods $goods){
  $me = \Auth::user();
 $this->authorize('view', $goods);

return view('/store/goods/edi',compact('me','goods'));

}
public function updatagoods(goods $goods,request $request){
  $me = \Auth::user();
  // var_dump($goods);
  // var_dump($request);
  if(!is_array(request('pic2')) && !is_array(request('pic'))){
    return back();
  }

  $this->authorize('view', $goods);
  $goods->updatagoods($request,$goods);
  return redirect('/store/my/goods/list');

}

}
