<?php

use Illuminate\Support\Facades\Route;
use Modules\Organization\Http\Controllers\OrganizationController;

Route::prefix('organizations')
    ->name('organizations.')
    ->group(function () {

        Route::get('/building/{buildingId}', [OrganizationController::class, 'listByBuilding'])
            ->name('listByBuilding')
            ->whereNumber('buildingId');
        Route::get('/activity/{activityId}', [OrganizationController::class, 'listByActivity'])
            ->name('listByActivity')
            ->whereNumber('activityId');

        Route::get('/geo-square/{lat1}/{lon1}/{lat2}/{lon2}', [OrganizationController::class, 'listByGeoSquare'])
            ->name('listByGeoSquare')
            ->where('lat1', '[0-9.]+')
            ->where('lon1', '[0-9.]+')
            ->where('lat2', '[0-9.]+')
            ->where('lon2', '[0-9.]+');

        Route::get('/{organizationId}', [OrganizationController::class, 'byId'])
            ->name('byId')
            ->whereNumber('organizationId');

        Route::get('/activity/{activityName}', [OrganizationController::class, 'listByActivityName'])
            ->name('listByActivityName')
            ->where('activityName', '.*');

        Route::get('/name/{organizationName}', [OrganizationController::class, 'byName'])
            ->name('byName')
            ->where('organizationName', '.*');

    });
