<?php

use App\Http\Controllers\QuizController;
use App\Models\QuizAttempt;
use App\Models\User;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttemptAnswer;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return response()->json(["message" => "backend web"]);
});
Route::get("test-log",function(){
    echo 123;
    $t=  now()->timestamp;
    echo $t;
    Log::info("test-log cek ".$t);
    echo "done";
});
Route::group(["prefix" =>"public"], function () {
    Route::get("/quiz", function () {
        $quiz = Quiz::all();
        $quiz->load("questions");
        return response()->json([
            "data" => $quiz
        ]);
    });
});
Route::group(["middleware" => ["auth.loggedin"]], function () {
    Route::resource("quiz",QuizController::class);
    
    Route::post("/quiz/{id}/attempt", function ($id) {
        $quiz = Quiz::find($id);
        $user = auth()->user();
        $quiz_attempt = QuizAttempt::create([
            'quiz_id' => $quiz->id,
            'participant_id' => $user->id,
            'participant_type' => get_class($user)
        ]);
        $quiz_attempt->duration = 60*60;
        $quiz_attempt->start_time = now();
        $quiz_attempt->save();

        $quiz_attempt->generateQuestion(30);
        return response()->json(["message" => "generated quiz", "quiz_attempt_uuid" => $quiz_attempt->uuid]);
    })->name("quiz.start-attempt");

    Route::post("/quiz-question/{uuid}", function ($uuid) {
        $question = QuizQuestion::with(['question.options'])->where("uuid",$uuid)->get()->first();
        return response()->json(["question"=>$question]);

    })->name("quiz.all");

    Route::post("/quiz-question/{uuid}/set-answer", function ($uuid) {
        $answer = request()->input("answer");
        $quiz_question = QuizQuestion::with(['question.options'])->where("uuid",$uuid)->get()->first();

        //blocking
        dd($quiz_question->quiz);
        
        $row = QuizAttemptAnswer::create(
            [
                'quiz_attempt_id' => $quiz_question->quiz_attempt_id,
                'quiz_question_id' => $quiz_question->id,
                'question_option_id' => $answer,
            ]
        );
        $quiz_question->answer = $answer;
        $quiz_question->save();

        return response()->json(["quiz_attempt_answer"=>$row]);

    })->name("question.answer");


    Route::get("/quiz-attempt/{quiz_attempt_uuid}", function ($quiz_attempt_uuid) {
        $quiz_attempt = QuizAttempt::where("uuid", $quiz_attempt_uuid)->get()->first();
        if (!$quiz_attempt) {
            abort(404);
        }
        $quiz_attempt->load(["participant", "quiz_questions.question.options:id,question_id,name"]);
        return response()->json(["quiz_attempt" => $quiz_attempt]);
    })->name("quiz.attempt-detail");
    Route::get("/quiz-attempt-result/{quiz_attempt_uuid}", function ($quiz_attempt_uuid) {
        $quiz_attempt = QuizAttempt::where("uuid", $quiz_attempt_uuid)->get()->first();
        if (!$quiz_attempt) {
            abort(404);
        }
        $quiz_attempt->load(["participant", "quiz_questions.question.options:id,question_id,name"]);
        $score = $quiz_attempt->calculate_score();

        return response()->json(["quiz_attempt" => $quiz_attempt]);
    })->name("quiz.attempt-result");
});



Route::post('/login', function () {
    $user = request()->input("email");
    $password  = request()->input("password");

    $user = User::where("email", $user)->get()->first();
    if ($user) {
        if (Hash::check($password, $user->password)) {
            $token = $user->createToken("app_token");
            return response()->json([
                "user" => $user,
                "token" => $token
            ]);
        }
    }
    return response()->json(["message" => "failed"], 401);
});
