<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
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
    public function index()
    {
        $teams = Team::orderBy('name')->get();

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
            'stadium_id' => 'required|integer|exists:stadia,id',
            'name' => 'required|unique:teams,name',
            'region' => 'required',
            'team_logo' => 'nullable|image|mimes:jpg,png,jpeg,bmp',
            'team_photo' => 'nullable|image|mimes:jpg,png,jpeg,bmp',
        ], [
            'stadium_id.exists' => 'Selected stadium does not exist!'
        ]);
        $team_logo = $this->upload_team_images($request,'team_logo');
        $team_photo = $this->upload_team_images($request,'team_photo');

        $team = Team::create([
            'stadium_id' => $request->stadium_id,
            'name' => $request->name,
            'region' => $request->region,
            'team_photo' => $team_photo,
            'team_logo' => $team_logo
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Team created successfully!',
            'team' => $team
        ], 200);
    }

    /**
     * Display team details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $teams)
    {
        return response()->json([
            'success' => true,
            'message' => 'Team retrieved successfully!',
            'team' => $teams
        ], 200);
    }
    public function upload_team_images($request,$field_name){
        $path = null;
        if ($request->hasFile($field_name)){
            $file = $request->file($field_name);
            $extension = $file->getClientOriginalExtension();
            $file_name = $field_name.time().'.'.$extension;
            Storage::putFileAs('uploads', $request->$field_name, $file_name, 'public');
            $path ="/uploads/$file_name";
        }
        return $path;
    }

    /**
     * Update team.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $teams)
    {
        $team = $teams;
        $request->validate([
            'stadium_id' => 'required|integer|exists:stadia,id',
            'name' => 'required|unique:teams,name,' . $team->id,
            'region' => 'required',
            'team_logo' => 'nullable|image|mimes:jpg,png,jpeg,bmp',
            'team_photo' => 'nullable|image|mimes:jpg,png,jpeg,bmp',
        ], [
            'stadium_id.exists' => 'Selected stadium does not exist!'
        ]);
        $updateData = [
            'stadium_id' => $request->stadium_id,
            'name' => $request->name,
            'region' => $request->region
        ];
        $team_logo = $this->upload_team_images($request,'team_logo');
        $team_photo = $this->upload_team_images($request,'team_photo');
        if ($team_logo){
            $updateData['team_logo'] = $team_logo;
        }
        if ($team_photo){
            $updateData['team_photo'] = $team_photo;
        }
        $team->update($updateData);

        return response()->json([
            'success' => true,
            'message' => 'Team updated successfully!',
            'team' => $team
        ], 200);
    }

    /**
     * Delete team.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $teams)
    {
        $teams->delete();

        return response()->json([], 'Team deleted successfully.');
    }
}
