<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * @group Role Management
 *
 *
 * API endpoints for managing roles
 */
class RoleController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:role-edit', ['only' => ['update']]);
    //     $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }

    /**
     * List all the roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all()->pluck('name');

        return response()->json([
            'success' => true,
            'message' => 'Roles retrieved successfully!',
            'roles' => $roles
        ], 200);
    }

    /**
     * Create a new role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->get('name')]);

        $role->syncPermissions($request->get('permission'));

        return response()->json([
            'success' => true,
            'message' => 'Role created successfully!'
        ], 200);
    }

    /**
     * Display single role with permissions.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $roles)
    {
        if (!$roles->id){
            return response()->json([
                'success'=>false,
                'message'=>'Resource associated with the identifier provided not found',
            ],404);
        }
        $role = $roles;
        $rolePermissions = $role->permissions;

        return response()->json([
            'success' => true,
            'message' => 'Role retrieved successfully!',
            'role' => $role,
            'permissions' => $rolePermissions
        ], 200);
    }

    /**
     * Update Role and permissions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $roles)
    {
        if (!$roles->id){
            return response()->json([
                'success'=>false,
                'message'=>'Resource associated with the identifier provided not found',
            ],404);
        }
        $role = $roles;
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role->update($request->only('name'));

        $role->syncPermissions($request->get('permission'));

        return response()->json([
            'success' => true,
            'message' => 'Role updated successfully!'
        ], 200);
    }

    /**
     * Delete the Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $roles)
    {
        if (!$roles->id){
            return response()->json([
                'success'=>false,
                'message'=>'Resource associated with the identifier provided not found',
            ],404);
        }
        $roles->delete();

        return response()->json([
            'success' => true,
            'message' => 'Role deleted successfully!'
        ], 200);
    }
}
