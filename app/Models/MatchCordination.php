<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchCordination extends Model
{
    use HasFactory;


    protected $fillable = [
        'match_id',
        'match_coordination_meeting',
        'meeting_date',
        'if_no_meeting',
        'comment',

        'tff_flag_raised',
        'tff_on_the_pole',
        'play_fair_flag_raised',
        'security_officer',
        'pff_on_the_pole',

        'position_benches_respected_both_teams',
        'not_respected_reason',
        'performance_flag_bearers',
        'performance_ball_boys',
        'performance_team_escorts',
        'teams_behaviour'
    ];

}
