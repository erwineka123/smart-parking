<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'diizinkan'
    ];
}
