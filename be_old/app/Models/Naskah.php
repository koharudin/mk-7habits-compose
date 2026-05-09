<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Naskah extends Model
{
    protected $table = 'naskah';

    protected $fillable = ["title", "description", "slug", "uuid"];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            // UUID
            $model->uuid = (string) Str::uuid();

            // Slug
            $slug = Str::slug($model->title);

            // Cek slug duplicate
            $count = static::where('slug', 'LIKE', "{$slug}%")->count();

            $model->slug = $count
                ? $slug . '-' . ($count + 1)
                : $slug;
        });
    }
}
