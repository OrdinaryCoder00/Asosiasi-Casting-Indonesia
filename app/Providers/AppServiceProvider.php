<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Ensure a Request instance is bound when running in the console so
        // services that expect an Illuminate\Http\Request (eg. UrlGenerator)
        // can be constructed during artisan/composer scripts.
        if ($this->app->runningInConsole() && ! $this->app->bound('request')) {
            $this->app->instance('request', \Illuminate\Http\Request::create(
                $this->app->make('config')->get('app.url', 'http://localhost'),
                'GET', [], [], [], $_SERVER
            ));
        }
    }

    /**
     * Bootstrap any application services.
     */

public function boot(): void
{
    Filament::serving(function () {
        Filament::registerStyles([
            asset('css/admin.css'), // aman karena di closure
        ]);
    });
}

}
