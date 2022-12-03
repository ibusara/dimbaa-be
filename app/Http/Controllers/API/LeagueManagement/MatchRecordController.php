<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchRecord;
use App\Models\MatchOfficial;
use App\Models\MatchScoreBoard;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;


class MatchRecordController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by','asc');
        $sortByField = $request->input('field','id');
        $matchRecord = MatchRecord::orderBy($sortByField,$sortBy)->when(filled($request->roles),function ($query)use($request){
            $roles_ = is_array($request->roles) ?$request->roles:(array)$request->roles;
            $query->whereHas('user',function ($query_)use ($roles_){
                $query_->whereIn('role_id',$roles_);
            });
        })->get();

        return response()->json([
            'success' => true,
            'message' => 'Match Record retrieved successfully.',
            'match' => $matchRecord
        ], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listScoreboard()
    {
        $scoreboard = MatchScoreBoard::get();

        return response()->json([
            'success' => true,
            'message' => 'Scoreboard retrieved successfully.',
            'scoreboard' => $scoreboard
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function officials(Request $request)
    {
        $request->validate([
            'match_id'=>'required|integer|exists:match_records,id'
        ]);
        $id = $request->match_id;
        $user = $request->user();
        $matchOfficial = MatchOfficial::firstOrCreate(['match_id' => $id]);
        $input = $request->except(['id']);


        // $request->validate( [
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

        $matchOfficial->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Match Officials updated successfully.',
            'match_official' => $matchOfficial
        ], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function scoreboard(Request $request, $id)
    {
        $user = $request->user();
        $matchOfficial = MatchScoreBoard::firstOrCreate(['match_id' => $id]);
        $input = $request->all();


        // $request->validate( [
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

        $matchOfficial->update($input);

        $notification =  new Notification();
        $notification->role_id = $user->id;
        $notification->action = '/';
        $notification->title = "Scoreboard";
        $notification->category = "match";
        $notification->description = "Scoreboard has been updated";
        $notification->save();
        return response()->json([
            'success' => true,
            'message' => 'Match Scoreboard updated successfully.',
            'match_official' => $matchOfficial
        ], 200);
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

        $request->validate([
            'tournament' => 'required|integer|exists:tournaments,id',
            'date' => 'required|date|after:yesterday',
            'home_team' => 'required|integer|exists:teams,id',
            'away_team' => 'required|integer|exists:teams,id',
            'stadium' => 'required|integer|exists:stadia,id', //'
            'city' => 'required|between:3,60',
            'round' => 'required|integer|between:1,100',
        ]);


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
        return response()->json(
            [
                'success' => true,
                'message' => 'Match Record created successfully.',
                'match' => $matchRecord
            ], 200);
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

        return response()->json([
            'success' => true,
            'message' => 'Match Record retrieved successfully.',
            'match' => $matchRecord
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param MatchRecord $matchRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatchRecord $matchRecord)
    {
        $input = $request->all();

        $request->validate([
            // 'period' => 'required|date',
            // 'home_team' => 'required|between:3,50',
            // 'away_team' => 'required|between:3,50',
            // 'city' => 'required|between:3,50',
            // 'stadium' => 'required|between:3,50',
            // 'round' => 'required|integer',
        ]);



        $matchRecord->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Match Record updated successfully.',
            'match' =>  $matchRecord
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchRecord $matchRecord)
    {
        $matchRecord->delete();

        return response()->json([
            'success' => true,
            'message' => 'Match Record deleted successfully!'
        ], 200);
    }
}
