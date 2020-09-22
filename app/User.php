<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use  Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Static_;


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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function info_position_vendeurs (){
        return $this->hasMany('App\InfoPositionVendeur');
    }

public  function scopeUserMoreSharer(Builder $query){
    return $query->withCount('info_position_vendeurs')->orderBy('info_position_vendeurs_count','desc');
}

    public function scopeUserActiveLastMonth(Builder $query){
      return $query->withCount(['info_position_vendeurs'=>function(Builder $query){
          return $query->whereBetween(static::CREATED_AT,[now()->subHours(3),now()]);
      }])->having('info_position_vendeurs_count','>','0')->orderBy('created_at','desc');
    }

}

