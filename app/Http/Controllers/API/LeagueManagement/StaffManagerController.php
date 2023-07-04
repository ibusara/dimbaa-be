<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use App\Models\Staffs;
use App\Models\Tactics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;

class StaffManagerController extends Controller
{
    public function get()
    {
        $staff = Staffs::where('team_id',Auth::user()->team_id)->get();


        return response()->json([
            'success' => true,
            'Content' => $staff
        ], 200);
    }
    public function get_Tactics(Request $request)
    {
        $tactics = Tactics::all();

        return response()->json([
            'success' => true,
            'Content' => $tactics
        ], 200);
    }

    public function get_Teams(Request $request)
    {
        $Content = Team::all();

        return response()->json([
            'success' => true,
            'Content' => $Content
        ], 200);
    }
}
