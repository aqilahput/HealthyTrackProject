<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        // View food allowed for both admin and user
        Gate::define("view-food", function (User $user) {
            return in_array($user->role, ['admin', 'user']);
        });

        // Only admin can create/store food
        Gate::define("store-food", function (User $user) {
            return $user->role === 'admin';
        });

        // Only admin can edit food
        Gate::define("edit-food", function (User $user) {
            return $user->role === 'admin';
        });

        // Only admin can delete food
        Gate::define("destroy-food", function (User $user) {
            return $user->role === 'admin';
        });
    }
}
