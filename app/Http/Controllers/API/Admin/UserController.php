<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group User Management
 *
 *
 * API endpoints for managing users
 */
class UserController extends Controller
{
    /**
     * List all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();

        return response()->json([
            'success' => true,
            'message' => 'Users retrieved successfully!',
            'users' => $users
        ], 200);
    }

    /**
     * Create new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|integer|unique:users,mobile',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            return response()->json([
                'success' => true,
                'user'=>$user,
                'message' => 'User registration successful'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Error registering user!'
        ], 422);
    }

    /**
     * Show user details.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        return response()->json([
            'success' => true,
            'message' => 'User retrieved successfully!',
            'user' => $users
        ], 200);
    }

    /**
     * Update User details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        $user = $users;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'required|integer|unique:users,mobile,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'role_id' => $request->role_id
        ]);

        if ($user) {
            return response()->json([
                'success' => true,
                'user'=>$user,
                'message' => 'User registration successful'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Error registering user!'
        ], 422);
    }

    /**
     * Delete user.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        $users->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ], 200);
    }
}
