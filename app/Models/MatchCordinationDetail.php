<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchCordinationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'incident_during_team_check',
        'incident_reason',
        'pitch_condition',
        'dressing_room_condition',

        'stretcher_available',
        'ambulance_available',
        'no_of_stretcher',
        'no_of_ambulance',
        'pff_on_the_pole',

        'information',
        'annoucer',
        'giant_screen',
        'incident',
        'remarks',
        'name',
        'date'
    ];
}
