<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CordinatorMatchOfficial extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'refree',
        'assistant_referee_one',
        'assistant_referee_two',
        'fourth_official',
        'commissionar',
        'match_doctor',
        'media_officer',
        'security_officer',
        'general_coordinator'
    ];

    protected $cast = [
        'refree' => 'array',
        'assistant_referee_one' => 'array',
        'assistant_referee_two' => 'array',
        'fourth_official' => 'array',
        'commissionar' => 'array',
        'match_doctor' => 'array',
        'officer_for_marketing' => 'array',
        'media_officer' =>'array',
        'security_officer' =>'array',
        'general_coordinator' =>' array'
    ];


}
