<?php

namespace App;

use \App\Model;

class ArticleCate extends Model
{
    //
    public function article(){
      return $this->hasMany('App\Article','cid');
    }
}
