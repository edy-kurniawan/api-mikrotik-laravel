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
// Route::group(['middleware' => 'auth.apikey', 'prefix' => 'ip/hotspot'], function () {
Route::group(['prefix' => 'ip/hotspot'], function () {
//users
    // get all users hotspot
    Route::get('/users', [HotspotController::class, 'getAllUsers']);

    // get user hotspot by id
    Route::get('/users/{id}', [HotspotController::class, 'getUserById']);

    // get user hotspot by profile
    Route::get('/users/profile', [HotspotController::class, 'getUserByProfile']);

    // add user hotspot
    Route::post('/users', [HotspotController::class, 'addUser']);

    // edit user hotspot
    Route::put('/users/{id}', [HotspotController::class, 'editUser']);

//user profile
    // get user profile
    Route::get('/profiles', [HotspotController::class, 'getAllProfiles']);

    // post user profile
    Route::post('/profiles', [HotspotController::class, 'addProfile']);
});

