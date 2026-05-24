<?php

use Illuminate\Support\Facades\Route;

use Spatie\Prometheus\Http\Controllers\PrometheusController;
use Spatie\Prometheus\Facades\Prometheus;

Route::get('/', function () {
    return response()->json(["message"=>"web ok"]);
    
});

