<?php

namespace App\admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Account;
class HomeController extends Controller
{
  public function index(){
    return view('/admin/home/index');
    
  }
  public function retpassword(){
  		$me =  \Auth::guard('admin')->user();
	 return view('/admin/home/retpass',compact('me'));
  }
  public function retpass(request $request){
  		$this->validate($request, [
                      'oldpassword' => 'required',
                       'password' => 'required|min:5|confirmed',
                ]);
               $me = \Auth::guard('admin')->user();;
               if(Hash::check(request('oldpassword'), $me->password)){
                $me->password=Hash::make(request('password'));
                $me->save();
                return back()->withErrors('修改成功');
               }else{
                return back()->withErrors("原密码错误");
               }
  }
   public function add(){
  		$me =  \Auth::guard('admin')->user();
	 return view('/admin/home/add',compact('me'));
  }
   public function add_admin(request $request){
  		$this->validate($request, [
                     'name' => 'bail|required|min:3|unique:users,name',
                       'password' => 'required|min:5|confirmed',
                ]);
  		$admin=new Admin();
  		$admin->name=request('name');
  		$admin->password=Hash::make(request('password'));
  		$admin->save();
  		return back()->withErrors("已添加");


  }
  public function account(){
   if(isset($_GET['type'])){
     $account=Account::where('type',$_GET['type'])->orderBy('created_at', 'desc')->paginate(8);
    return view('/admin/home/list',compact('account'));
   }
    $account=Account::orderBy('created_at', 'desc')->paginate(8);
    return view('/admin/home/list',compact('account'));
  }
  public function zhuan(Account $Account){
    $Account->status=1;
    $Account->save();
    return  back();
  }
}
