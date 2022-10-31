<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
<<<<<<< HEAD


    //**** User signup */
    public function create_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_role' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'mobile' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $input = $request->all();
        $rules = array('email' => 'unique:users,email');

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return $this->sendError('Email already exist');
        }
        else {
            
        $input['password'] = bcrypt("12345");
        $user = User::create($input);
        $user->attachRole($input['user_role']);
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User created successfully.');
    }
    }
}
=======
}
>>>>>>> v-0.0.1
