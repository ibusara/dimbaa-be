<?php

namespace App\Http\Controllers\API\Officials;


use Illuminate\Http\Request;
use App\Models\Evaluation\RefereeEvaluation;
use App\Models\MatchCordinationDetail;
use App\Models\Notification;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;


class RefereeEvaluationController extends BaseController
{
    public function refereeEvaluation(Request $request){
        $user = $request->user();
        $input = $request->all();
        // info($input);

        $validator = Validator::make($input, [
            'match' => 'required|exists:match_records,id',
            'area_of_improvements' => 'nullable|array',
            'area_of_improvements.*.area_of_improvements' => 'required|string',
            'area_of_improvements.*.minutes' => 'integer',
            'positive_points' => 'nullable|array',
            'positive_points.*.positive_points' => 'required|string',
            'positive_points.*.minutes' => 'integer',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $refereeEvaluation = RefereeEvaluation::firstOrCreate(['match_id' => $input['match']]);
        $refereeEvaluation->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Referee Assessor";
        $notification->category = "assessor";
        $notification->description = "Referee Assessor";
        $notification->save();

        return $this->sendResponse($refereeEvaluation, 'Record is created');
    }
}
