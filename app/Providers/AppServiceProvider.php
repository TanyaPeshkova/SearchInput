<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GithubService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(GithubService::class, function () {
            return new GithubService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
