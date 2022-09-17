<?php

namespace App\Http\Controllers\API\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserManagementController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 100);
        $status = $request->input('status', 1);
        $sortBy = $request->input('sort_by', 'desc');
        // $sort_column = $request->input('sort_column', 'created_at');

        $search = $request->input('search');
        $roles = $request->input('roles');
        $role = $request->input('role');
        $name = $request->input('name');
        $field = $request->input('field');

        $users = User::where( function($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        })->when($name,function($query) use ($name) {
            $query->where('name', $name);
        }) ->when($role,function($query) use ($role) {
            $query->where('role_id', $role);
        })->when($roles,function($query) use ($roles) {
            $query->whereIn('role_id', json_decode($roles));
        })
        ->where('status', $status)->latest()->paginate($perPage);


        return $this->sendResponse($users, 'Users retrieved successfully.');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|between:3,20',
            'email' => 'required|email',
            'user_role' => 'required|integer|exists:users,id',
            'mobile' => 'nullable|integer|min:8|max:15',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input['user_id'] = $user->id;
        $input['role_id'] = $input['user_role'];
        $input['password'] = bcrypt('');
        $user = User::create($input);
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function roles(){
        $roles = Role::all();

        return $this->sendResponse($roles, 'Role retrieved successfully.');
    }
}
