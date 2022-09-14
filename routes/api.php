<?php
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
  
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
  
  
Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    // Route::post('create-user', 'create_user');

});



        
Route::middleware('auth:sanctum')->group( function () {
    Route::controller(UserController::class)->group(function(){
    
        Route::get('get-all-users', 'index');
        Route::post('user-by-roles', 'filter_user_by_roles');
        Route::post('user-sort-role', 'users_sorting_role');
        Route::post('user-sort-other', 'users_sorting_other');
       
    
    });

    Route::controller(RegisterController::class)->group(function(){
        Route::post('create-user', 'create_user');
    
    });

    Route::controller(RoleController::class)->group(function(){
        
        Route::get('get-all-roles', 'index');
    
    });
    
});