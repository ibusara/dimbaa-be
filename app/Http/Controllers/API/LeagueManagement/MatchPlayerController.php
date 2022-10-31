<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchTeamPlayer;
use App\Models\MatchPlayerCaution;
use App\Models\Notification;


class MatchPlayerController  extends Controller
{

    public function matchStartingPlayers(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'match' => 'required|exists:match_records,id',
            'team1_starting' => 'required||array|between:2,30',
            'team1_starting.*' => 'integer|distinct|exists:players,id',
            'team2_starting' => 'required||array|between:2,30',
            'team2_starting.*' => 'integer|distinct|exists:players,id',
        ]);



        $matchPlayer = MatchTeamPlayer::firstOrCreate(['match_id' => $input['match']]);
        $matchPlayer->team1_starting = json_encode($input['team1_starting']);
        $matchPlayer->team2_starting = json_encode($input['team2_starting']);
        $matchPlayer->update();

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Reserve";
        $notification->category = "officials";
        $notification->description = "Match Starting Players set";
        $notification->save();

        return response()->json($matchPlayer, 'Match Starting Players successfully set');
    }


    public function matchReservePlayers(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'match' => 'required|exists:match_records,id',
            'team1_reserve' => 'required||array|between:2,30',
            'team1_reserve.*' => 'integer|distinct|exists:players,id',
            'team2_reserve' => 'required||array|between:2,30',
            'team2_reserve.*' => 'integer|distinct|exists:players,id',
        ]);



        $matchPlayer = MatchTeamPlayer::firstOrCreate(['match_id' => $input['match']]);
        $matchPlayer->team1_reserve = json_encode($input['team1_reserve']);
        $matchPlayer->team2_reserve = json_encode($input['team2_reserve']);
        $matchPlayer->update();

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Reserve";
        $notification->category = "officials";
        $notification->description = "Match Reserve Players set";
        $notification->save();

        return response()->json($matchPlayer, 'Match Reserve Players successfully set');
    }


    public function matchSubstitutePlayer(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'match' => 'required|exists:match_records,id',
            'team' => 'required||integer|between:1,2',
            'minute' => 'required|integer|between:1,130',
            'in' => 'required|between:1,2',
            'player' => 'required|integer|exists:players,id',
            'condition' => 'nullable',
        ]);



        $matchPlayer = MatchTeamPlayer::firstOrCreate(['match_id' => $input['match']]);
        if ($request->team == 1) {
            $substitutions = $input;
            // $substitutions = array_merge( $substitutions, $input);
            $matchPlayer->team1_substitutions = json_encode((array)$substitutions);
            $matchPlayer->update();
        }

        return response()->json($matchPlayer, 'Match Reserve Players successfully set');
    }

    public function matchPlayerCaution(Request $request)
    {
        $user = $request->user();
        $input = $request->all('match', 'team', 'minute', 'player', 'reasons', 'warning_card');

        $request->validate([
            'match' => 'required|exists:match_records,id',
            'team' => 'required||integer',
            'minute' => 'required|integer|between:1,130',
            'warning_card' => 'required|between:1,2',
            'player' => 'required|integer|exists:players,id',
            'reasons' => 'nullable',
        ]);


        $input['match_id'] = $input['match'];
        $input['player_id'] = $input['player'];
        $input['team_id'] = $input['team'];
        $playerCaution = MatchPlayerCaution::create($input);

        return response()->json($playerCaution, 'Player Warning Disciplinary action has been set  ');
    }
}
