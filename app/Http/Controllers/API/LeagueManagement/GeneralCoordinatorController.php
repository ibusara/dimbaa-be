<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\PreMatchResource;
use Illuminate\Http\Request;
use App\Models\CordinatorMatchResult;
use App\Models\CordinatorMatchOfficial;
use App\Models\Notification;

use App\Models\MatchCordinationDetail;
use App\Models\MatchOfficial;
use App\Models\MatchOfficialAssistant;
use App\Models\MatchRecord;
use App\Models\PreMatchReport;
use App\Models\Regions;

class GeneralCoordinatorController  extends Controller
{
    public function matchResult(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'match' => 'required|exists:match_records,id',
            'extra_time_score' => 'nullable|array',
            'penalty' => 'nullable|array',
            'final_score' => 'nullable|array',
        ]);



        $matchResult = CordinatorMatchResult::firstOrCreate(['match_id' => $input['match']]);
        if ($request->has('extra_time_score')) {
            $request->validate([
                'extra_time_score.team1' => 'required|integer',
                'extra_time_score.team2' => 'required|integer',
                'extra_time_score.favour_of' => 'required|in:team1,team2',
            ]);



            $matchResult->extra_time_score = json_encode($input['extra_time_score']);
            $matchResult->update();
        }

        if ($request->has('penalty')) {
            $request->validate([
                'penalty.team1' => 'required|integer',
                'penalty.team2' => 'required|integer',
                'penalty.favour_of' => 'required|in:team1,team2',
            ]);



            $matchResult->penalty = json_encode($input['penalty']);
            $matchResult->update();
        }

        if ($request->has('final_score')) {
            $request->validate([
                'final_score.team1' => 'required|integer',
                'final_score.team2' => 'required|integer',
                'final_score.favour_of' => 'required|in:team1,team2',
            ]);



            $matchResult->final_score = json_encode($input['final_score']);
            $matchResult->update();
        }

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match result";
        $notification->category = "coordinator";
        $notification->description = "General Coordinartor Match Result updated";
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => 'General Coordinator Match Result updated',
            'coordinator' => $matchResult
        ], 200);
    }

    public function matchOfficials(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'match' => 'required|exists:match_records,id',
            'referee' => 'required|array',
            'referee.user' => 'required|integer',
            'referee.region' => 'string|max:512',
            'assistant_referee_one' => 'required|array',
            'assistant_referee_one.user' => 'required|integer',
            'assistant_referee_one.region' => 'string|max:512',
            'assistant_referee_two' => 'required|array',
            'assistant_referee_two.user' => 'required|integer',
            'assistant_referee_two.region' => 'string|max:512',
            'fourth_official' => 'required|array',
            'fourth_official.user' => 'required|integer',
            'fourth_official.region' => 'string|max:512',

            'commissionar' => 'required|array',
            'commissionar.user' => 'required|integer',
            'commissionar.region' => 'string|max:512',
            'match_doctor' => 'required|array',
            'match_doctor.user' => 'required|integer',
            'match_doctor.region' => 'string|max:512',
            'officer_for_marketing' => 'required|array',
            'officer_for_marketing.user' => 'required|integer',
            'officer_for_marketing.region' => 'string|max:512',
            'media_officer' => 'required|array',
            'media_officer.user' => 'required|integer',
            'media_officer.region' => 'string|max:512',
            'security_officer.user' => 'required|integer',
            'security_officer' => 'required|array',
            'security_officer.region' => 'string|max:512',
        ]);



        $cordinatorOfficial = CordinatorMatchOfficial::firstOrCreate(['match_id' => $input['match']]);
        $cordinatorOfficial->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Match Official Assistance";
        $notification->category = "officials";
        $notification->description = "Match Official Condition set";
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => 'Match Official Conditions updated successfully',
            'coordinator' => $cordinatorOfficial
        ], 200);
    }

    public function information(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'information',
            'announcer',
            'giant_screen',
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
        $notification->description = "Giant screen Information set";
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
            'incident'
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

    public function remarks(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'remarks'
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


    public function name(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'name'
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


    public function date(Request $request)
    {
        $user = $request->user();
        $input = $request->only(
            'match',
            'date'
        );

        $request->validate([
            'date' => 'required|date',
        ]);



        $matchCordinator = MatchCordinationDetail::firstOrCreate(['match_id' => $input['match']]);
        $matchCordinator->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Record is created',
            'coordinator' => $matchCordinator
        ], 200);
    }

    public function GetMatchOfficials(Request $request,$match_id)
    {
        $match = MatchOfficial::where('match_id',$match_id)->get();
        if($match == ''){
            abort(404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Match Officials Result updated',
            'Content' => $match
        ], 200);
    }

    public function getRegion(Request $request)
    {
        $match = Regions::get();
        return response()->json([
            'success' => true,
            'message' => 'Regions updated',
            'Content' => $match
        ], 200);
    }

    public function details(Request $request,$MatchID)
    {
        $match = MatchRecord::where('match_records.id',$MatchID)->first();
        return new PreMatchResource($match);
    }
}
