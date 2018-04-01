<?php

namespace App;

use \App\Model;
use Illuminate\Support\Facades\Cache;

class Article extends Model
{
    public function cate(){
      return $this->belongsTo('App\ArticleCate', 'cid');
    }

}
