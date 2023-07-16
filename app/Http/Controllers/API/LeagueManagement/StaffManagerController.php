<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use App\Models\Staffs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffManagerController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:view-staff', ['only' => ['get']]);
    }
    
    public function get()
    {
        $staff = Staffs::where('team_id',Auth::user()->team_id)->get();

        return response()->json([
            'success' => true,
            'Content' => $staff
        ], 200);
    }
}
