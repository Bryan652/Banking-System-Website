<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Model::preventLazyLoading();

        Gate::define('view-admin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('edit-approve', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('edit-audit', function ($user) {
            return $user->role === 'admin';
        });
    }
}
