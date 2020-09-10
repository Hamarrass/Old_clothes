<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoPositionVendeur extends Model
{
    use softDeletes;
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
