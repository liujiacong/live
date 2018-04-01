<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Store;
use App\User_address;
use App\Order;
use App\Goods;
use App\Account;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(){
      $me = \Auth::user();
      // var_dump($me);
      return view('user/show', compact('me'));

    }
    public function updata(Request $request){
      $this->validate(request(),[
          'name' => 'min:3',
          'sex'=>'numeric',
          'qq'=>'min:6|numeric'
      ]);
      $user = \Auth::user();
      $name = request('name');
      $user->qq = request('qq');
      $user->sex = request('sex');
      if ($name != $user->name) {
          if(\App\User::where('name', $name)->count() > 0) {
              return back()->withErrors(array('message' => '用户名称已经被注册'));
          }
          $user->name = request('name');
      }
      if ($request->file('head_pic')) {
          $path = $request->file('head_pic')->store('public');
          $user->head_pic = "/storage".strstr( $path, '/');
      }

      $user->save();
      return back();

    }
    public function account(){
      $me = \Auth::user();
      $account=Account::where('user_id',$me->id)->orderBy('created_at', 'desc')->paginate(5);
      // dd($account);
      return view('user/account', compact('me','account'));
    }
    public function address(){
      $me = \Auth::user();
      return view('user/address', compact('me'));
    }
    public function creat(Request $request){
      $me = \Auth::user();
      $this->validate(request(),[
        'consignee'=>'required',
        'province'=>'required',
        'city'=>'required',
        'district'=>'required',
        'address'=>'required',
        'zipcode'=>'required',
        'mobile'=>'required|numeric|min:11'
      ]);
      $count = User_address::where('user_id', $me->id)->count();
      if($count>=4){
        return back()->withErrors('已有四个收货地址');
      }
      if(request('is_default')==1){
        DB::table('user_addresses')->where('user_id',$me->id)->update(['is_default'=>0]);
      }
        $address=new User_address();
        $address->consignee=request('consignee');
        $address->province=request('province');
        $address->city=request('city');
        $address->district=request('district');
        $address->address=request('address');
        $address->zipcode=request('zipcode');
        $address->mobile=request('mobile');
        $address->user_id=$me->id;
        $address->is_default=request('is_default')?1:0;
        $address->save();
        return back();
    }
    public function creattocart(Request $request){
      $me = \Auth::user();
      $this->validate(request(),[
        'consignee'=>'required',
        'province'=>'required',
        'city'=>'required',
        'district'=>'required',
        'address'=>'required',
        'zipcode'=>'required',
        'mobile'=>'required|numeric|min:11'
      ]);
      if(request('is_default')==1){
        DB::table('user_addresses')->where('user_id',$me->id)->update(['is_default'=>0]);
      }
        $address=new User_address();
        $address->consignee=request('consignee');
        $address->province=request('province');
        $address->city=request('city');
        $address->district=request('district');
        $address->address=request('address');
        $address->zipcode=request('zipcode');
        $address->mobile=request('mobile');
        $address->user_id=$me->id;
        $address->is_default=request('is_default')?1:0;
        $address->save();
        echo "<script>parent.call_back_fun('success');</script>";
        exit(); //
    }
    public function edit(user_address $user_address){
      $this->authorize('update', $user_address);
      return json_encode($user_address);
    }
    public function store(Request $request,user_address $user_address){
      // dd($request);
      $me = \Auth::user();
      $this->validate(request(),[
        'consignee'=>'required',
        'province'=>'required',
        'city'=>'required',
        'district'=>'required',
        'address'=>'required',
        'zipcode'=>'required',
        'mobile'=>'required|numeric|min:11'
      ]);
      $this->authorize('update', $user_address);
      if(request('is_default')==1){
        DB::table('user_addresses')->where('user_id',$me->id)->update(['is_default'=>0]);
      }
        $user_address->consignee=request('consignee');
        $user_address->province=request('province');
        $user_address->city=request('city');
        $user_address->district=request('district');
        $user_address->address=request('address');
        $user_address->zipcode=request('zipcode');
        $user_address->mobile=request('mobile');
        $user_address->user_id=$me->id;
        $user_address->is_default=request('is_default')?1:0;
        $user_address->save();
        if(request('ajax')==1){
          echo "<script>parent.call_back_fun('success');</script>";
          exit(); //
        }else{
          return back();
        }

    }
    public function delete(user_address $user_address){
      $this->authorize('update', $user_address);
      $user_address->delete();
      return back();
    }
    public function default(user_address $user_address){
      $this->authorize('update', $user_address);
      DB::table('user_addresses')->where('user_id',$user_address->user_id)->update(['is_default'=>0]);
      $user_address->is_default=1;
      $user_address->save();
      return json_encode(['status'=>1]);
    }
    public function creatstore(){
        $me = \Auth::user();
        if($me->has_store==1){
          return redirect('/user/me');
        }
        return view('user/creat', compact('me'));
    }
    public function creat_store(Request $request){
      $me = \Auth::user();
      $this->validate(request(),[
        'name'=>'required',
        'true_name'=>'required',
        'store_conten'=>'required',
        'pic'=>'required',
      ]);

          foreach(request('pic') as $key=>$value){
            $base64_image_content = $value;
            //匹配出图片的格式
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $new_file = "store/user/idimg/".date('Ymd',time())."/";

            if(!file_exists($new_file))
            {
              // echo $new_file;
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($new_file,755,true);
            }
            $new_file = $new_file.time().$me->id.$key.".{$type}";
            $files[$key] = '/store/user/idimg/'.date('Ymd',time()).'/'.$me->id.$key.".{$type}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
            // echo '新文件保存成功：', $new_file;
            }else{
            // echo '新文件保存失败';
            }
            }
          }
          $pic=serialize($files);
            $store=new store();
            $store->name=request('name');
            $store->store_conten=request('store_conten');
            $store->user_id=$me->id;
            $store->pic=$pic;

            $store->true_name=request('true_name');
            $store->save();
            return redirect('/user/me');
    }
    public function collection(){
       $me = \Auth::user();
       $collection=unserialize($me->collection_shop);
       // var_dump($collection);
       $goods=array();
       // dd($goods);

       foreach ($collection as $key => $value) {
          $item=Goods::find($value);
          if($item){
          array_push($goods,$item);
          }
       }
       // dd($goods);
      return view('user/collection',compact('me','goods'));
    }
    public function safe(){
      $me = \Auth::user();
      return view('user/safe',compact('me'));
    }
     public function retpass(){
      $me = \Auth::user();
      return view('user/retpass',compact('me'));
    }
    public function retpassword(request $request){
               $this->validate($request, [
                      'oldpassword' => 'required',
                       'password' => 'required|min:5|confirmed',
                ]);
               $me = \Auth::user();
               if(Hash::check(request('oldpassword'), $me->password)){
                $me->password=Hash::make(request('password'));
                $me->save();
                return back()->withErrors('修改成功');
               }else{
                return back()->withErrors("原密码错误");
               }


    }
    public function tixian(request $request){
       $this->validate($request, [
                      'alipay' => 'required',
                ]);
        $me = \Auth::user();
        if($me->money<=0){
          return back()->withErrors('当前余额为0');
        }
        $account=new Account();
            $account->user_id=$me->id;
            $account->type=1;
            $account->status=0;
            $account->money=$me->money;
            $account->note='提现到-'.request('alipay');
            $account->save();
        $me->money=0;
        $me->save();
        return back()->withErrors('已提交你的提现请求');

    }
    public function qx_tixian(Account $Account){
      $me = \Auth::user();
      if($Account->user_id!=$me->id){
        return redirect('/');
      }
      $me->money=$me->money+$Account->money;
      $me->save();
      $Account->delete();
      return back();

    }
}
