<?php

namespace App\Models;
use App\Models\User;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{

    protected $fillable = [
        'name', 'display_name','description'
    ];
    public $guarded = [];


//     public function Users()
// {
//     return $this->belongsToMany('App\Models\User','role_user');
// }

public function users(){
    return $this->hasMany('App\Models\User'::class, 'role_id');
}
}
