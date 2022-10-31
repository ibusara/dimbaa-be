<?php

namespace App\Models\Evaluation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefereeEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'additional_comments_on_game_control',
        'area_of_improvements',
        'performance',
        'positive_points',
    ];
}
