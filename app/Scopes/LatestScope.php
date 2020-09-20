<?php
namespace App\Scopes;
//  we declare a class  has the same namespace(everything in the app we name them a namespace)
//we implement an interface Scope has a method  his name apply
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LatestScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
          // Builder and Model  are a class
         // $builder and $model  are an  objet
        // TODO: Implement apply() method.

        $builder->orderBy('created_at','desc');
    }
}
