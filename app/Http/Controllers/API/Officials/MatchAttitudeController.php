<?php

namespace App\Http\Controllers\API\Officials;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchPlayerCondition;
use App\Models\MatchEquipmentCondition;
use App\Models\Notification;
use Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\API\BaseController as BaseController;



class MatchAttitudeController extends BaseController
{
    public function matchAttitudeCondition(Request $request){
        $user = $request->user();
        $input = $request->all();


        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
            'team1_players' => 'required|array|between:2,30',
            'team1_players.*' => 'integer|distinct|exists:players,id',
            'home_team_players' => 'array|between:2,30',
            'home_team_players.*' => 'integer|distinct|exists:players,id',
            'team2_players' => 'array|between:2,30',
            'team2_players.*' => 'integer|distinct|exists:players,id',
            'away_team_players' => 'array|between:2,30',
            'away_team_players.*' => 'integer|distinct|exists:players,id',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matchCondition = MatchPlayerCondition::firstOrCreate(['match_id' => $input['match']]);
        $matchCondition->team1_players = json_encode($input['team1_players']);
        $matchCondition->home_team_players = json_encode($input['home_team_players']);
        $matchCondition->team2_players = json_encode($input['team2_players']);
        $matchCondition->away_team_players = json_encode($input['away_team_players']);
        $matchCondition->update();

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Condition";
        $notification->category = "officials";
        $notification->description = "Match Players Condition set";
        $notification->save();

        return $this->sendResponse($matchCondition, 'Match Players Conditions successfully set');
    }


    public function matchEquipmentCondition(Request $request){
        $user = $request->user();
        $input = $request->all();

        // info($input);
        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
            'ambulance.condition' => 'required|string|max:512',
            'ambulance.rewards' => 'required|string|max:512',
            'ball_boys.condition' => 'required|string|max:512',//.Rule::exists('ball_boys'),
            'ball_boys.rewards' => 'required|string|max:512',//.Rule::exists('ball_boys'),
            'corner_flags.condition' => 'required|string|max:512',
            'corner_flags.rewards' => 'required|string|max:512',


            'entrance.condition' => 'string|max:512',
            'entrance.rewards' => 'string|max:512',
            'dressing_room.condition' => 'string|max:512',
            'dressing_room.rewards' => 'string|max:512',
            'police.condition' => 'string|max:512',
            'police.rewards' => 'string|max:512',

        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $equipmentCondition = MatchEquipmentCondition::firstOrCreate(['match_id' => $input['match']]);
        $equipmentCondition->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Equipment Condition";
        $notification->category = "officials";
        $notification->description = "Match Players Condition set";
        $notification->save();

        return $this->sendResponse($equipmentCondition, 'Match Equipment Conditions updated successfully');
    }
}
