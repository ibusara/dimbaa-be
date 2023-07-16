<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use App\Libraries\ImageProcessor;
use Illuminate\Http\Request;
use App\Models\Player;

/**
 * @group Player Management
 *
 *
 * API endpoints for managing players
 */
class PlayerController  extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view-players', ['only' => ['index','show']]);
        $this->middleware('permission:add-players', ['only' => ['store']]);
        $this->middleware('permission:edit-players', ['only' => ['update']]);
        $this->middleware('permission:delete-players', ['only' => ['destory']]);
    }
    
    /**
     * List players.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $players = Player::all();

        return response()->json([
            'success' => true,
            'message' => 'Players retrieved successfully!',
            'players' => $players
        ], 200);
    }

    /**
     * Create new Player.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_id' => 'required|integer|exists:teams,id',
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'local_id' => 'required|integer',
            'fifa_id' => 'required|integer',
            'playing_position' => 'required|integer',
            'weight' => 'required',
            'height' => 'required',
            'nationality' => 'required',
            'dob' => 'required|date',
            'professional_date' => 'required|date',
            'jersey_number' => 'required|integer',
            'rank' => 'nullable',
            'player_image' => 'nullable|image',
        ]);
        $player_image = null;
        if ($request->hasFile('player_image')){
            $response = json_decode((new ImageProcessor())->resize_image($request,'player_image',750,750)->getContent());
            if ($response->success){
                $player_image = $response->path;
            }
        }

        $signature = strtoupper(substr($request->first_name, 0, 1) . '.' . substr($request->middle_name, 0, 1)) . '.' . ucwords($request->last_name);
        $player = Player::create([
            'team_id' => $request->team_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'local_id' => $request->local_id,
            'fifa_id'  => $request->fifa_id,
            'playing_position' => $request->playing_position,
            'weight' => $request->weight,
            'height' => $request->height,
            'nationality' => $request->nationality,
            'dob' => $request->dob,
            'professional_date' => $request->professional_date,
            'jersey_number' => $request->jersey_number,
            'signature' => $signature,
            'rank' => $request->rank,
            'player_image' => $player_image
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Player created successfully!',
            'player' => $player
        ], 200);
    }

    /**
     * Display player details.
     *
     * @param Player $players
     * @return \Illuminate\Http\Response
     */
    public function show($players_id)
    {
        $players = Player::find($players_id);
        return response()->json([
            'success' => true,
            'message' => 'Player retrieved successfully!',
            'player' => $players
        ], 200);
    }

    /**
     * Update player details
     *
     * @param \Illuminate\Http\Request $request
     * @param Player $players
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $players)
    {
        $request->validate([
            'team_id' => 'required|integer|exists:teams,id',
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'local_id' => 'required|integer',
            'fifa_id' => 'required|integer',
            'playing_position' => 'required|integer',
            'weight' => 'required',
            'height' => 'required',
            'nationality' => 'required',
            'dob' => 'required|date',
            'professional_date' => 'required|date',
            'jersey_number' => 'required|integer',
            'rank' => 'nullable',
            'player_image' => 'nullable|image',
        ]);
        $player_image = null;
        if ($request->hasFile('player_image')){
            $response = json_decode((new ImageProcessor())->resize_image($request,'player_image',750,750)->getContent());
            if ($response->success){
                $player_image = $response->path;
            }
        }


        $signature = strtoupper(substr($request->first_name, 0, 1) . '.' . substr($request->middle_name, 0, 1)) . '.' . ucwords($request->last_name);
        $players->update([
            'team_id' => $request->team_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'local_id' => $request->local_id,
            'fifa_id'  => $request->fifa_id,
            'playing_position' => $request->playing_position,
            'weight' => $request->weight,
            'height' => $request->height,
            'nationality' => $request->nationality,
            'dob' => $request->dob,
            'professional_date' => $request->professional_date,
            'jersey_number' => $request->jersey_number,
            'signature' => $signature,
            'rank' => $request->rank,
            'player_image' => $player_image
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Player updated successfully!',
            'player' => $players
        ], 200);

        if (is_null($players)) {
            return $this->sendError('Player not found.');
        }

    }

    /**
     * Delete player.
     *
     * @param Player $players
     * @return \Illuminate\Http\Response
     */
    public function destroy($players_id)
    {
        $players = Player::find($players_id);
        
        $players->delete();

        return response()->json([
            'success' => true,
            'message' => 'Player deleted successfully!'
        ], 200);
    }
}
