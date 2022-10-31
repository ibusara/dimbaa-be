<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreMatchOperation extends Model
{
    protected $fillable = [
        'cs_email',
        'cs_mobile',
        'cs_name',
        'gc_email',
        'gc_mobile',
        'gc_name',
        'md_email',
        'md_mobile',
        'md_name',
        'mo_email',
        'mo_mobile',
        'mo_name',
        'ra_email',
        'ra_mobile',
        'ra_name',
        'so_email',
        'so_mobile',
        'so_name',
        'ta_email',
        'ta_mobile',
        'ta_name'
    ];
}