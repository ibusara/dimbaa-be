<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchRecord;
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
        $match_record = MatchRecord::all();

        return $this->sendResponse($match_record, 'Match Record retrieved successfully.');
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
            'tournament' => 'required|integer',//exists,tournament,id
            'period' => 'required|date',
            'home_team' => 'required|between:3,50',
            'away_team' => 'required|between:3,50',
            'city' => 'required|between:3,50',
            'stadium' => 'required|between:3,50',
            'round' => 'required|integer',
        ]); 

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        } 
        $input['user_id'] = $user->id; 
        $input['tournament_id'] = $request->tournament;
        $match_record = MatchRecord::create($input);

        return $this->sendResponse($match_record, 'Match Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $match_record = MatchRecord::find($id);

        if (is_null($match_record)) {
            return $this->sendError('Match Record not found.');
        }

        return $this->sendResponse($match_record, 'Match Record retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatchRecord $match_record)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'period' => 'required|date',
            // 'home_team' => 'required|between:3,50',
            // 'away_team' => 'required|between:3,50',
            // 'city' => 'required|between:3,50',
            // 'stadium' => 'required|between:3,50',
            // 'round' => 'required|integer',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $match_record->update($input);

        return $this->sendResponse($match_record, 'Match Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( MatchRecord $match_record)
    {
        $match_record->delete();

        return $this->sendResponse([], 'Match Record deleted successfully.');
    }
}
