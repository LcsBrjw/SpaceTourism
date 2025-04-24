<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Le namespace utilisé par les contrôleurs de l'application.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Définir les routes pour l'application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Définir les routes de l'application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Définir les routes API.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace . '\\Api')
             ->group(base_path('routes/api.php'));
    }

    /**
     * Définir les routes Web.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
}
