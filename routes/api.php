
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CrewController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\ResourcesMgmtController;

// Routes pour la gestion des destinations
Route::middleware('api')->group(function () {
    Route::apiResource('destinations', DestinationController::class);
    Route::apiResource('crews', CrewController::class);
    Route::apiResource('technologies', TechnologyController::class);
});



Route::prefix('resources-mgmt')->middleware('auth:api')->group(function () {    // Routes pour gérer les crews
    Route::match(['post', 'put', 'delete'], '/crew', [ResourcesMgmtController::class, 'manageCrew']);
    
    // Routes pour gérer les destinations
    Route::match(['post', 'put', 'delete'], '/destination', [ResourcesMgmtController::class, 'manageDestinations']);

    // Routes pour gérer les technologies
    Route::match(['post', 'put', 'delete'], '/technology', [ResourcesMgmtController::class, 'manageTechnologies']);
});

