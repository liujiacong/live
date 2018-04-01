<?php

namespace App;

use \App\Model;

class GoodsCate extends Model
{
  public function extend_goods()
 {

     return $this->hasMany('App\Goods','extend_cate')->where(['is_sale'=>0,'is_delect'=>0])->orderBy('created_at', 'desc');
 }
}
