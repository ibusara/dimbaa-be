<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Role;
use Validator;
use App\Http\Resources\RoleResource;
   
class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
    
        return $this->sendResponse(RoleResource::collection($roles), 'Roles retrieved successfully.');
    }
   
   
   
}