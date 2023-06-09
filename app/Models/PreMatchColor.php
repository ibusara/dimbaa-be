<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreMatchColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'away_team_fp_jersey',
        'away_team_fp_shorts',
        'away_team_fp_socks',
        'away_team_gk_jersey',
        'away_team_gk_shorts',
        'away_team_gk_socks',
        'home_team_fp_jersey',
        'home_team_fp_shorts',
        'home_team_fp_socks',
        'home_team_gk_jersey',
        'home_team_gk_shorts',
        'home_team_gk_socks'
    ];
}