<?php

namespace  App\admin\Http\Controllers;
use  \App\ArticleCate;
use  \App\Article;
use Illuminate\Http\Request;
use App\Jobs\SendReminderEmail;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function index(){
      $Article = Article::paginate(10);
      return view('/admin/article/index',compact('Article'));
    }
    public function cate(){
      $cate = ArticleCate::all();
      return view('/admin/article/cate',compact('cate'));
    }
    public function create(Request $request){
      $this->validate($request, [
          'name' => 'required|min:2',
          'is_show' => 'required',
          'sort_order' => 'required',
      ]);
      ArticleCate::create(request(['name', 'is_show','sort_order']));
      return redirect('/admin/article/cate');
    }
    public function del_article(Article $Article){
      $Article->delete();
      return back();
    }
    public function edi_article(Article $Article){
      $cate = ArticleCate::all();
      return view('/admin/article/edi',compact('Article','cate'));
    }
    public function updata_article(Article $Article,request $request){
      $this->validate($request, [
          'title' => 'required|min:2',
          'content' => 'required',
          'cid' => 'required',
          'sort_order' => 'required',
      ]);
      $Article->title=request('title');
      $Article->content=request('content');
      $Article->cid=request('cid');
      $Article->sort_order=request('sort_order');
      $Article->save();
      return redirect('/admin/article');
    }
    public function add(){
      $cate = ArticleCate::all();
      return view('/admin/article/add',compact('cate'));
    }
    public function add_article(request $request){
      $this->validate($request, [
          'title' => 'required|min:2',
          'content' => 'required',
          'cid' => 'required',
          'sort_order' => 'required',
      ]);
      Article::create(request(['title','cid','sort_order','content']));
      return redirect('/admin/article');

    }
    public function edit_cate(ArticleCate $ArticleCate){
      return view('/admin/article/edit_cate',compact('ArticleCate'));
    }
    public function updata_cate(ArticleCate $ArticleCate,Request $request){
      $this->validate($request, [
          'name' => 'required|min:2',
          'is_show' => 'required',
          'sort_order' => 'required',
      ]);
      $ArticleCate->name=request('name');
      $ArticleCate->is_show=request('is_show');
      $ArticleCate->sort_order=request('sort_order');
      $ArticleCate->save();

 SendReminderEmail::dispatch(999)
                ->delay(10*60);
      return redirect('/admin/article/cate');
    }
}
