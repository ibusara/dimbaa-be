<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchTeamResult;
use App\Models\MatchOfficialAssistant;
use App\Models\Notification;


class MatchOfficialController  extends Controller
{
    public function matchResult(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'match' => 'required|numeric|exists:match_records,id',
            'halftime_score' => 'nullable|array',
            'final_score' => 'nullable|array',
        ]);



        $matchResult = MatchTeamResult::firstOrCreate(['match_id' => $input['match']]);
        if ($request->has('halftime_score')) {
            $request->validate([
                'halftime_score.team1' => 'required|integer',
                'halftime_score.team2' => 'required|integer',
            ]);



            $matchResult->halftime_score = json_encode($input['halftime_score']);
            $matchResult->update();
        }
        if ($request->has('final_score')) {
            $request->validate([
                'final_score.team1' => 'required|integer',
                'final_score.team2' => 'required|integer',
            ]);



            $matchResult->final_score = json_encode($input['final_score']);
            $matchResult->update();
        }

        return response()->json([
            'success' => true,
            'message' => 'Match Result updated successfully.',
            'result' => $matchResult
        ], 200);
    }


    public function matchOfficialAssistance(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        // info($input);
        $request->validate([
            'match' => 'required|numeric|exists:match_records,id',
            'center_supervisor' => 'array|min:3',
            'commisioner' => 'array|min:3',
            'district' => 'array|min:3',
            'email' => 'array|min:3',
            'entrance' => 'array|min:3',
            'full_name' => 'array|min:3',
            'game_no_other' => 'array|min:3',
            'game_no_tpl' => 'array|min:3',

            'match_payment' => 'array|min:3',
            'referee_assessor' => 'array|min:3',
            'referee_reg_no' => 'array|min:3',
            'region' => 'array|min:3',
            'tel_number' => 'array'
        ]);



        $equipmentCondition = MatchOfficialAssistant::firstOrCreate(['match_id' => $input['match']]);
        $equipmentCondition->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Official Assistance";
        $notification->category = "officials";
        $notification->description = "Match Players Condition set";
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => 'Match Equipment Conditions updated successfully',
            'equipment' => $equipmentCondition
        ], 200);
    }
}
