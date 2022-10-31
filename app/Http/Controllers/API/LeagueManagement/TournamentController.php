<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;


class TournamentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::all();

        return $this->sendResponse($tournaments, 'Tournament retrieved successfully.');
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

        return $this->sendResponse($tournament, 'Tournament created successfully.');
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

        return $this->sendResponse($tournament, 'Tournament retrieved successfully.');
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

        return $this->sendResponse($tournament, 'Tournament updated successfully.');
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

        // return $this->sendResponse([], 'Tournament deleted successfully.');
    }
}