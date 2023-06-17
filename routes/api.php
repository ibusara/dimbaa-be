<?php

use App\Http\Controllers\API\Admin\PermissionController;
use App\Http\Controllers\API\Admin\RoleController;
use App\Http\Controllers\API\Admin\StadiumController;
use App\Http\Controllers\API\Admin\TeamController;
use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\API\Auth\AuthenticationController;
use App\Http\Controllers\API\GeneralController;
use App\Http\Controllers\API\LeagueDirector\PostMatchReportController;
use App\Http\Controllers\API\LeagueDirector\PreMatchReportController;
use App\Http\Controllers\API\LeagueManagement\CoordinatorDetailsController;
use App\Http\Controllers\API\LeagueManagement\GeneralCoordinatorController;
use App\Http\Controllers\API\LeagueManagement\LineupFormController;
use App\Http\Controllers\API\LeagueManagement\MatchAttitudeController;
use App\Http\Controllers\API\LeagueManagement\MatchOfficialController;
use App\Http\Controllers\API\LeagueManagement\MatchPlayerController;
use App\Http\Controllers\API\LeagueManagement\MatchRecordController;
use App\Http\Controllers\API\LeagueManagement\PlayerController;
use App\Http\Controllers\API\LeagueManagement\RefereeEvaluationController;
use App\Http\Controllers\API\LeagueManagement\TournamentController;
use App\Http\Controllers\ApparelController;
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
Route::post('test-compress',function (Request $request){
   return (new \App\Libraries\ImageProcessor())->resize_image($request,'player_image',500,400);
});
Route::get('test-api-routes',function (){
    return "It works";
});
Route::group(['middleware' => ['cors', 'json.response']], function () {

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

    Route::post('forget-password', [AuthenticationController::class, 'forgetpassword']);
    Route::post('/verify-reset-password', [AuthenticationController::class, 'resetpasswordload']);
    Route::post('/reset-password', [AuthenticationController::class, 'resetpassword']);
    
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthenticationController::class, 'register']);
        Route::post('login', [AuthenticationController::class, 'login']);
        Route::post('logout', [AuthenticationController::class, 'logout'])->middleware('auth:api');
    });

    // Route::middleware(['auth:api', 'has.role', 'permission.check'])->group(function () {
    Route::middleware(['auth:api'])->group(function () {

        Route::get('notifications', [GeneralController::class, 'notifications']);
        Route::get('unread-notifications', [GeneralController::class, 'unread_notifications']);

        Route::prefix('admin')->group(function () {
            Route::apiResource('roles', RoleController::class);
            Route::get('roles-data', [RoleController::class,'rolesData']);
            Route::apiResource('permissions', PermissionController::class);
            Route::apiResource('users', UserController::class);
            Route::apiResource('teams', TeamController::class);
            Route::apiResource('stadia', StadiumController::class);
        });

        Route::prefix('teammanager')->name('teammanager.')->group(function () {
            Route::apiResource('apparels', PlayerController::class);
            Route::post('team-players/detail', [LineupFormController::class, 'detail']);
            Route::post('team-players/submit', [LineupFormController::class, 'submission']);
            Route::apiResource('apparels',ApparelController::class);
            Route::apiResource('players', PlayerController::class);
        });

        Route::prefix('organizers')->name('organizers.')->group(function () {
            Route::apiResource('tournaments', TournamentController::class);
            Route::post('matchrecords/scoreboard/{id}', [MatchRecordController::class, 'scoreboard']);
            Route::post('matchrecords/officials/{id}', [MatchRecordController::class, 'officials']);
            Route::apiResource('matchrecords', MatchRecordController::class);
        });

        Route::prefix('referee')->name('referee.')->group(function () {
            Route::get('list-match-events', [MatchRecordController::class, 'index']);
            Route::post('team-results', [MatchOfficialController::class, 'matchResult']);
            Route::post('starting-players', [MatchPlayerController::class, 'matchStartingPlayers']);
            Route::post('reserve-players', [MatchPlayerController::class, 'matchReservePlayers']);
            Route::post('subtitutions', [MatchPlayerController::class, 'matchSubstitutePlayer']);

            Route::post('cautions', [MatchPlayerController::class, 'matchPlayerCaution']);
            Route::post('attitude-condition', [MatchAttitudeController::class, 'matchAttitudeCondition']);
            Route::post('attitude-condition/ground-equipment', [MatchAttitudeController::class, 'matchEquipmentCondition']);
            Route::post('official-assistant', [MatchOfficialController::class, 'matchOfficialAssistance']);
        });

        Route::prefix('general-coordinator')->name('general-coordinator.')->group(function () {
            Route::get('details/{match_id}', [GeneralCoordinatorController::class, 'details']);
            Route::get('get-match-officials/{match_id}', [GeneralCoordinatorController::class, 'GetMatchOfficials']);
            Route::get('get_region/{match_id}', [GeneralCoordinatorController::class, 'getRegion']);
            Route::get('list-match-events', [MatchRecordController::class, 'index']);
            Route::post('team-results', [GeneralCoordinatorController::class, 'matchResult']);
            Route::post('match_official', [GeneralCoordinatorController::class, 'matchOfficials']);
            Route::post('coordination-meeting', [CoordinatorDetailsController::class, 'coordinationMeeting']);
            Route::post('play-fair', [CoordinatorDetailsController::class, 'playFair']);
            Route::post('performance-behaviour', [CoordinatorDetailsController::class, 'performanceBehaviour']);
            Route::post('incident', [CoordinatorDetailsController::class, 'incident']);
            Route::post('pitch-condition', [CoordinatorDetailsController::class, 'pitchCondition']);
            Route::post('dressing-room', [CoordinatorDetailsController::class, 'dressingRoom']);
            Route::post('stretcher-ambulance', [CoordinatorDetailsController::class, 'stretcherAmbulance']);
            Route::post('information', [GeneralCoordinatorController::class, 'information']);
            Route::post('incident_step5', [GeneralCoordinatorController::class, 'incident']);
            Route::post('remarks', [GeneralCoordinatorController::class, 'remarks']);
            Route::post('name', [GeneralCoordinatorController::class, 'name']);
            Route::post('date', [GeneralCoordinatorController::class, 'date']);
        });

        Route::prefix('referee-assessor')->name('referee-assessor.')->group(function () {
            Route::get('list-match-events', [MatchRecordController::class, 'index']);
            Route::post('referee-evaluation/game-control', [RefereeEvaluationController::class, 'refereeEvaluation']);
            Route::post('referee-evaluation/team-work-one', [RefereeEvaluationController::class, 'refereeEvaluation']);
            Route::post('referee-evaluation/team-work-two', [RefereeEvaluationController::class, 'refereeEvaluation']);
            Route::post('assistant-referee-evaluation/one', [RefereeEvaluationController::class, 'refereeEvaluation']);
            Route::post('assistant-referee-evaluation/two', [RefereeEvaluationController::class, 'refereeEvaluation']);
            Route::post('4th-official/evaluation', [RefereeEvaluationController::class, 'refereeEvaluation']);
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
        //All Roles List Match Events
        Route::get('/{any}/list-match-events',[MatchRecordController::class,'index']);
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
                Route::post('challenges', [PreMatchReportController::class, 'storeChallenges']);
                Route::post('final', [PreMatchReportController::class, 'storeFinal']);
            });

            Route::prefix('post-match')->group(function () {
                Route::post('match', [PostMatchReportController::class, 'match']);
            });
        });
    });

    // ...
});
