<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $fillable = [
        'dossier_id',
        'type_reclamation',
        'observation_client',
        'reponse_gestionnaire',
        'status',
        'used',
        'seen_by'
    ];

    public function  type_reclamations(){
        return $this->hasOne('App\TypeReclamation','id','type_reclamation_id');
    }
}
