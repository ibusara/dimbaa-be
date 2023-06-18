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
        'round',
        'date'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id')->withDefault([]);
    }
    public function tournament(){
        return $this->belongsTo(Tournament::class,'tournament_id')->withDefault([]);
    }
    public function hometeam(){
        return $this->belongsTo(Team::class,'home_team_id')->withDefault([]);
    }
    public function awayteam(){
        return $this->belongsTo(Team::class,'away_team_id')->withDefault([]);
    }
    public function stadium(){
        return $this->belongsTo(Stadium::class,'stadium_id')->withDefault([]);
    }
    public function assigned(){
        return $this->belongsTo(MatchOfficialAssistant::class,'away_team_id')->withDefault([]);
    }

    protected $appends = ['forteam','kick_off_time','official_assistant'];
    public function getForTeamAttribute()
    {
        return Team::where('id',$this->away_team_id)->value('name');
    }
    public function getPrematchAttribute()
    {
        return PreMatchReport::where('match_id',$this->id)->value('kick_off_time');
    }
    public function getOfficialAssistantAttribute()
    {
        return MatchOfficialAssistant::where('match_id',$this->id)->value('commissioner');
    }
}
