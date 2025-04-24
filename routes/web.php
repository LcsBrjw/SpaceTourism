<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CrewController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\ResourcesMgmtController;

// Page publique
Route::get('/', function () {
    return view('welcome');
})->name('welcome');



// Auth routes (via Breeze)
require __DIR__.'/auth.php';

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/resources-mgmt', [ResourcesMgmtController::class, 'index'])->name('dashboard');
});
    

    /**
     * 👥 Routes pour les rôles : admin
     * CRUD pour les ressources
     */
    Route::middleware(['auth', 'isAdmin'])
    ->prefix('resources-mgmt')
    ->name('resources-mgmt.')
    ->group(function () {
        Route::resource('technologies', TechnologyController::class);
        Route::resource('crews', CrewController::class);
        Route::resource('destinations', DestinationController::class);
    });



