<?php

namespace App;

use \App\Model;

class store extends Model
{
  public function user(){
    return $this->belongsTo('App\User', 'user_id');
  }
  public function cate(){
    return $this->hasMany('App\GoodsCate','user_id','user_id')->orderBy('order', 'desc');
  }
  public function goods(){
    return $this->hasMany('App\Goods','user_id','user_id')->where('is_sale',0)->orderBy('order', 'desc');

  }

}
