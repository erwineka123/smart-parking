<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Dosen extends Authenticatable
{
    protected $fillable = ['nama', 'password'];

    protected $hidden = ['password'];

    /**
     * Mutator untuk otomatis mengenkripsi password jika belum di-hash.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = 
            (Hash::needsRehash($value)) ? Hash::make($value) : $value;
    }
}
