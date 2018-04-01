<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Mail;


class LoginController extends Controller
{
    //
    public function index(){
      if(\Auth::check()) {
          return redirect("/");
      }
      return view('login/login');
    }
      public function login(Request $request)
      {
          $this->validate($request, [
              'name' => 'required|min:3',
              'password' => 'required|min:6|max:30',
              'luotest_response' => 'required|captcha',
              'is_remember' => '',
          ]);

          $user = request(['name', 'password']);
          $remember = boolval(request('is_remember'));
          if (true == \Auth::attempt($user, $remember)) {
             return redirect('/');
          }

          return \Redirect::back()->withErrors("用户名密码错误");
      }

    public function register(){
      return view('login/register');
    }
    public function creat(Request $request){
      $this->validate($request,[
          'name' => 'bail|required|min:3|unique:users,name',
          'password' => 'required|min:5|confirmed',
          'luotest_response' => 'required|captcha',
          'email' => 'email|unique:users,email'
      ]);

      $password = bcrypt(request('password'));
      $name = request('name');
      $user = new \App\User;
      $user->name=$request->name;
      $user->password=Hash::make($request->password);
      $user->email=$request->email;
      $user->save();
      $data = ['email'=> $user->email, 'name'=>'恭喜你已经成功注册为校园-live会员'];
        Mail::send('admin.emails.test', $data, function($message) use($data)
    {
        $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
    });
        $login=request(['name', 'password']);
        \Auth::attempt($login,false);
      return redirect('/');
    }
    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
