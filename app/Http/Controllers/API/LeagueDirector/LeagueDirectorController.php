<?php

namespace App\Http\Controllers\API\LeagueDirector;

use App\Http\Controllers\Controller;
use App\Models\MatchRecord;
use App\Models\MatchScoreBoard;
use App\Models\Tournament;
use Illuminate\Http\Request;

class LeagueDirecorController extends Controller
{
    public function getMatchEventLists()
    {
        $matchEventList = MatchRecord::get();

        return response()->json([
            'success' => true,
            'message' => 'Scoreboard retrieved successfully.',
            'matchEventList' => $matchEventList
        ], 200); 
    }

    public function getTournamentList()
    {
        $tournaments = Tournament::all();

        return response()->json([
            'success' => true,
            'message' => 'Tournament retrieved successfully.',
            'tournament' => $tournaments
        ], 200 );
    }

    public function getScoreBoard()
    {
        $scoreboard = MatchScoreBoard::get();

        return response()->json([
            'success' => true,
            'message' => 'Scoreboard retrieved successfully.',
            'scoreboard' => $scoreboard
        ], 200);
    }

    public function getMatchEvent($id)
    {
        $matchRecord = MatchRecord::find($id);

        if (!$matchRecord) {
            return response()->json([
                'success'=>false,
                'message'=>'Record not found'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Match Record retrieved successfully.',
            'match' => $matchRecord
        ], 200);
    }
}