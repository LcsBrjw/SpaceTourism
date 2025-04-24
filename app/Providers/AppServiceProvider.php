<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\MaintenanceMode;
use Illuminate\Foundation\MaintenanceModeManager;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(MaintenanceMode::class, function ($app) {
            return $app->make(MaintenanceModeManager::class);
        });
    }

    public function boot(): void
    {
        //
    }
}
