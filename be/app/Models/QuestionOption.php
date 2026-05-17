<?php

namespace App\Models;

use Harishdurga\LaravelQuiz\Models\Question;
use Harishdurga\LaravelQuiz\Models\QuestionOption as ModelsQuestionOption;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;
use Illuminate\Support\Str;

 class QuestionOption extends ModelsQuestionOption {
    protected $hidden = [
        'is_correct',
    ];
}
