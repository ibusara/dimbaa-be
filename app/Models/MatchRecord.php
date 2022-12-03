<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tournament_id',
        'period',
        'home_team',
        'away_team',
        'city',
        'stadium',
        'round'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id')->withDefault([]);
    }
    public function tournament(){
        return $this->belongsTo(Tournament::class,'tournament_id')->withDefault([]);
    }
    public function hometeam(){
        return $this->belongsTo(Team::class,'home_team')->withDefault([]);
    }
    public function awayteam(){
        return $this->belongsTo(Team::class,'away_team')->withDefault([]);
    }
    public function stadium(){
        return $this->belongsTo(Stadium::class,'stadium')->withDefault([]);
    }
}
