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
    Route::resource('products', ProductController::class);
    Route::resource('tournaments', App\Http\Controllers\API\TournamentController::class);
    Route::resource('matchrecord', App\Http\Controllers\API\MatchRecordController::class);
});
