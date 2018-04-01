<?php

namespace App;

use \App\Model;

class User_address extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }
}
