<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// import controller
use App\Http\Controllers\Api\HotspotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route group for HostpotController
Route::group(['prefix' => 'ip/hotspot'], function () {
    // get all users hotspot
    Route::get('/users', [HotspotController::class, 'getAllUsers']);

    // get user hotspot by id
    Route::get('/users/{id}', [HotspotController::class, 'getUserById']);

    // get user hotspot by profile
    Route::get('/users/profile', [HotspotController::class, 'getUserByProfile']);

    // add user hotspot
    Route::post('/users', [HotspotController::class, 'addUser']);
});

