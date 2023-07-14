<?php

namespace App\Http\Controllers\API\LeagueManagement;


use Illuminate\Http\Request;
use App\Models\Evaluation\RefereeEvaluation;
use App\Models\MatchCordinationDetail;
use App\Models\Notification;
use App\Http\Controllers\Controller;



class RefereeEvaluationController  extends Controller
{
    function __construct()
    {
        $this->middleware('permission:add-referee-evaluation', ['only' => ['refereeEvaluation']]);
    }

    public function refereeEvaluation(Request $request)
    {
        $user = $request->user();
        $input = $request->all();
        // info($input);

        $request->validate([
            'match' => 'required|exists:match_records,id',
            'area_of_improvements' => 'nullable|array',
            'area_of_improvements.*.area_of_improvements' => 'required|string',
            'area_of_improvements.*.minutes' => 'integer',
            'positive_points' => 'nullable|array',
            'positive_points.*.positive_points' => 'required|string',
            'positive_points.*.minutes' => 'integer',
        ]);



        $refereeEvaluation = RefereeEvaluation::firstOrCreate(['match_id' => $input['match']]);
        $refereeEvaluation->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Referee Assessor";
        $notification->category = "assessor";
        $notification->description = "Referee Assessor";
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => 'Record is created',
            'referee' => $refereeEvaluation
        ], 200);
    }
}
