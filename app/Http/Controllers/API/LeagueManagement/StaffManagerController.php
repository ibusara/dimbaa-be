<?php

namespace App\Http\Controllers\API\LeagueManagement;

use App\Http\Controllers\Controller;
use App\Models\Staffs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffManagerController extends Controller
{
    public function get()
    {
        $staff = Staffs::where('team_id',Auth::user()->team_id)->get();

        $res = [];
        foreach($staff as $s){
            $res['job_description'][$s['id']] = $s['jobdescription'];
            $res['firstName'][$s['id']] = $s['firstName'];
            $res['middleName'][$s['id']] = $s['middleName'];
            $res['lastName'][$s['id']] = $s['lastName'];
            $res['staffPic'][$s['id']] = $s['staffPic'];
            $res['signature'][$s['id']] = $s['signature'];
        }

        return response()->json([
            'success' => true,
            'Content' => $res
        ], 200);
    }
}
