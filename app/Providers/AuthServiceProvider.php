<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->role=="admin"
            ? true
            : false;
        });
        Gate::define('isModer', function ($user) {
            return $user->role=="mod"
            ? true
            : false;
        });
        Gate::define('isUser', function ($user) {
            return $user->role=="user"
            ? true
            : false;
        });
    }
}
