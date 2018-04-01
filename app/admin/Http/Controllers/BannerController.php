<?php

namespace App\admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
class BannerController extends Controller
{
    public function list(){
      $banner = Banner::orderBy('order','desc')->paginate(10);
      return view('/admin/banner/list',compact('banner'));
    }
    public function banner_add(Request $request){
      // dd($request);
      $this->validate($request, [
          'name' => 'required|min:2',
          'is_show' => 'required',
          'url'=>'required',
          'pic'=>'required',
          'order' => 'required',
      ]);
      $banner=new Banner();
      $banner->name=request('name');
      $banner->is_show=request('is_show');
      $banner->url=request('url');
      $banner->order=request('order');
      $path = $request->file('pic')->store('public');
      $banner->pic = "/storage".strstr( $path, '/');
      $banner->save();
      return back();
    }
    public function banner_edi(Banner $Banner){
      return view('/admin/banner/edi',compact('Banner'));
    }
    public function banner_del(Banner $Banner){
      $Banner->delete();
      return back();
    }
    public function banner_updata(request $request,Banner $Banner){
      $this->validate($request, [
           'name' => 'required|min:2',
          'is_show' => 'required',
          'url'=>'required',
          'pic'=>'required',
          'order' => 'required',
      ]);
      $Banner->name=request('name');
      $Banner->is_show=request('is_show');
      $Banner->url=request('url');
      $Banner->order=request('order');
      if($request->file('pic')){
        $path = $request->file('pic')->store('public');
      $Banner->pic = "/storage".strstr( $path, '/');
      }
      $Banner->save();
      return redirect('/admin/shop/banner/list');
    }
}
