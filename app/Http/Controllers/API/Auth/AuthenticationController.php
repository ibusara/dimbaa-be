<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 *
 *
 * API endpoints for managing authentication
 */
class AuthenticationController extends Controller
{

    /**
     * Register new user
     *
     * @unauthenticated
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|integer|unique:users,mobile',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            $token = $user->createToken('Dimbaa')->accessToken;
            return response()->json([
                'success' => true,
                'message' => 'User registration successfull',
                'access_token' => $token
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Error registering user!'
        ], 422);
    }

    /**
     * Log in the user.
     * @unauthenticated
     *
     * @bodyParam   email    string  required    The email of the  user.      Example: testuser@example.com
     * @bodyParam   password    string  required    The password of the  user.   Example: secret
     *
     * @response {
     *  "success": true,
     *  "message": User login successfull
     *  "access_token": "eyJ0eXA...",
     * }
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Dimbaa')->accessToken;
            return response()->json([
                'success' => true,
                'message' => 'User login successfull',
                'access_token' => $token
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * Logout user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}