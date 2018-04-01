<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{

public function send()
  {
      $data = ['email'=>'734362286@qq.com', 'name'=>'jcy'];
		Mail::send('admin.emails.test', $data, function($message) use($data)
		{
		    $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
		});

  }
}
