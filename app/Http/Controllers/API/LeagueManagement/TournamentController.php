<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;



class TournamentController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::all();

        return response()->json([
            'success' => true,
            'message' => 'Tournament retrieved successfully.',
            'tournament' => $tournaments
        ], 200 );
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
            'name' => 'required',
            'year' => 'required|integer|between:2000,3000'
        ]);


        $input['user_id'] = $user->id;
        $input['start_at'] =  date('Y-m-d', strtotime($request->start_at ?? '01-' . date('m') . '-' . $request->year));
        $tournament = Tournament::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Tournament created successfully.',
            'tournament' => $tournament
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Tournament $tournaments
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournaments)
    {
        $tournament = $tournaments;

        if (!$tournament->id) {
            return response()->json([
                'success'=>false,
                'message'=>'Tournament not found'
            ],404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Tournament retrieved successfully.',
            'tournament' => $tournament
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Tournament $tournaments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournaments)
    {
        $tournament = $tournaments;
        if (!$tournament->id) {
            return response()->json([
                'success'=>false,
                'message'=>'Tournament not found'
            ],404);
        }
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'year' => 'required|integer|between:2000,3000'
        ]);



        $input['start_at'] =  date('Y-m-d', strtotime($request->start_at ?? '01-' . date('m') . '-' . $request->year));
        $tournament->update($input);


        return response()->json([
            'success' => true,
            'message' => 'Tournament updated successfully.',
            'tournament' => $tournament
        ], 200
           );
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @param Tournament $tournaments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournaments)
    {
        $tournament = $tournaments;
        if (!$tournament->id) {
            return response()->json([
                'success'=>false,
                'message'=>'Tournament not found'
            ],404);
        }
        $tournament->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Tournament Deleted Successfully'
        ],200);
    }
}
