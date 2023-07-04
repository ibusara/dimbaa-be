<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchOfficialAssistant extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'center_supervisor',
        'commisioner',
        'district',
        'email',
        'full_name',
        'game_no_other',
        'game_no_tpl',

        'match_payment',
        'referee_assessor',
        'referee_reg_no',
        'region',
        'tel_number'
    ];


    protected $cast = [
        'center_supervisor' => 'array',
        'commisioner' => 'array',
        'district' => 'array',
        'email' => 'array',
        'entrance' => 'array',
        'full_name' => 'array',
        'game_no_other' => 'array',
        'game_no_tpl' => 'array',

        'match_payment' => 'array',
        'referee_assessor' => 'array',
        'referee_reg_no' => 'array',
        'region' => 'array',
        'tel_number' => 'array'
    ];
}
