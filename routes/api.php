<?php

use App\Http\Controllers\API\Auth\AuthenticationController;
use App\Http\Controllers\API\LeagueDirector\PostMatchReportController;
use App\Http\Controllers\API\LeagueDirector\PreMatchReportController;
use App\Http\Controllers\API\Organizers\MatchRecordController;
use App\Http\Controllers\API\Organizers\TournamentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthenticationController::class, 'register']);
    Route::post('login', [AuthenticationController::class, 'login']);
    Route::post('logout', [AuthenticationController::class, 'logout']);
});

Route::middleware('auth:api')->group(function () {

    Route::get('notifications', [App\Http\Controllers\API\GeneralController::class, 'notifications']);

    // Super Admin Endpoints
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('roles', [App\Http\Controllers\API\Admins\UserManagementController::class, 'roles']);
        Route::resource('users', App\Http\Controllers\API\Admins\UserManagementController::class);
        Route::resource('teams', App\Http\Controllers\API\Admins\TeamController::class);
        Route::resource('players', App\Http\Controllers\API\Admins\PlayerController::class);
        Route::resource('stadia', App\Http\Controllers\API\Admins\StadiumController::class);
    });

    Route::prefix('teamadmin')->name('teamadmin.')->group(function () {
        Route::get('teams', [App\Http\Controllers\API\Admins\TeamController::class, 'index']);
        Route::post('team-player', [App\Http\Controllers\API\Admins\PlayerController::class, 'store']);
        Route::delete('team-player/delete/{id}', [App\Http\Controllers\API\Admins\PlayerController::class, 'destroy']);
    });

    Route::prefix('teammanager')->name('teammanager.')->group(function () {
        // Route::resource('team-player', App\Http\Controllers\API\Admins\PlayerController::class);
        Route::get('team-players', [App\Http\Controllers\API\TeamAdmin\TeamPlayerController::class, 'index']);
        Route::post('team-players/beginner', [App\Http\Controllers\API\TeamAdmin\TeamPlayerController::class, 'beginner']);
        Route::post('team-players/reserve', [App\Http\Controllers\API\TeamAdmin\TeamPlayerController::class, 'reserve']);
        Route::post('team-players/leaders', [App\Http\Controllers\API\TeamAdmin\TeamPlayerController::class, 'leaders']);

        Route::post('team-players/detail', [App\Http\Controllers\API\TeamAdmin\LineupFormController::class, 'detail']);
        Route::post('team-players/submit', [App\Http\Controllers\API\TeamAdmin\LineupFormController::class, 'submission']);
    });

    Route::prefix('organizers')->name('organizers.')->group(function () {
        Route::resource('tournaments', App\Http\Controllers\API\Organizers\TournamentController::class);
        Route::post('matchrecords/scoreboard/{id}', [App\Http\Controllers\API\Organizers\MatchRecordController::class, 'scoreboard']);
        Route::post('matchrecords/officials/{id}', [App\Http\Controllers\API\Organizers\MatchRecordController::class, 'officials']);
        Route::resource('matchrecords', App\Http\Controllers\API\Organizers\MatchRecordController::class);
    });

    Route::prefix('referee')->name('referee.')->group(function () {
        Route::post('team-results', [App\Http\Controllers\API\Officials\MatchOfficialController::class, 'matchResult']);
        Route::post('starting-players', [App\Http\Controllers\API\Officials\MatchPlayerController::class, 'matchStartingPlayers']);
        Route::post('reserve-players', [App\Http\Controllers\API\Officials\MatchPlayerController::class, 'matchReservePlayers']);
        Route::post('subtitutions', [App\Http\Controllers\API\Officials\MatchPlayerController::class, 'matchSubstitutePlayer']);

        Route::post('cautions', [App\Http\Controllers\API\Officials\MatchPlayerController::class, 'matchPlayerCaution']);
        Route::post('attitude-condition', [App\Http\Controllers\API\Officials\MatchAttitudeController::class, 'matchAttitudeCondition']);
        Route::post('attitude-condition/ground-equipment', [App\Http\Controllers\API\Officials\MatchAttitudeController::class, 'matchEquipmentCondition']);
        Route::post('official-assistant', [App\Http\Controllers\API\Officials\MatchOfficialController::class, 'matchOfficialAssistance']);
    });

    Route::prefix('general-coordinator')->name('general-coordinator.')->group(function () {
        Route::post('team-results', [App\Http\Controllers\API\Organizers\GeneralCoordinatorController::class, 'matchResult']);
        Route::post('match_official', [App\Http\Controllers\API\Organizers\GeneralCoordinatorController::class, 'matchOfficials']);
        Route::post('coordination-meeting', [App\Http\Controllers\API\Organizers\CoordinatorDetailsController::class, 'coordinationMeeting']);
    });

    Route::prefix('referee-assessor')->name('referee-assessor.')->group(function () {
        Route::post('referee-evaluation/game-control', [App\Http\Controllers\API\Officials\RefereeEvaluationController::class, 'refereeEvaluation']);
        Route::post('referee-evaluation/team-work-one', [App\Http\Controllers\API\Officials\RefereeEvaluationController::class, 'refereeEvaluation']);
        Route::post('referee-evaluation/team-work-two', [App\Http\Controllers\API\Officials\RefereeEvaluationController::class, 'refereeEvaluation']);
        Route::post('assistant-referee-evaluation/one', [App\Http\Controllers\API\Officials\RefereeEvaluationController::class, 'refereeEvaluation']);
        Route::post('assistant-referee-evaluation/two', [App\Http\Controllers\API\Officials\RefereeEvaluationController::class, 'refereeEvaluation']);
        Route::post('4th-official/evaluation', [App\Http\Controllers\API\Officials\RefereeEvaluationController::class, 'refereeEvaluation']);
    });

    //Data Manager role
    Route::prefix('data-manager')->group(function () {
        Route::get('list-match-events', [MatchRecordController::class, 'index']);
        Route::post('create-match-event', [MatchRecordController::class, 'store']);
        Route::patch('create-match-event', [MatchRecordController::class, 'update']);
        Route::post('create-tournament', [TournamentController::class, 'store']);
        Route::post('assign-match-event', [MatchRecordController::class, 'officials']);
        Route::get('scoreboard', [MatchRecordController::class, 'listScoreboard']);
        Route::get('get-match-event/{id}', [MatchRecordController::class, 'show']);
    });

    //league director role
    Route::prefix('league-director')->group(function () {
        Route::get('list-match-events', [MatchRecordController::class, 'index']);
        Route::post('create-match-event', [MatchRecordController::class, 'store']);
        Route::patch('create-match-event', [MatchRecordController::class, 'update']);
        Route::post('create-tournament', [TournamentController::class, 'store']);
        Route::post('assign-match-event', [MatchRecordController::class, 'officials']);
        Route::get('scoreboard', [MatchRecordController::class, 'listScoreboard']);
        Route::get('get-match-event/{id}', [MatchRecordController::class, 'show']);
    });

    //Match Commisioner role
    Route::prefix('match-commisioner')->group(function () {
        Route::get('list-match-events', [MatchRecordController::class, 'index']);
        Route::post('create-match-event', [MatchRecordController::class, 'store']);
        Route::patch('create-match-event', [MatchRecordController::class, 'update']);
        Route::post('create-tournament', [TournamentController::class, 'store']);
        Route::post('assign-match-event', [MatchRecordController::class, 'officials']);
        Route::get('scoreboard', [MatchRecordController::class, 'listScoreboard']);
        Route::get('get-match-event/{id}', [MatchRecordController::class, 'show']);

        Route::prefix('pre-match')->group(function () {
            Route::post('match', [PreMatchReportController::class, 'match']);
            Route::post('condition', [PreMatchReportController::class, 'storeCondition']);
            Route::post('operation', [PreMatchReportController::class, 'storeOperation']);
            Route::post('co-operation', [PreMatchReportController::class, 'storeCoOperation']);
            Route::post('colors', [PreMatchReportController::class, 'storeColors']);
            Route::post('issues', [PreMatchReportController::class, 'storeIssues']);
            Route::post('challenges', [PreMatchReportController::class, 'storeChalenges']);
            Route::post('final', [PreMatchReportController::class, 'storeFinal']);
        });

        Route::prefix('post-match')->group(function () {
            Route::post('match', [PostMatchReportController::class, 'match']);
        });
    });
});