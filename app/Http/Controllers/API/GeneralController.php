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
        $sortBy = $request->input('sort_by', 'asc');
        $sortByField = $request->input('field','id');
        $notifications = Notification::where('role_id', $user->role_id)
            ->orderBy($sortByField,$sortBy)->paginate($perPage);

        return response()->json([
            'success' => true,
            'message' => 'Notification retrieved successfully.',
            'player' => $notifications
        ], 200);
    }
}
