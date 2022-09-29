<?php

namespace App\Http\Controllers\API\Officials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchTeamResult;
use App\Models\Notification;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class MatchOfficialController extends BaseController
{
    public function matchResult(Request $request){
        $user = $request->user();
        $input = $request->all();

        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
            'halftime_score' => 'nullable|array',
            'final_score' => 'nullable|array',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matchResult = MatchTeamResult::firstOrCreate(['match_id' => $input['match']]);
        if($request->has('halftime_score')){
            $validator = Validator::make($input, [
                'halftime_score.team1' =>'required|integer',
                'halftime_score.team2' =>'required|integer',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $matchResult->halftime_score = json_encode($input['halftime_score']);
            $matchResult->update();
        }
        if($request->has('final_score')){
            $validator = Validator::make($input, [
                'final_score.team1' =>'required|integer',
                'final_score.team2' =>'required|integer',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $matchResult->final_score = json_encode($input['final_score']);
            $matchResult->update();
        }

        return $this->sendResponse($matchResult, 'Match Result updated successfully.');
    }
}
