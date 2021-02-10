<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', [LoginController::class, "showLoginForm"]);


Auth::routes();

Route::get('register', function () {
    abort(401);
});

Route::get('password/reset', function () {
    abort(401);
});

Route::get('app', [AppController::class, "index"]);
