<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\InfoPositionVendeur' => 'App\Policies\InfoPositionVendeurPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//   Gate::resource('informativeness','App\Policies\InfoPositionVendeurPolicy');


//    Gate::define("informativeness.delete",function($user ,$nfoPositionvendeur){
//        return $user->id ===   $nfoPositionvendeur->user_id;
//    });
//
//    Gate::define("informativeness.update",function ($user, $infopsitionvendeur){
//        return$user->id === $infopsitionvendeur->user_id;
//    });

    Gate::before(function ($user, $ability){
        if($user->is_admin  && in_array($ability , ["update"])){
            return true;
        }
    });

    }
}
