<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function user_address()
   {
       return $this->hasMany('App\User_address')->orderBy('is_default', 'desc');
   }
   public function GoodsCate(){
      return $this->hasMany('App\GoodsCate')->orderBy('created_at', 'desc');
   }
   public function GoodsType(){
      return $this->hasMany('App\GoodsType')->orderBy('created_at', 'desc');
   }
}
