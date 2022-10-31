<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreMatchFinal extends Model
{
    use HasFactory;

    protected $fillable = [
        'additional_remarks',
        'email',
        'mobile',
        'signature',
        'whatsapp'
    ];
}