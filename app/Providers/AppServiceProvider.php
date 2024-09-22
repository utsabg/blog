<?php

namespace App\Providers;
use Laravel\Sanctum\Sanctum;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Sanctum\PersonalAccessToken;

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
        Paginator::useBootstrapFive();
        class_alias(PersonalAccessToken::class, \Laravel\Sanctum\PersonalAccessToken::class);

        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
