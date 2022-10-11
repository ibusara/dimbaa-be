<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchPlayerCaution extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'player_id',
        'team_id',
        'minute',
        'reasons',
        'warning_card'
    ];
}
