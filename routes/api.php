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

    Route::get('notifications', [App\Http\Controllers\API\GeneralController::class, 'notifications']);
    Route::resource('products', ProductController::class);

    // Super Admin Endpoints
    Route::prefix('admin')->name('admin.')->group( function () {
        Route::get('roles', [App\Http\Controllers\API\Admins\UserManagementController::class, 'roles']);
        Route::resource('users', App\Http\Controllers\API\Admins\UserManagementController::class);
        Route::resource('teams', App\Http\Controllers\API\Admins\TeamController::class);
        Route::resource('players', App\Http\Controllers\API\Admins\PlayerController::class);
        Route::resource('stadia', App\Http\Controllers\API\Admins\StadiumController::class);
    });

    Route::prefix('admin')->name('admin.')->group( function () {
        Route::get('teams', [App\Http\Controllers\API\Admins\TeamController::class, 'index']);
        Route::post('team-player', [App\Http\Controllers\API\Admins\PlayerController::class, 'store']);
        Route::delete('team-player/delete/{id}', [App\Http\Controllers\API\Admins\PlayerController::class, 'destroy']);
    }); 

    Route::prefix('teammanager')->name('teammanager.')->group( function () {
        // Route::resource('team-player', App\Http\Controllers\API\Admins\PlayerController::class);
        Route::get('team-players',[App\Http\Controllers\API\TeamAdmin\TeamPlayerController::class, 'index']);
        Route::post('team-players/beginner',[ App\Http\Controllers\API\TeamAdmin\TeamPlayerController::class, 'beginner']);
        Route::post('team-players/reserve',[ App\Http\Controllers\API\TeamAdmin\TeamPlayerController::class, 'reserve']);
        Route::post('team-players/leaders',[ App\Http\Controllers\API\TeamAdmin\TeamPlayerController::class, 'leaders']);

        Route::post('team-players/detail',[ App\Http\Controllers\API\TeamAdmin\LineupFormController::class, 'detail']);
        Route::post('team-players/submit',[ App\Http\Controllers\API\TeamAdmin\LineupFormController::class, 'submission']);
    });

    Route::prefix('organizers')->name('organizers.')->group( function () {
        Route::resource('tournaments', App\Http\Controllers\API\Organizers\TournamentController::class);
        Route::post('matchrecords/scoreboard/{id}', [App\Http\Controllers\API\Organizers\MatchRecordController::class, 'scoreboard']);
        Route::post('matchrecords/officials/{id}', [App\Http\Controllers\API\Organizers\MatchRecordController::class, 'officials']);
        Route::resource('matchrecords', App\Http\Controllers\API\Organizers\MatchRecordController::class);
    });

    Route::prefix('refree')->name('refree.')->group( function () {
        Route::post('team-results', [App\Http\Controllers\API\Officials\MatchOfficialController::class, 'matchResult']);
        Route::post('starting-players', [App\Http\Controllers\API\Officials\MatchPlayerController::class, 'matchStartingPlayers']);
        Route::post('reserve-players', [App\Http\Controllers\API\Officials\MatchPlayerController::class, 'matchReservePlayers']);
        Route::post('subtitutions', [App\Http\Controllers\API\Officials\MatchPlayerController::class, 'matchSubstitutePlayer']);

        Route::post('cautions', [App\Http\Controllers\API\Officials\MatchPlayerController::class, 'matchPlayerCaution']);
        Route::post('attitude-condition', [App\Http\Controllers\API\Officials\MatchAttitudeController::class, 'matchAttitudeCondition']);
        Route::post('attitude-condition/ground-equipment', [App\Http\Controllers\API\Officials\MatchAttitudeController::class, 'matchEquipmentCondition']);
        Route::post('official-assistant', [App\Http\Controllers\API\Officials\MatchOfficialController::class, 'matchOfficialAssistance']);
    });

});
