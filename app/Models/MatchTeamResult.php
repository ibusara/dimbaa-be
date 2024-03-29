<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchTeamResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'halftime_score',
        'final_score'
    ];

    protected $cast = [
        'halftime_score' => 'array',
        'final_score' => 'array',
    ];

    // public function getFinalScoreAttrubute(){
    //     return json_decode($this->final_score);
    // }
}
