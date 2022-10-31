<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region',
        'location',
        'capacity',
        'stadium_owner',
        'stadium_picture',
        'inauguration_date'
    ];
}