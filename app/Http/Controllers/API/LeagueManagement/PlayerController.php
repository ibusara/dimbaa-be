<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use Validator;

/**
 * @group Player Management
 *
 *
 * API endpoints for managing players
 */
class PlayerController  extends Controller
{
    /**
     * List players.
     *
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
            'license_no' => 'nullable',
            'rank' => 'nullable',
        ]);

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
            'license_no' => $request->license_no,
            'rank' => $request->rank
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return response()->json($player, 'Player retrieved successfully.');
    }

    /**
     * Update player details
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
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
            'license_no' => 'nullable',
            'rank' => 'nullable',
        ]);

        $signature = strtoupper(substr($request->first_name, 0, 1) . '.' . substr($request->middle_name, 0, 1)) . '.' . ucwords($request->last_name);
        $player->update([
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
            'license_no' => $request->license_no,
            'rank' => $request->rank
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Player updated successfully!',
            'player' => $player
        ], 200);
    }

    /**
     * Delete player.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json([
            'success' => true,
            'message' => 'Player deleted successfully!'
        ], 200);
    }
}