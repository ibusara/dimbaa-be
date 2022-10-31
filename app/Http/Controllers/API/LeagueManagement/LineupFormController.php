<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LineupForm;

class LineupFormController  extends Controller
{


    public function detail(Request $request)
    {
        $input = $request->only(['team', 'competition', 'date', 'game_no']);

        $request->validate([
            'team_id' => 'required|integer|exists:teams,id',
            'competition' => 'required|integer'
        ]);

        $lineup = LineupForm::firstOrCreate(
            ['competition_id' => $request->competition, 'team_id' => $request->team_id]
        );

        array_merge($input, ['competion_id' => $request->competition, 'team_id' => $request->team_id, 'detail_date' => $request->date]);

        $lineup = $lineup->update($input);

        return response()->json($lineup, 'Lineup Details updated successfully.');
    }

    public function submission(Request $request)
    {
        $user = $request->user();
        $input = $request->only(['team', 'today_date', 'today_date', 'game_no']);

        $request->validate([
            'team' => 'required|integer|exists:teams,id'
        ]);



        $lineup = LineupForm::firstorfail($request->team);

        $input['team_id'] = $request->team;
        $lineup = $lineup->update($input);

        return response()->json($lineup, 'Lineup Submission updated successfully.');
    }
}
