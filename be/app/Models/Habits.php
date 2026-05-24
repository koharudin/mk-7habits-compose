<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Habits extends Model
{
    //
    public $table = "habits";

    protected static function booted(): void
    {
        static::creating(function ($model) {

            // contoh isi kolom uuid
            $model->uuid = (string) Str::uuid();
        });
        static::created(function ($model) {

            $model->slug = $model->id . "-" . Str::slug($model->name);
            $model->save();
        });
    }

    public function objIndikators()
    {
        return $this->hasMany(HabitIndikator::class, "habit_id", "id")->orderBy("order", "asc");
    }
}
