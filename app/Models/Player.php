<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'first_name',
        'middle_name',
        'last_name',
        'local_id',
        'fifa_id',
        'playing_position',
        'weight',
        'height',
        'nationality',
        'dob',
        'professional_date',
        'jersey_number',
        'signature',
        'player_image',
        'rank'
    ];
    protected  $appends =['age'];
    public function getAgeAttribute($value){
        if (!$value){
            return '-';
        }
        return (new Carbon())->diffInYears((new Carbon($value)));
    }
    public function getPlayerImageAttribute($value){
        if (!$value){
            return url('/images/default-player-icon.png');
        }
        return url($value);
    }
}
