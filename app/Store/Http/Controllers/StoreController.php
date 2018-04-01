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
use App\User;
use App\Comment;

class StoreController extends Controller
{
    public function type_list(){
      $type=GoodsType::where('user_id',Auth::user()->id)->paginate(10);
      return view('/store/store/type_list',compact('type'));
    }
    public function type_add(request $request){
      $this->validate(request(),[
              'name' => 'required',
          ]);
      $type=new GoodsType;
      $type->name=request('name');
      $type->user_id=Auth::user()->id;
      $type->save();
      return redirect('/store/my/type_list');
    }
    public function type_edi(GoodsType $GoodsType){
      $this->authorize('update', $GoodsType);
      return view('/store/store/type_edi',compact('GoodsType'));
    }
    public function type_updata(request $request,GoodsType $GoodsType){
      $this->validate(request(),[
              'name' => 'required',
          ]);
      $GoodsType->name=request('name');
      $GoodsType->save();
      return redirect('/store/my/type_list');
    }
    public function cate_list(){
      $GoodsCate=GoodsCate::where('user_id',Auth::user()->id)->paginate(10);
      return view('/store/store/cate_list',compact('GoodsCate'));
    }
    public function cate_add(request $request){
      $this->validate($request, [
          'name' => 'required|min:2',
          'is_show' => 'required',
          'is_hot'=>'required',
          'order' => 'required',
      ]);
        GoodsCate::create(array_merge(request(['name', 'is_show','is_hot','order']),['user_id'=>Auth::user()->id]));
        return redirect('/store/my/cate_list');
    }
    public function cate_edi(request $request,GoodsCate $GoodsCate){
      $this->authorize('update', $GoodsCate);
      return view('/store/store/cate_edi',compact('GoodsCate'));
    }
    public function cate_update(request $request,GoodsCate $GoodsCate){
      $this->authorize('update', $GoodsCate);
      $this->validate($request, [
          'name' => 'required|min:2',
          'is_show' => 'required',
          'is_hot'=>'required',
          'order' => 'required',
      ]);
      $GoodsCate->name=request('name');
      $GoodsCate->is_show=request('is_show');
      $GoodsCate->is_hot=request('is_hot');
      $GoodsCate->order=request('order');
      $GoodsCate->save();
      return redirect('/store/my/cate_list');
    }
    public function attr_list(){
      $GoodsAttribute=GoodsAttribute::where('user_id',Auth::user()->id)->paginate(10);
      $type=GoodsType::where('user_id',Auth::user()->id)->get();
      return view('/store/store/attr_list',compact('GoodsAttribute','type'));
    }
    public function attr_add(request $request){
      $this->validate($request, [
          'attr_name' => 'required|min:2',
          'type_id' => 'required',
          'order' => 'required',
      ]);
      GoodsAttribute::create(array_merge(request(['attr_name', 'type_id','order']),['user_id'=>Auth::user()->id]));
      return redirect('/store/my/attr_list');
    }
    public function attr_edi(GoodsAttribute $GoodsAttribute){
      $this->authorize('update',$GoodsAttribute);
      $type=GoodsType::where('user_id',Auth::user()->id)->get();
      return view('/store/store/attr_edi',compact('GoodsAttribute','type'));
    }
    public function attr_update(request $request,GoodsAttribute $GoodsAttribute){
      $this->validate($request, [
          'attr_name' => 'required|min:2',
          'type_id' => 'required',
          'order' => 'required',
      ]);
      $GoodsAttribute->attr_name=request('attr_name');
      $GoodsAttribute->type_id=request('type_id');
      $GoodsAttribute->order=request('order');
      $GoodsAttribute->save();
      return redirect('/store/my/attr_list');
    }
    public function spec_list(){
      $spec=Spec::where('user_id',Auth::user()->id)->paginate(10);
      $type=GoodsType::where('user_id',Auth::user()->id)->get();
      return view('/store/store/spec_list',compact('spec','type'));
    }
    public function spec_add(request $request){
      $this->validate($request, [
          'name' => 'required|min:2',
          'type_id' => 'required',
          'order' => 'required',
          'spec_item'=>'required',
      ]);
      $spec=new Spec;
      $spec->add($request);
      return redirect('/store/my/spec_list');
    }
    public function spec_edi(Spec $Spec){
      $this->authorize('update',$Spec);
      $type=GoodsType::where('user_id',Auth::user()->id)->get();
      return view('/store/store/spec_edi',compact('Spec','type'));
    }
    public function spec_update(request $request,Spec $Spec){
      $this->authorize('update',$Spec);
      $this->validate($request, [
          'name' => 'required|min:2',
          'type_id' => 'required',
          'order' => 'required',
          'spec_item'=>'required',
      ]);
        $Spec->name=request('name');
        $Spec->type_id=request('type_id');
        $Spec->order=request('order');
        $Spec->save();
        SpecItem::where('spec_id',$Spec->id)->delete();
        $item=explode("\n",request('spec_item'));
        foreach ($item as $key => $value) {
          $SpecItem=new SpecItem;
          $SpecItem->item=$value;
          $SpecItem->spec_id=$Spec->id;

          $SpecItem->save();
        }

      return redirect('/store/my/spec_list');
    }
    public function attr_cate(request $request,$id){
      $GoodsAttribute=GoodsAttribute::where(['user_id'=>Auth::user()->id,'type_id'=>$id])->paginate(10);
      $type=GoodsType::where('user_id',Auth::user()->id)->get();
      return view('/store/store/attr_list',compact('GoodsAttribute','type'));
    }
    public function spec_cate(request $request,$id){
      $spec=Spec::where(['user_id'=>Auth::user()->id,'type_id'=>$id])->paginate(10);
      $type=GoodsType::where('user_id',Auth::user()->id)->get();
      return view('/store/store/spec_list',compact('spec','type'));
    }
    public function pinglun(){
      $me = \Auth::user();
      $Comment=Comment::where(['store_id'=>$me->id])->paginate(10);
      // dd($Comment);
      return view('/store/store/comment_list',compact('Comment'));

    }
    public function is_show(Comment $Comment){
      $this->authorize('view',$Comment);
      $Comment->is_show=1;
      $Comment->save();
      return back();
    }
    public function is_notshow(Comment $Comment){
      $this->authorize('view',$Comment);
      $Comment->is_show=0;
      $Comment->save();
      return back();
    }
}
