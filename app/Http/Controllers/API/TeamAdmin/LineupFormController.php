<?php

namespace App\Http\Controllers\API\TeamAdmin;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LineupForm;
use Validator;

class LineupFormController extends BaseController
{


    public function detail(Request $request)
    {
        $user = $request->user();
        $input = $request->only(['team', 'competition', 'date', 'game_no']);

        $validator = Validator::make($input, [
            'team' => 'required|integer|exists:teams,id',
            'competition' => 'required|integer'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $lineup = LineupForm::firstOrCreate(
            ['competition_id' => $request->competition, 'team_id' => $request->team]
        );

        array_merge($input,['competion_id' => $request->competition, 'team_id' => $request->team, 'detail_date' => $request->date]);

        $lineup = $lineup->update($input);

        return $this->sendResponse($lineup, 'Lineup Details updated successfully.');
    }

    public function submission(Request $request)
    {
        $user = $request->user();
        $input = $request->only(['team', 'today_date', 'today_date', 'game_no']);

        $validator = Validator::make($input, [
            'team' => 'required|integer|exists:teams,id'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $lineup = LineupForm::firstorfail($request->team);

        array_merge($input,['team_id' => $request->team]);

        $input['team_id'] = $request->team;
        $lineup = $lineup->update($input);

        return $this->sendResponse($lineup, 'Lineup Submission updated successfully.');
    }


}
