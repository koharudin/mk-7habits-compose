<?php

namespace App\Models;

use App\Models\QuizQuestion as ModelsQuizQuestion;
use Harishdurga\LaravelQuiz\Models\Question;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttempt as ModelsQuizAttempt;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;
use Illuminate\Support\Str;

 class QuizAttempt extends ModelsQuizAttempt {
   
    protected static function booted(): void
    {
        static::creating(function ($model) {

            // contoh isi kolom uuid
            $model->uuid = (string) Str::uuid();

        });
    }   

    public function generateQuestion(){
        if($this->quiz->is_generate_random){
            $list = QuizQuestion::where("quiz_id",$this->quiz->id)->whereNull('quiz_attempt_id')->get()->pluck("id")->shuffle()->take($this->quiz->max_questions);
            $quiz_attempt_id = $this->id;
            $list->each(function($r,$index) use($quiz_attempt_id){
                $generated  = new ModelsQuizQuestion();
                $generated->quiz_id = $this->quiz->id;
                $generated->quiz_attempt_id =  $quiz_attempt_id;
                $generated->question_id = $r;
                $generated->marks  = 4;
                $generated->negative_marks =  -1;
                $generated->order = $index;
                $generated->save();
            });
        }
    }
    public function quiz_questions(){
        //return $this->hasMany(QuizQuestion::class,'quiz_id','quiz_id')->orderBy("order","asc");
        return $this->hasMany(QuizQuestion::class,'quiz_attempt_id','id')->orderBy("order","asc");
    }
    public function calculate_score($data = null): float
    {
        if($this->is_generate_questions == true){
            $score = 0;
            $quiz_questions_collection = QuizQuestion::where("quiz_attempt_id",$this->id)->with('question')->orderBy('id', 'ASC')->get();
            
            $quiz_attempt_answers = [];
            foreach ($this->answers as $quiz_attempt_answer) {
                $quiz_attempt_answers[$quiz_attempt_answer->quiz_question_id][] = $quiz_attempt_answer;
            }

            foreach ($quiz_questions_collection as $quiz_question) {
                $question = $quiz_question->question;
                $score += call_user_func_array(config('laravel-quiz.get_score_for_question_type')[$question->question_type_id], [$this, $quiz_question, $quiz_attempt_answers[$quiz_question->id] ?? [], $data]);
            }
            return $score;
        }
        else {
            return parent::calculate_score($data);
        }
    }
}
