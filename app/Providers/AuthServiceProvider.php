<?php

namespace App\Providers;

use App\Project;
use App\Policies\ProjectPolicy;
use App\Mprduration;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',

        // Project::class => ProjectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();




      Gate::define('final-submit', function ($user) {

     $year_month = Mprduration::where('closed', 0)->value('year_month');
       
        return $user->statuses()->where([
                    ['year_month', '=', $year_month],
                    ['submitted', '=', 1]
                ])->doesntExist();
    });


      Gate::define('finally-submitted', function ($user) {

         $year_month = Mprduration::where('closed', 0)->value('year_month');
       
        return $user->statuses()->where([
                    ['year_month', '=', $year_month],
                    ['submitted', '=', 1]
                ])->exists() ;
    });

        //
    }
}
