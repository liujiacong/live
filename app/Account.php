<?php

namespace App;

use \App\Model;

class Account extends Model
{
  public function user()
    {
        return $this->belongsTo('App\User');
    }
}
