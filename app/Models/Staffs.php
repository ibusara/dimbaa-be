<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'firstName',
        'middleName',
        'lastName',
        'staffPic',
        'jobdescription',
        'signature',
    ];
}
