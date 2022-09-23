<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchOfficial extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'head_referee_id',
        'referee_id',
        'match_officer_id',
        'commissioner_id',
        'other_id',
        'other2_id'
    ];
}
