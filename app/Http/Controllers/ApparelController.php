<?php

namespace App\Http\Controllers;

use App\Models\Apparel;
use Illuminate\Http\Request;

class ApparelController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'match_id'=>'required|integer|exists:match_records,id'
        ]);
        $apparels = Apparel::query()->with(['home_team:id,name','away_team:id,name','match'])->where('match_id','=',$request->match_id)->get();
        return response()->json([
            'success' => true,
            'message' => 'Apparels fetched successfully',
            'apparels' => $apparels
        ], 200);
    }
    public function store(Request $request){
       return response()->json([
           'success' => true,
           'message' => 'Apparels created successfully',
           'apparels' => []
       ],200) ;
    }
    public function update(Request $request){
        return response()->json([
            'success' => true,
            'message' => 'Apparels updated successfully',
            'apparels' => []
        ],200) ;
    }
}
