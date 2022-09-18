<?php

namespace App\Http\Controllers\API\SuperAdmin;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Stadium;
use Validator;

class StadiumController extends BaseController
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
        $team = $request->input('team');
        $name = $request->input('name');

        $stadia = Stadium::where( function($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })->when($name,function($query) use ($name) {
            $query->where('name', $name);
        })->when($team,function($query) use ($team) {
            $query->where('team_id', $team);
        })->latest()->paginate($perPage);

        return $this->sendResponse($stadia, 'Stadia retrieved successfully.');
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
            'team' => 'required|integer',//exists,team,id
            'name' => 'required|between:3,50',
            'region' => 'required|between:3,50',
        ]);
        info($input);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input['user_id'] = $user->id;
        $input['team_id'] = $request->team;
        $stadium = Stadium::create($input);

        return $this->sendResponse($stadium, 'Stadium created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stadium = Stadium::find($id);

        if (is_null($stadium)) {
            return $this->sendError('Stadium not found.');
        }

        return $this->sendResponse($stadium, 'Stadium retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stadium $stadium)
    {
        $user = $request->user();
        $input = $request->all();

        $validator = Validator::make($input, [
            'team' => 'required|integer',//exists,team,id
            'name' => 'required|between:3,50',
            'region' => 'required|between:3,50',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input['team_id'] = $request->team;
        $stadium = $stadium->update($input);

        return $this->sendResponse($stadium, 'Stadium created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Stadium $stadium)
    {
        $stadium->delete();

        return $this->sendResponse([], 'Stadium deleted successfully.');
    }
}
