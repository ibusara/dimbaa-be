<?php

namespace App\Http\Controllers\API\LeagueManagement;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Player;
use Validator;

class TeamPlayerController extends BaseController
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
        $role = $request->input('role');
        $name = $request->input('name');

        $players = Player::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })->when($name, function ($query) use ($name) {
            $query->where('name', $name);
        })->latest()->paginate($perPage);

        return $this->sendResponse($players, 'Players retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function beginner(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'team' => 'required|integer|exists:teams,id', //
            'name' => 'required|between:3,50',
            'email' => 'required',
            'number' => 'required|integer|between:1,999',
        ]);



        array_merge($input, [
            'team_id' =>  $request->team, 'user_id' => $user->id,
            'rank' => 3,
        ]);

        $player = Player::create($input);

        return $this->sendResponse($player, 'Beginner Player created successfully.');
    }


    public function reserve(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'team' => 'required|integer|exists:teams,id', //
            'name' => 'required|between:3,50',
            'email' => 'required',
            'number' => 'required|integer|between:1,999',
        ]);

        array_merge($input, [
            'team_id' =>  $request->team, 'user_id' => $user->id,
            'rank' => 4
        ]);

        return $this->sendResponse($player, 'Reserve Player created successfully.');
    }


    public function leaders(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $request->validate([
            'team' => 'required|integer|exists:teams,id', //
            'name' => 'required|between:3,50',
            'email' => 'required',
            'number' => 'required|integer|between:1,999',
        ]);



        array_merge($input, [
            'team_id' =>  $request->team, 'user_id' => $user->id,
            'rank' => 2
        ]);

        return $this->sendResponse($player, 'Team Leaders created successfully.');
    }

    /**
     * Display the specified resource.
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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