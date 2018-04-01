<?php

namespace App\Store\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
 public function __construct()
    {
       $me = \Auth::user();

       if(!$me){
       	return redirect('/');
       }
    }
  public function index(){
    return view('/store/home/index');
  }
}
