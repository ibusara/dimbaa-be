<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferringTeam extends Model
{
    use HasFactory;
    // "referee":['name' => 'name', 'regsion' => 'regon','degree_of_difficulty' => 'df','marks' => 'm', 'w_c_marks' => 'wcm'],

    protected $fillable = [
        'match_id',
        'refree',
        'ass_referee_1',
        'ass_referee_2',
        'fourth_official',
        'add_referee_one',
        'add_referee_two',
        'additional_assistant_referee_1',
        'additional_assistant_referee_2'
    ];


    protected $cast = [
        'match_id' => 'array',
        'refree' => 'array',
        'ass_referee_1' => 'array',
        'ass_referee_2' => 'array',
        'fourth_official' => 'array',
        'add_referee_one' => 'array',
        'add_referee_two' => 'array',
        'additional_assistant_referee_1' => 'array',
        'additional_assistant_referee_2' => 'array'
    ];
}
