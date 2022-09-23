<?php

namespace App\Http\Controllers\API\Organizers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchRecord;
use App\Models\MatchOfficial;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class MatchRecordController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchRecord = MatchRecord::all();

        return $this->sendResponse($matchRecord, 'Match Record retrieved successfully.');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function officials(Request $request, $id)
    {
        $user = $request->user();
        $matchOfficial = MatchOfficial::findOrCreate(['match_id' => $id]);
        return $matchOfficial;
        $input = $request->all();
        return $matchRecord;
        // $validator = Validator::make($input, [
        //     'tournament' => 'required|integer|exists:tournaments,id',
        //     'date' => 'required|date|after:yesterday',
        //     'home_team' => 'required|integer|exists:teams,id',
        //     'away_team' => 'required|integer|exists:teams,id',
        //     'stadium' => 'required|integer|exists:stadia,id',//'
        //     'city' => 'required|between:3,60',
        //     'round' => 'required|integer|between:1,100',
        // ]);

        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }
        // $matchRecord = new MatchRecord();
        // $matchRecord->user_id = $user->id;
        // $matchRecord->tournament_id = $request->tournament;
        // $matchRecord->home_team_id = $request->home_team;
        // $matchRecord->away_team_id = $request->away_team;
        // $matchRecord->stadium_id = $request->stadium;
        // $matchRecord->city = $request->city;
        // $matchRecord->date = $request->date;
        // $matchRecord->round = $request->round;
        // $matchRecord->save();
        return $this->sendResponse($matchRecord, 'Match Officials updated successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $validator = Validator::make($input, [
            'tournament' => 'required|integer|exists:tournaments,id',
            'date' => 'required|date|after:yesterday',
            'home_team' => 'required|integer|exists:teams,id',
            'away_team' => 'required|integer|exists:teams,id',
            'stadium' => 'required|integer|exists:stadia,id',//'
            'city' => 'required|between:3,60',
            'round' => 'required|integer|between:1,100',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $matchRecord = new MatchRecord();
        $matchRecord->user_id = $user->id;
        $matchRecord->tournament_id = $request->tournament;
        $matchRecord->home_team_id = $request->home_team;
        $matchRecord->away_team_id = $request->away_team;
        $matchRecord->stadium_id = $request->stadium;
        $matchRecord->city = $request->city;
        $matchRecord->date = $request->date;
        $matchRecord->round = $request->round;
        $matchRecord->save();
        return $this->sendResponse($matchRecord, 'Match Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matchRecord = MatchRecord::find($id);

        if (is_null($matchRecord)) {
            return $this->sendError('Match Record not found.');
        }

        return $this->sendResponse($matchRecord, 'Match Record retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatchRecord $matchRecord)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            // 'period' => 'required|date',
            // 'home_team' => 'required|between:3,50',
            // 'away_team' => 'required|between:3,50',
            // 'city' => 'required|between:3,50',
            // 'stadium' => 'required|between:3,50',
            // 'round' => 'required|integer',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matchRecord->update($input);

        return $this->sendResponse($matchRecord, 'Match Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( MatchRecord $matchRecord)
    {
        $matchRecord->delete();

        return $this->sendResponse([], 'Match Record deleted successfully.');
    }
}
