<?php

namespace App\admin\Http\Controllers;

use Illuminate\Http\Request;
use  \App\Navigation;
class NavigationController extends Controller
{
    public function list(){
      $navi = Navigation::orderBy('order','desc')->paginate(10);
      return view('/admin/navigation/list',compact('navi'));
    }
    public function navi_add(request $request){
      $this->validate($request, [
          'name' => 'required|min:2',
          'is_show' => 'required',
          'url'=>'required',
          'is_new'=>'required',
          'order' => 'required',
      ]);
      Navigation::create(request(['name', 'is_show','is_new','order','url']));
      return redirect('/admin/shop/navi/list');
    }
    public function navi_edi(navigation $navigation){
      return view('/admin/navigation/edi',compact('navigation'));
    }
    public function navi_del(Navigation $Navigation){
      $Navigation->delete();
      return back();
    }
    public function navi_updata(request $request,navigation $navigation){
      $this->validate($request, [
          'name' => 'required|min:2',
          'is_show' => 'required',
          'url'=>'required',
          'is_new'=>'required',
          'order' => 'required',
      ]);
      $navigation->name=request('name');
      $navigation->is_show=request('is_show');
      $navigation->url=request('url');
      $navigation->is_new=request('is_new');
      $navigation->order=request('order');
      $navigation->save();
      return redirect('/admin/shop/navi/list');
    }
}
