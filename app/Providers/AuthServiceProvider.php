<?php

namespace App\Providers;

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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('events', 'App\Policies\EventPolicy');
        Gate::resource('posts', 'App\Policies\PostPolicy');
        Gate::resource('refugees', 'App\Policies\RefugeePolicy');
        Gate::resource('organizations', 'App\Policies\OrganizationPolicy');
        Gate::resource('users', 'App\Policies\UserPolicy');
        Gate::resource('demands', 'App\Policies\DemandPolicy');
        Gate::resource('donations', 'App\Policies\DonationPolicy');
        Gate::resource('transfers', 'App\Policies\TransferPolicy');
        
        Gate::define('users.activate', 'App\Policies\UserPolicy@activate');
        Gate::define('transfers.list', 'App\Policies\TransferPolicy@list');
    }
}
