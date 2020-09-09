<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeReclamation extends Model
{
    protected $fillable = [
        'libelle',
        'used'
    ];

    public function reclamations(){

        return $this->belongsTo('App\Reclamation','type_reclamation_id','id');
    }
}
