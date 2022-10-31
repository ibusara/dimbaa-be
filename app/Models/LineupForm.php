<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineupForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'competition_id',
        'detail_date',
        'game_no',
        'today_date',
        'manager_signature',
        'team_signature'
    ];
}
