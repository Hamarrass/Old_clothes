<?php

namespace App;


use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InformationVendeur extends Model
{
    use softDeletes;
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
