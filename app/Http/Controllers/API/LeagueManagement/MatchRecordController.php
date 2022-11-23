<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MatchRecord;
use App\Models\MatchOfficial;
use App\Models\MatchScoreBoard;
use App\Models\Notification;
use Illuminate\Support\Facades\Schema;
use function Termwind\ValueObjects\format;


class MatchRecordController  extends Controller
{
    public function index(Request $request)
    {
        $field = $request->filled('field')?$request->field:"id";
        $columns = Schema::getColumnListing('match_records');
        if (!in_array($field,$columns)){
            return response()->json(['success'=>false,'message'=>'Field provided is not in the table field list'],500);
        }
        $order  = $request->filled('sort_by')?$request->sort_by:'desc';
        $matchRecord = MatchRecord::orderBy($field,$order)->get();

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
        $id = $request->id;
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
            'date' => 'required|before:yesterday',
            'home_team' => 'required|integer|exists:teams,id',
            'away_team' => 'required|integer|exists:teams,id',
            'stadium' => 'required|integer|exists:stadia,id', //'
            'city' => 'required|between:3,60',
            'round' => 'required|integer|between:1,100',
        ]);
        $request->date = (new Carbon(date('d-m-Y H:i:s',strtotime(str_replace('/','-',$request->date)))))->format('Y-m-d H:i:s');

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
    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required|exists:match_records,id',
            'tournament' => 'required|integer|exists:tournaments,id',
            'date' => 'required|before:yesterday',
            'home_team' => 'required|integer|exists:teams,id',
            'away_team' => 'required|integer|exists:teams,id',
            'stadium' => 'required|integer|exists:stadia,id', //'
            'city' => 'required|between:3,60',
            'round' => 'required|integer|between:1,100',
        ]);
        $matchRecord = MatchRecord::find($request->id);
        if (!$matchRecord){
            return response()->json(['success'=>false,'message'=>'Match record not found'],404);
        }
        $input = $request->only('id','tournament','date','home_team','away_team','stadium','city','round');
        $input_array = array(
           'tournament_id'=>$input['tournament'],
           'date'=>$input['date'],
           'home_team_id'=>$input['home_team'],
           'away_team_id'=>$input['away_team'],
           'stadium_id'=>$input['stadium'],
           'city'=>$input['city'],
           'round'=>$input['round'],
        );
        $input_array['date'] = (new Carbon(date('d-m-Y H:i:s',strtotime(str_replace('/','-',$input['date'])))))->format('Y-m-d H:i:s');
        $matchRecord->update($input_array);

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
