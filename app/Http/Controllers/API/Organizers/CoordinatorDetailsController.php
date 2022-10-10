<?php

namespace App\Http\Controllers\API\Organizers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchCordination;
use App\Models\MatchCordinationDetail;
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
            'meeting_date' => 'date'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $cordinatorOfficial = MatchCordination::firstOrCreate(['match_id' => $input['match']]);
        $cordinatorOfficial->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Cordination Information";
        $notification->category = "officials";
        $notification->description = "Match Cordination updated succesfully";
        $notification->save();

        return $this->sendResponse($cordinatorOfficial, 'Record is created');
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

        return $this->sendResponse($cordinatorOfficial, 'Record is created');
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

        return $this->sendResponse($cordinatorOfficial, 'Record is created');
    }


    public function incident(Request $request){
        $user = $request->user();
        $input = $request->only(
            'match',
            'incident_during_team_check',
            'incident_reason',
        );

        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matchCordinator = MatchCordinationDetail::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match ";
        $notification->category = "officials";
        $notification->description = "Cordination Incident Recorded";
        $notification->save();

        return $this->sendResponse($cordinatorOfficial, 'Record is created');
    }


    public function pitchCondition(Request $request){
        $user = $request->user();
        $input = $request->only(
            'match',
            'pitch_condition',
        );

        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matchCordinator = MatchCordinationDetail::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);


        return $this->sendResponse($cordinatorOfficial, 'Record is created');
    }

    public function dressingRoom(Request $request){
        $user = $request->user();
        $input = $request->only(
            'match',
            'dressing_room_condition',
        );

        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matchCordinator = MatchCordinationDetail::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);


        return $this->sendResponse($cordinatorOfficial, 'Record is created');
    }



    public function stretcherAmbulance(Request $request){
        $user = $request->user();
        $input = $request->only(
            'match',
            'stretcher_available',
            'ambulance_available',
            'no_of_stretcher',
            'no_of_ambulance',
        );

        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matchCordinator = MatchCordinationDetail::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);


        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Cordination Information";
        $notification->category = "officials";
        $notification->description = "Strecher and Ambulance Information set";
        $notification->save();

        return $this->sendResponse($cordinatorOfficial, 'Record is created');
    }

}
