<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Validator;

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
            $user = User::query()->with('role:id,name,guard_name')->find(auth()->id());
            return response()->json([
                'success' => true,
                'message' => 'User login successfully',
                'user'=>$user,
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

    public function forgetpassword(Request $request){

        try{

            $user = User::where('email',$request->email)->get();

            if(count($user) > 0){
                $token = rand(4,10000000);
                // $domain = URL::to('/');
                // $url = $domain.'/reset/password?token='.$token;

                $data['token'] = $token;
                $data['email'] = $request->email;
                $data['title'] = 'Password Reset';
                $data['body'] = 'Your Otp Code';

                Mail::send('forgetPasswordMail',['data'=>$data],function($message) use ($data){
                    $message->from($data['email']);
                    $message->to($data['email'])->subject($data['title']);
                });

                $datetime = Carbon::now()->format('Y-m-d H:i:s');

                PasswordReset::updateOrCreate(
                    ['email'=>$request->email],
                    [
                        'email'=>$request->email,
                        'token'=>$token,
                        'created_at'=>$datetime,
                    ],
                );

                return response()->json(['success'=>true,'message'=>'please check you mail to reset your password.']);

            }else{
                return response()->json(['success'=>false,'message'=>'User not found!']);
            }

        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }

    }

    public function resetpasswordload(Request $request){
        
        $request->validate([
            'otp' => 'required',
            'email' => 'required'
        ]);

        $restData = PasswordReset::where('token',$request->otp)->where('email','=',$request->email)->get();

        if(isset($request->otp) && count($restData) > 0){

            return response()->json(['success'=>true,'message'=>'Otp has been Verified']);

        }else{
            return response()->json(['success'=>false,'message'=>'Otp has not Verified']);
        }

    }

    public function resetpassword(Request $request){
        
        $request->validate([
            'password' => 'required|string|min:7|confirmed',
            'email' => 'required'
        ]);

            $user = User::where('email','=',$request->email)->first();

            if(!empty($user)){
                $user->password = Hash::make($request->password);

                $user->save();

                PasswordReset::where('email',$user->email)->delete();

                return response()->json(['success'=>true,'message'=>'Your password has been reset successfully']);
           
            }else{
                return response()->json(['success'=>false,'message'=>'User Not Found']);
            }
    }
}
