<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::define('edit-dish', function (User $user) {
            return (bool) $user->is_admin;
        });

        Gate::define('delete-dish', function (User $user) {
            return (bool) $user->is_admin;
        });
    }
}
