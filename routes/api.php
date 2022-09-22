<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;

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

Route::any('/', function (Request $request) {
    return response()->json([
        'status' => true,
        'message' => "If you're not sure you know what you are doing, you probably shouldn't be using this API...",
        'data' => [
            'service' => 'mis-api',
            'version' => '1.0',
        ]
    ], 200);
});

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    // Super Admin Endpoints
    Route::prefix('admin')->name('admin.')->group( function () {
        Route::get('roles', [App\Http\Controllers\API\Admins\UserManagementController::class, 'roles']);
        Route::resource('users', App\Http\Controllers\API\Admins\UserManagementController::class);
        Route::resource('teams', App\Http\Controllers\API\Admins\TeamController::class);
        Route::resource('players', App\Http\Controllers\API\Admins\PlayerController::class);
        Route::resource('stadia', App\Http\Controllers\API\Admins\StadiumController::class);
    });

    Route::prefix('teamadmin')->name('teamadmin.')->group( function () {
        Route::resource('team-player', App\Http\Controllers\API\Admins\PlayerController::class);
    });

    Route::prefix('organizers')->name('organizers.')->group( function () {

    });
    Route::resource('tournaments', App\Http\Controllers\API\TournamentController::class);
    Route::resource('matchrecord', App\Http\Controllers\API\MatchRecordController::class);

    Route::resource('products', ProductController::class);
});
