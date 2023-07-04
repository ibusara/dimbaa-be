<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreMatchCoOperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'center_supervisor',
        'fa_r',
        'home_team',
        'operation_team',
        'referees',
        'security_authorities',
        'stadium_management',
        'visiting_team'
    ];
}