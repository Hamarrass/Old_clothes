<?php

namespace App;

use App\Scopes\LatestScope;
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

    public  function users(){
        return $this->belongsTo(User::class);
    }




    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        //add some queries to some call to data (to avoid  repition)
        static::addGlobalScope(new LatestScope);

         static::deleting(function (InfoPositionVendeur $infoPositionVendeur){
             $infoPositionVendeur->information_vendeurs()->delete();
         });

         static::restoring(function (InfoPositionVendeur $infoPositionVendeur){
             $infoPositionVendeur->information_vendeurs()->restore();
         });

        static::forceDeleted(function (InfoPositionVendeur $infoPositionVendeur){
            $infoPositionVendeur->information_vendeurs()->forceDelete();
        });


    }
}
