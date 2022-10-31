<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Team;
use Validator;

class TeamController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 100);
        $sortBy = $request->input('sort_by', 'asc');

        $search = $request->input('search');
        $name = $request->input('name');

        $teams = Team::where( function($query) use ($search) {
            $query->where('team_name', 'LIKE', "%{$search}%");
        })->when($name,function($query) use ($name) {
            $query->where('team_name', $name);
        }) ->latest()->paginate($perPage);

        foreach ($teams as $team) {
            $team->players;
            $team->stadium;
        }

        return $this->sendResponse($teams, 'Teams retrieved successfully.');
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
            'stadium' => 'required|integer',//exists,stadium,id
            'team_name' => 'required|unique:teams|between:3,50',
            'region' => 'required|between:3,50',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input['user_id'] = $user->id;
        $input['stadium_id'] = $request->stadium;
        $team = Team::create($input);

        return $this->sendResponse($team, 'Team created successfully.');
    }

    /**
     * Display the specified resource.
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

        return $this->sendResponse($team, 'Team retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $user = $request->user();
        $input = $request->all();

        $validator = Validator::make($input, [
            'stadium' => 'required|integer',//exists,stadium,id
            'team_name' => 'required|unique:teams|between:3,50',
            'region' => 'required|between:3,50',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input['stadium_id'] = $request->stadium;
        $team = $team->update($input);

        return $this->sendResponse($team, 'Team updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return $this->sendResponse([], 'Team deleted successfully.');
    }
}