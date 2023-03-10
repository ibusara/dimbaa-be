<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Stadium;
use Illuminate\Support\Facades\Storage;

/**
 * @group Stadium Management
 *
 *
 * API endpoints for managing stadiums
 */
class StadiumController extends Controller
{
    /**
     * List stadiums.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderBy = $request->filled('orderBy')?$request->orderBy:'id';
        $orderByDirection = $request->filled('orderByDirection')?$request->orderByDirection:'DESC';
        $stadia = Stadium::orderBy('name','ASC')->when($request->filled('searchText'), function ($query) use ($request){
            $searchText = "%$request->searchText%";
            $query->where('name','like',$searchText);
        })->orderBy($orderBy,$orderByDirection)->get();

        return response()->json([
            'success' => true,
            'message' => 'Stadia retrieved successfully!',
            'stadia' => $stadia
        ], 200);
    }

    /**
     * Create a stadium.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:stadia,name',
            'region' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer',
            'stadium_owner' => 'required|string',
            'stadium_picture' => 'required|image|mimes:jpeg,png,jpg',
            'inauguration_date' => 'required|date'
        ]);

        $filename = time() . '.' . $request->stadium_picture->getClientOriginalExtension();

        $file = Storage::putFileAs('uploads', $request->stadium_picture, $filename, 'public');

        $stadium = Stadium::create([
            'name' => $request->name,
            'region' => $request->region,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'stadium_owner' => $request->stadium_owner,
            'stadium_picture' => 'https://fra1.digitaloceanspaces.com/uploads/' . $filename,
            'inauguration_date' => $request->inauguration_date
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Stadium saved successfully!',
            'stadium' => $stadium
        ], 200);
    }

    /**
     * Show stadium details.
     *
     * @param Stadium $stadia
     * @return \Illuminate\Http\Response
     */
    public function show(Stadium $stadia)
    {
        if (!$stadia->id){
            return response()->json([
                'success'=>false,
                'message'=>'Stadium associated with the identifier provided not found',
            ],404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Stadium retrieved successfully!',
            'stadium' => $stadia
        ], 200);
    }

    /**
     * Update stadium details.
     *
     * @param \Illuminate\Http\Request $request
     * @param Stadium $stadia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stadium $stadia)
    {
        if (!$stadia->id){
            return response()->json([
                'success'=>false,
                'message'=>'Stadium associated with the identifier provided not found',
            ],404);
        }
        $request->validate([
            'name' => 'required|unique:stadia,name,' . $stadia->id,
            'region' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer',
            'stadium_owner' => 'required|string',
            'stadium_picture' => 'required|image|mimes:jpeg,png,jpg',
            'inauguration_date' => 'required|date'
        ]);

        $filename = time() . '.' . $request->stadium_picture->getClientOriginalExtension();

        $file = Storage::putFileAs('uploads', $request->stadium_picture, $filename, 'public');

        $stadia->update([
            'name' => $request->name,
            'region' => $request->region,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'stadium_owner' => $request->stadium_owner,
            'stadium_picture' => 'https://fra1.digitaloceanspaces.com/uploads/' . $filename,
            'inauguration_date' => $request->inauguration_date
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Stadium updated successfully!',
            'stadium' => $stadia
        ], 200);
    }

    /**
     * Delete stadium.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stadium $stadia)
    {
        if (!$stadia->id){
            return response()->json([
                'success'=>false,
                'message'=>'Stadium associated with the identifier provided not found',
            ],404);
        }
        $stadia->delete();

        return response()->json([], 'Stadium deleted successfully.');
    }
}
