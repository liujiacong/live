<?php

namespace App;

use \App\Model;

class GoodsType extends Model
{
  public function user(){
    return $this->belongsTo('App\Store', 'user_id');
  }
}
