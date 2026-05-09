<?php

use App\Models\User;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttempt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json(["message" => "backend web"]);
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
Route::group(["middleware" => ["auth:api"]], function () {
    Route::get("/quiz/", function () {
        $quiz = Quiz::all();
        $quiz->load("questions");
        return response()->json([
            "data" => $quiz
        ]);
    })->name("quiz.detail");
    Route::post("/quiz/{id}/attempt", function ($id) {
        $quiz = Quiz::find($id);
        $user = auth()->user();
        $quiz_attempt = QuizAttempt::create([
            'quiz_id' => $quiz->id,
            'participant_id' => $user->id,
            'participant_type' => get_class($user)
        ]);
        $quiz_attempt->generateQuestion(30);

        return response()->json(["message" => "generated quiz", "quiz_attempt_uuid" => $quiz_attempt->uuid]);
    })->name("quiz.start-attempt");

    Route::get("/quiz-attempt/{quiz_attempt_uuid}", function ($quiz_attempt_uuid) {
        $quiz_attempt = QuizAttempt::where("uuid", $quiz_attempt_uuid)->get()->first();
        if (!$quiz_attempt) {
            abort(404);
        }
        $quiz_attempt->load(["participant", "questions"]);
        $score = $quiz_attempt->calculate_score();

        return response()->json(["quiz_attempt" => $quiz_attempt]);
    })->name("quiz.attempt-detail");
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
