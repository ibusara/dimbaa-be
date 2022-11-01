<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Validator;

/**
 * @group Team Management
 *
 *
 * API endpoints for managing teams
 */
class TeamController  extends Controller
{
    /**
     * List Teams.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = Team::get();

        return response()->json([
            'success' => true,
            'message' => 'Teams retrieved successfully!',
            'teams' => $teams
        ], 200);
    }

    /**
     * Create new team.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'stadium_id' => 'required|integer|exists,stadium,id',
            'name' => 'required|unique:teams,name',
            'region' => 'required',
        ]);

        $team = Team::create([
            'stadium_id' => $request->stadium_id,
            'name' => $request->name,
            'region' => $request->region
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Teams created successfully!',
            'team' => $team
        ], 200);
    }

    /**
     * Display team details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return response()->json([
            'success' => true,
            'message' => 'Teams retrieved successfully!',
            'team' => $team
        ], 200);
    }

    /**
     * Update team.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'stadium_id' => 'required|integer|exists,stadium,id',
            'name' => 'required|unique:teams,name,except,' . $team->id,
            'region' => 'required',
        ]);

        $team->update([
            'stadium_id' => $request->stadium_id,
            'name' => $request->name,
            'region' => $request->region
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Teams updated successfully!',
            'team' => $team
        ], 200);
    }

    /**
     * Delete team.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return response()->json([], 'Team deleted successfully.');
    }
}