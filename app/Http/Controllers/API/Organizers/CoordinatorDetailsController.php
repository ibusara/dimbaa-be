<?php

namespace App\Http\Controllers\API\Organizers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CordinatorMatchResult;
use App\Models\CordinatorMatchOfficial;
use App\Models\Notification;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;


class CoordinatorDetailsController extends BaseController
{
    public function coordinationMeeting(Request $request){
        $user = $request->user();
        $input = $request->only( 
            'match',
            'match_coordination_meeting', 'meeting_date',
            'if_no_meeting', 'comment'
        );

        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matchCordinator = MatchCordination::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Cordination Information";
        $notification->category = "officials";
        $notification->description = "Match Cordination updated succesfully";
        $notification->save();

        return $this->sendResponse($cordinatorOfficial, 'Match Official Conditions updated successfully'); 
    }

    public function playFair(Request $request){
        $user = $request->user();
        $input = $request->only( 
            'match',
            'tff_flag_raised',  'tff_on_the_pole',
            'play_fair_flag_raised',  'security_officer', 'pff_on_the_pole'
        );

        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matchCordinator = MatchCordination::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Cordination Information";
        $notification->category = "officials";
        $notification->description = "Match Cordination updated succesfully";
        $notification->save();

        return $this->sendResponse($cordinatorOfficial, 'Match Official Conditions updated successfully'); 
    }

    public function performanceBehaviour(Request $request){
        $user = $request->user();
        $input = $request->only( 
            'match',
            'position_benches_respected_both_teams','not_respected_reason',
            'performance_flag_bearers','performance_ball_boys',
            'performance_team_escorts','teams_behaviour'
        );

        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matchCordinator = MatchCordination::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Cordination Information";
        $notification->category = "officials";
        $notification->description = "Match Cordination updated succesfully";
        $notification->save();

        return $this->sendResponse($cordinatorOfficial, 'Match Official Conditions updated successfully'); 
    }
}
