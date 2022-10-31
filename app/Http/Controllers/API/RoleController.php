<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Validator;
use App\Http\Resources\RoleResource;

class RoleController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return response()->json(RoleResource::collection($roles), 'Roles retrieved successfully.');
    }
}
