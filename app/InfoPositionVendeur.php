<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPositionVendeur extends Model
{
    protected $fillable = [
        'ville',
        'quartier',
        'telephone',
        'user_id',
        'used'
    ];

    public function  information_vendeurs(){
        return $this->hasMany('App\InformationVendeur');
    }
}
