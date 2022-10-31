<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

use App\Models\Notification;

class GeneralController extends BaseController
{
    /**
     * Display all notifications per role.
     *
     * @return \Illuminate\Http\Response
     */
    public function notifications(Request $request)
    {
        $user = $request->user();

        $perPage = $request->input('per_page', 100);
        $sortBy = $request->input('sort_by', 'asc');
        $notifications = Notification::where('role_id', $user->role_id)
            ->latest()->paginate($perPage);

        return $this->sendResponse($notifications, 'Notification retrieved successfully.');
    }
}