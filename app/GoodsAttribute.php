<?php

namespace App;

use \App\Model;

class GoodsAttribute extends Model
{
        public function type()
      {
        return $this->belongsTo('App\GoodsType','type_id');
      }
}
