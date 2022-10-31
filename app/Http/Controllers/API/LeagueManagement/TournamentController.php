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

        return response()->json($tournaments, 'Tournament retrieved successfully.');
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

        return response()->json($tournament, 'Tournament created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tournament = Tournament::find($id);

        if (is_null($tournament)) {
            return $this->sendError('Tournament not found.');
        }

        return response()->json($tournament, 'Tournament retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'year' => 'required|integer|between:2000,3000'
        ]);



        $input['start_at'] =  date('Y-m-d', strtotime($request->start_at ?? '01-' . date('m') . '-' . $request->year));
        $tournament->update($input);

        return response()->json($tournament, 'Tournament updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        return null;
        // $tournament->delete();

        // return response()->json([], 'Tournament deleted successfully.');
    }
}
