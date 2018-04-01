<?php

namespace App\Http\Controllers;
use \App\ArticleCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Goods;
use App\Banner;

class IndexController extends Controller
{
    //
    public function index(){
    	$like=Goods::where(['is_sale'=>0,'is_delect'=>0])->orderBy('sale_count', 'desc')->take(15)->get();
    	$tui=Goods::where(['is_sale'=>0,'is_delect'=>0])->orderBy('updated_at', 'desc')->take(10)->get();
    	$Banner=Banner::where('is_show',1)->take(5)->get();

    	// dd($Banner);
      $articlecate=ArticleCate::all();
      return view('index/index',compact('articlecate','like','tui','Banner'));
    }
}
