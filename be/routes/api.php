<?php

use App\Http\Controllers\MasterHabitIndikatorController;
use App\Http\Controllers\MasterHabitsController;
use App\Http\Controllers\QuizController;
use App\Models\QuizAttempt;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return response()->json(["message" => "backend web"]);
});
Route::get("test-log", function () {
    echo 123;
    $t =  now()->timestamp;
    echo $t;
    Log::info("test-log cek " . $t);
    echo "done";
});
Route::group(["prefix" => "public"], function () {});
Route::group(["middleware" => ["auth.loggedin"]], function () {
    Route::resource("quiz", QuizController::class);
});
Route::group(["middleware" => ["auth:api"]], function () {
    Route::get("me", function () {
        $user  = auth()->user();
        return response()->json(["user" => $user,  "roles" => $user->getRoleNames(), "permissions" => $user->getAllPermissions()->pluck('name')]);
    });

    Route::resource("master/habits", MasterHabitsController::class);
    Route::resource("master/habits/{habit}/indicators", MasterHabitIndikatorController::class);
});

Route::get("login", function () {
    $user = User::find(1);
    Auth::login($user);
    return response()->json(["token" => $user->createToken("app_token")]);
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
