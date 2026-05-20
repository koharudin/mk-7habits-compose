<?php

namespace Database\Seeders;

use App\Models\QuestionOption;
use App\Models\QuizQuestion;
use Harishdurga\LaravelQuiz\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MathQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [];

        // Generate tambahan hingga 50 soal
        for ($i = 6; $i <= 50; $i++) {

            $a = rand(10, 100);
            $b = rand(1, 20);

            $operators = ['+', '-', '*'];
            $operator = $operators[array_rand($operators)];

            switch ($operator) {
                case '+':
                    $correct = $a + $b;
                    break;
                case '-':
                    $correct = $a - $b;
                    break;
                case '*':
                    $correct = $a * $b;
                    break;
            }

            $options = [
                $correct,
                $correct + rand(1, 10),
                $correct - rand(1, 10),
                $correct + rand(11, 20),
            ];

            shuffle($options);

            $questions[] = [
                'question' => "Berapakah hasil dari {$a} {$operator} {$b}?",
                'options' => array_map('strval', $options),
                'answer' => (string) $correct
            ];
        }

        foreach ($questions as $key=>$item) {
            $question = new Question();
            $question->name = $item['question'];
            $question->question_type_id =  1;
            $question->save();
            foreach($item['options'] as $option){
                $quiz_option = new QuestionOption();
                $quiz_option->question_id = $question->id;
                $quiz_option->name = $option;
                $quiz_option->is_correct = $option == $item['answer'];
                $quiz_option->save();
            }

            $quiz_question = new QuizQuestion();
            $quiz_question->quiz_id = 1;
            $quiz_question->order = $key;
            $quiz_question->question_id = $question->id;
            $quiz_question->marks = 3;
            $quiz_question->negative_marks = -1;
            $quiz_question->save();
        }
    }
}