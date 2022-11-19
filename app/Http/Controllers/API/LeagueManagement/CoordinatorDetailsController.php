<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchCordination;
use App\Models\MatchCordinationDetail;
use App\Models\Notification;


class CoordinatorDetailsController  extends Controller
{
    public function coordinationMeeting(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'match_coordination_meeting',
            'meeting_date',
            'if_no_meeting',
            'comment'
        );

        $request->validate([
            'match' => 'required|exists:match_records,id',
            'meeting_date' => 'date'
        ]);



        $cordinatorOfficial = MatchCordination::firstOrCreate(['match_id' => $input['match']]);
        $cordinatorOfficial->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Cordination Information";
        $notification->category = "officials";
        $notification->description = "Match Cordination updated succesfully";
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => 'Record is created',
            'coordinator' => $cordinatorOfficial
        ], 200);
    }

    public function playFair(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'tff_flag_raised',
            'tff_on_the_pole',
            'play_fair_flag_raised',
            'security_officer',
            'pff_on_the_pole'
        );

        $request->validate([
            'match' => 'required|exists:match_records,id',
        ]);



        $matchCordinator = MatchCordination::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Cordination Information";
        $notification->category = "officials";
        $notification->description = "Match Cordination updated succesfully";
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => 'Record is created',
            'coordinator' => $matchCordinator
        ], 200);
    }


    public function performanceBehaviour(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'position_benches_respected_both_teams',
            'not_respected_reason',
            'performance_flag_bearers',
            'performance_ball_boys',
            'performance_team_escorts',
            'teams_behaviour'
        );

        $request->validate([
            'match' => 'required|exists:match_records,id',
        ]);



        $matchCordinator = MatchCordination::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Cordination Information";
        $notification->category = "officials";
        $notification->description = "Match Cordination updated succesfully";
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => 'Record is created',
            'coordinator' => $matchCordinator
        ], 200);
    }


    public function incident(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'incident_during_team_check',
            'incident_reason',
        );

        $request->validate([
            'match' => 'required|exists:match_records,id',
        ]);



        $matchCordinator = MatchCordinationDetail::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match ";
        $notification->category = "officials";
        $notification->description = "Cordination Incident Recorded";
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => 'Record is created',
            'coordinator' => $matchCordinator
        ], 200);
    }


    public function pitchCondition(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'pitch_condition',
        );

        $request->validate([
            'match' => 'required|exists:match_records,id',
        ]);



        $matchCordinator = MatchCordinationDetail::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);


        return response()->json([
            'success' => true,
            'message' => 'Record is created',
            'coordinator' => $matchCordinator
        ], 200);
    }

    public function dressingRoom(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'dressing_room_condition',
        );

        $request->validate([
            'match' => 'required|exists:match_records,id',
        ]);



        $matchCordinator = MatchCordinationDetail::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);


        return response()->json([
            'success' => true,
            'message' => 'Record is created',
            'coordinator' => $matchCordinator
        ], 200);
    }



    public function stretcherAmbulance(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'stretcher_available',
            'ambulance_available',
            'no_of_stretcher',
            'no_of_ambulance',
        );

        $request->validate([
            'match' => 'required|exists:match_records,id',
        ]);



        $matchCordinator = MatchCordinationDetail::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);


        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Cordination Information";
        $notification->category = "officials";
        $notification->description = "Strecher and Ambulance Information set";
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => 'Record is created',
            'coordinator' => $matchCordinator
        ], 200);
    }
}
