<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreMatchCondition extends Model
{
    protected $fillable = [
        'expected_stadium_attendance',
        'flood_lights',
        'match_balls',
        'pitch_quality',
        'security',
        'stadium_preparation',
        'weather'
    ];
}