<?php

namespace App;
use Illuminate\Http\Request;
use \App\Model;
use \App\SpecItem;
use Auth;
class Spec extends Model
{

  public function type()
{
  return $this->belongsTo('App\GoodsType','type_id');
}
  public function item(){
    return $this->hasOne('App\SpecItem');
  }
  public function add(request $request){
    $spec=new Spec;
    $spec->name=request('name');
    $spec->type_id=request('type_id');
    $spec->order=request('order');
    $spec->user_id=Auth::user()->id;
    $spec->save();

    $item=explode("\n",request('spec_item'));
    foreach($item as $key=>$val){
      $SpecItem=new SpecItem;
      $SpecItem->item=$val;
      $SpecItem->spec_id=$spec->id;
      $SpecItem->save();
    }

  }

  public function SpecItem()
     {
         return $this->hasMany('App\SpecItem');
     }
}
