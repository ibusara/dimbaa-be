<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'first_name',
        'middle_name',
        'last_name',
        'local_id',
        'fifa_id',
        'playing_position',
        'weight',
        'height',
        'nationality',
        'dob',
        'professional_date',
        'jersey_number',
        'signature',
        'rank'
    ];
}