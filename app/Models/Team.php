<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'team_name',
        'stadium_id',
        'region'
    ];

    public function stadium(){
        return  $this->hasOne('App\Models\Stadium');
    }

    public function players(){
        return  $this->hasMany('App\Models\Player');
    }
}
