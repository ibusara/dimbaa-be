<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchPlayerCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id'
    ];


    protected $cast = [
        'team1_players' => 'array',
        'team2_players' => 'array',
        'home_team_players' => 'array',
        'away_team_players' => 'array',
        'team1' => 'array',
        'team2' => 'array'
    ];
}
