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
}
