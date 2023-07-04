<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'stadium_id',
        'name',
        'region',
        'team_photo',
        'team_logo'
    ];

    public function stadium()
    {
        return  $this->hasOne('App\Models\Stadium');
    }

    public function players()
    {
        return  $this->hasMany('App\Models\Player');
    }
    public function getTeamPhotoAttribute($value){
        if (!$value){
            return url('/images/default-player-icon.png');
        }
        return url($value);
    }
    public function getTeamLogoAttribute($value){
        if (!$value){
            return url('/images/default-player-icon.png');
        }
        return url($value);
    }
}
