<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchEquipmentCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'ambulance',
        'ball_boys',
        'corner_flags',
        'dressing_room',
        'entrance',
        'exterior_fence',
        'field_marks',


        'goals',
        'journalist',
        'nets',
        'official_guest',
        'pitch',
        'platform',
        'police',
        'protection_stewards',
    ];


    protected $cast = [
        'ambulance' => 'array',
        'ball_boys' => 'array',
        'corner_flags' => 'array',
        'dressing_room' => 'array',
        'entrance' => 'array',
        'exterior_fence' => 'array',
        'field_marks' => 'array',

        'goals' => 'array',
        'journalist' => 'array',
        'nets' => 'array',
        'official_guest' => 'array',
        'pitch' => 'array',
        'platform' => 'array',
        'police' => 'array',
        'protection_stewards' => 'array'
    ];
}
