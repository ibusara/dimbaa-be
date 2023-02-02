<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apparel extends Model
{
    use HasFactory;
    protected $fillable =['match_id','home_team_id','away_team_id','away_color','home_color','home_shirt_image','away_shirt_image','away_short_image','home_short_image','start_date','end_date','home_short_image','away_short_image','away_full_kit_image','home_full_kit_image'];
    public function match(){
        return $this->belongsTo(MatchRecord::class,'match_id')->withDefault([]);
    }
    public function home_team(){
        return $this->belongsTo(Team::class,'home_team_id')->withDefault([]);
    }
    public function away_team(){
        return $this->belongsTo(Team::class,'away_team_id')->withDefault([]);
    }
}
