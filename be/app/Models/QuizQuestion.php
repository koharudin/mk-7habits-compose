<?php

namespace App\Models;

use Harishdurga\LaravelQuiz\Models\QuizQuestion as ModelsQuizQuestion;
use Illuminate\Support\Str;


class QuizQuestion extends ModelsQuizQuestion
{
    protected static function booted(): void
    {
        static::creating(function ($model) {

            // contoh isi kolom uuid
            $model->uuid = (string) Str::uuid();
        });
    }
}
