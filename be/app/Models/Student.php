<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    //
    public $table = "student";
    protected static function booted(): void
    {
        static::creating(function ($model) {

            // contoh isi kolom uuid
            $model->uuid = (string) Str::uuid();
        });
    }
}
