<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Role;
use App\Models\User;
use Validator;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
   
class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
    
        return $this->sendResponse(UserResource::collection($users), 'Users retrieved successfully.');
        // return $this->sendResponse(UserResource::collection($users), 'Users retrieved successfully.');
    }

    public function users_sorting_role(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'field' => 'string|required',
            'sort_by' => 'string|required',
            
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $users = User::whereHas('roles', function ($q) use ($input) {
            $q->orderBy($input['field'], $input['sort_by']);
          })->get();
        
        return $this->sendResponse(UserResource::collection($users), 'Users retrieved successfully.');
        // return $this->sendResponse(UserResource::collection($users), 'Users retrieved successfully.');
    }


    public function users_sorting_other(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'field' => 'string|required',
            'sort_by' => 'string|required',
            
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $users = User::whereHas(
            'roles', function($q){
            }
        )
        ->orderBy($input['field'], $input['sort_by'])
        ->get();

    
        return $this->sendResponse(UserResource::collection($users), 'Users retrieved successfully.');
        
    }

    public function filter_user_by_roles(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'roles' => 'array|required'
            
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $users = User::whereHas(
            'roles', function($q) use ($input){
            $q->whereIn('name', $input['roles']);
            }
        )->get();
    
        return $this->sendResponse(UserResource::collection($users), 'Users retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $input = $request->all();
   
    //     $validator = Validator::make($input, [
    //         'name' => 'required',
    //         'display_name' => 'required',
    //         'description' => 'required'
    //     ]);
   
    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());       
    //     }
   
    //     $role = Role::create($input);
   
    //     return $this->sendResponse(new RoleResource($role), 'Role created successfully.');
    // } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
  
        if (is_null($role)) {
            return $this->sendError('Role not found.');
        }
   
        return $this->sendResponse(new RoleResource($role), 'Role retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $role->name = $input['name'];
        $role->display_name = $input['display_name'];
        $role->description = $input['description'];
        $role->save();
   
        return $this->sendResponse(new RoleResource($role), 'Role updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
   
        return $this->sendResponse([], 'Role deleted successfully.');
    }
}