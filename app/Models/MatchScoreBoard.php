<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchScoreBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'team1_score',
        'team2_score',
        'point'
    ];

}
