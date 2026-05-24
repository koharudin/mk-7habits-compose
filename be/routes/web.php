<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Spatie\Prometheus\Http\Controllers\PrometheusController;
use Spatie\Prometheus\Facades\Prometheus;

Route::get('/', function () {
    return response()->json(["message"=>"web ok"]);
    
});

Route::get("login",function(){
    $user = User::find(1);
    Auth::login($user);
});

Route::get("cek-user", function(){
    $user  = auth()->user();
    return response()->json(["user"=>$user,  "roles" => $user->getRoleNames(),"permissions" => $user->getAllPermissions()->pluck('name')]);
});