<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CordinatorMatchResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'extra_time_score',
        'penalty',
        'final_score'
    ];

    protected $cast = [
        'extra_time_score' => 'array',
        'penalty' => 'array',
        'final_score' => 'array',
    ];
}
