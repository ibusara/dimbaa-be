<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreMatchIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_one',
        'issue_two',
        'issue_three',
    ];
}
