<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LineupForm;

class LineupFormController  extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:view-team-players', ['only' => ['detail']]);
        $this->middleware('permission:add-team-players', ['only' => ['submission']]);
    }

    public function detail(Request $request)
    {
        $input = $request->only(['team_id', 'competition', 'date', 'game_no']);

        $request->validate([
            'team_id' => 'required|integer|exists:teams,id',
            'competition' => 'required|integer'
        ]);

        $lineup = LineupForm::firstOrCreate(
            ['competition_id' => $request->competition, 'team_id' => $request->team_id]
        );

        array_merge($input, ['competion_id' => $request->competition, 'team_id' => $request->team_id, 'detail_date' => $request->date]);

        $lineup = $lineup->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Lineup Details updated successfully.',
            'lineup' => $lineup
        ], 200);
    }

    public function submission(Request $request)
    {
        $user = $request->user();
        $input = $request->only(['team_id', 'today_date', 'game_no']);

        $request->validate([
            'team_id' => 'required|integer|exists:teams,id'
        ]);
        $lineup = LineupForm::where('team_id',$request->team_id)->first();

        if($lineup == ''){
            LineupForm::create([
                'today_date' => $request->post('today_date'),
                'game_no' => $request->post('today_date'),
            ]);
        }else{
            LineupForm::where('team_id',$request->team_id)->update([
                'today_date' => $request->post('today_date'),
                'game_no' => $request->post('game_no'),
            ]);
        }
        $lineup = LineupForm::where('team_id',$request->team_id)->first();


        return response()->json([
            'success' => true,
            'message' => 'Lineup Submission updated successfully.',
            'lineup' => $lineup
        ], 200);
    }
}
