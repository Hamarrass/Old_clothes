<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationVendeur extends Model
{
    protected $fillable = [
        'name',
        'image_path',
        'info_position_vendeur_id',
        'user_id'
    ];

    public function info_position_vendeurs(){

        return $this->belongsTo('App\InfoPositionVendeur');

    }
}
