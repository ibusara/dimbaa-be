<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

/**
 * @group Permissions Management
 *
 *
 * API endpoints for managing permissions
 */
class PermissionController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:permission-edit', ['only' => ['update']]);
    //     $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    // }

    /**
     * List all the permissions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return response()->json([
            'success' => true,
            'message' => 'Permissions retrieved successfully!',
            'permissions' => $permissions
        ], 200);
    }

    /**
     * Create a new permission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name'
        ]);

        Permission::create($request->only('name'));

        return response()->json([
            'success' => true,
            'message' => 'Permission created successfully!'
        ], 200);
    }

    /**
     * Update the permission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permissions)
    {
        $permission = $permissions;
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id
        ]);

        $permission->update($request->only('name'));

        return response()->json([
            'success' => true,
            'message' => 'Permission updated successfully!'
        ], 200);
    }

    /**
     * Delete the permission
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permissions)
    {
        $permissions->delete();

        return response()->json([
            'success' => true,
            'message' => 'Permission deleted successfully!'
        ], 200);
    }
}
