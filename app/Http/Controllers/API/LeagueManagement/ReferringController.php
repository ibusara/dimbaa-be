<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ReferringTeam;
use App\Models\MatchCordinationDetail;
use App\Models\Notification;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class ReferringController extends BaseController
{
    public function referringTeam(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'match' => 'required|exists:match_records,id',
            'refree' => 'nullable|array',
            'refree.user' => 'required|integer',
            'refree.region' => 'string|max:512',
            'ass_referee_1' => 'nullable|array',
            'ass_referee_1.user' => 'required|integer',
            'ass_referee_1.region' => 'string|max:512',
            'ass_referee_2' => 'nullable|array',
            'ass_referee_2.user' => 'required|integer',
            'ass_referee_2.region' => 'string|max:512',
            'fourth_official' => 'nullable|array',
            'fourth_official.user' => 'required|integer',
            'fourth_official.region' => 'string|max:512',

            'add_referee_one' => 'nullable|array',
            'add_referee_one.user' => 'required|integer',
            'add_referee_one.region' => 'string|max:512',
            'add_referee_two' => 'nullable|array',
            'add_referee_two.user' => 'required|integer',
            'add_referee_two.region' => 'string|max:512',

            'additional_assistant_referee_1' => 'nullable|array',
            'additional_assistant_referee_1.user' => 'required|integer',
            'additional_assistant_referee_1.region' => 'string|max:512',
            'additional_assistant_referee_2' => 'nullable|array',
            'additional_assistant_referee_2.user' => 'required|integer',
            'additional_assistant_referee_2.region' => 'string|max:512'
        ]);



        $referringTeam = ReferringTeam::firstOrCreate(['match_id' => $input['match']]);
        $referringTeam->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Referee Assessor";
        $notification->category = "assessor";
        $notification->description = "Referee Assessor";
        $notification->save();

        return $this->sendResponse($referringTeam, 'Record is created');
    }
}
