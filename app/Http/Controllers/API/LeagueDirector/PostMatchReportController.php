<?php

namespace App\Http\Controllers\API\LeagueDirector;

use App\Http\Controllers\Controller;
use App\Models\PostMatchReport;
use Illuminate\Http\Request;

class PostMatchReportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:add-post-match-report', ['only' => ['match']]);
    }
    /**
     * Post report match.
     *
     * @return \Illuminate\Http\Response
     */
    public function match(Request $request)
    {
        $request->validate([
            'match_id' => 'required|exists:match_records,id',
            'away_team' => 'required|integer|exists:teams,id',
            'city' => 'required',
            'competition' => 'required',
            'home_team' => 'required|integer|exists:teams,id',
            'kick_off_time' => 'required',
            'match_commissionar' => 'required',
            'match_date' => 'required',
            'stadium' => 'required'
        ]);
    }
}