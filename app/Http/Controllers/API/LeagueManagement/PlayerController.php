<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Player;
use Validator;

/**
 * @group Player Management
 *
 *
 * API endpoints for managing players
 */
class PlayerController extends BaseController
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
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'team_id' => 'required|integer|exists,teams,id',
            'name' => 'required|string',
            'email' => 'required',
            'mobile' => 'required',
            'number' => 'required|integer',
        ]);


        $input['user_id'] = $user->id;
        $input['team_id'] = $request->team;
        $player = Player::create([
            
        ]);

        return $this->sendResponse($player, 'Player created successfully.');
    }

    /**
     * Display player details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::find($id);

        if (is_null($player)) {
            return $this->sendError('Player not found.');
        }

        return $this->sendResponse($player, 'Player retrieved successfully.');
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
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'team' => 'required|integer', //exists,team,id
            'name' => 'required|between:3,50',
            'number' => 'required|integer|between:1,999',
        ]);



        $input['team_id'] = $request->team;
        $player = $player->update($input);

        return $this->sendResponse($player, 'Player updated successfully.');
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

        return $this->sendResponse([], 'Player deleted successfully.');
    }
}