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
        $perPage = $request->input('per_page', 100);
        $sortBy = $request->input('sort_by', 'asc');

        $search = $request->input('search');
        $name = $request->input('name');

        $teams = Team::where(function ($query) use ($search) {
            $query->where('team_name', 'LIKE', "%{$search}%");
        })->when($name, function ($query) use ($name) {
            $query->where('team_name', $name);
        })->latest()->paginate($perPage);

        foreach ($teams as $team) {
            $team->players;
            $team->stadium;
        }

        return response()->json($teams, 'Teams retrieved successfully.');
    }

    /**
     * Create new team.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'stadium' => 'required|integer', //exists,stadium,id
            'team_name' => 'required|unique:teams|between:3,50',
            'region' => 'required|between:3,50',
        ]);


        $input['user_id'] = $user->id;
        $input['stadium_id'] = $request->stadium;
        $team = Team::create($input);

        return response()->json($team, 'Team created successfully.');
    }

    /**
     * Display team details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);

        if (is_null($team)) {
            return $this->sendError('Team not found.');
        }

        return response()->json($team, 'Team retrieved successfully.');
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
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'stadium' => 'required|integer', //exists,stadium,id
            'team_name' => 'required|unique:teams|between:3,50',
            'region' => 'required|between:3,50',
        ]);



        $input['stadium_id'] = $request->stadium;
        $team = $team->update($input);

        return response()->json($team, 'Team updated successfully.');
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
