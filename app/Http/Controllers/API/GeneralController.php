<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Notification;
use Illuminate\Http\Response;

class GeneralController  extends Controller
{
    /**
     * Display all notifications per role.
     *
     * @param Request $request
     * @return Response
     */
    public function notifications(Request $request)
    {
        $user = $request->user();

        $perPage = $request->input('per_page', 100);
        $sortBy = $request->input('sort_by', 'DESC');
        $sortByField = $request->input('field','id');
        $notifications = Notification::where('role_id', $user->role_id)
            ->orderBy($sortByField,$sortBy)->paginate($perPage);

        return response()->json([
            'success' => true,
            'message' => 'Notification retrieved successfully.',
            'data' => $notifications
        ], 200);
    }
    public function unread_notifications(){
        //when role_id is null, it will pick the general notifications
        $notifications = Notification::where('seen',0)->where('role_id',auth()->user()->role_id)->orderBy('id','DESC')->paginate(50);
        return response()->json([
            'success' => true,
            'message' => 'Notification retrieved successfully.',
            'data' => $notifications
        ], 200);
    }
}
