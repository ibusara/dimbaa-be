<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreMatchChallenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'one_description',
        'one_possible_measure',
        'three_description',
        'three_possible_measure',
        'two_description',
        'two_possible_measure'
    ];
}
