<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchTeamPlayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id'
    ];


    protected $cast = [
        'team1_starting' => 'array',
        'team2_starting' => 'array',
        'team1_reserve' => 'array',
        'team2_reserve' => 'array',
        'team1_substitutions' => 'array',
        'team2_substitutions' => 'array',
    ];
}
