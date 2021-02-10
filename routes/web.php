<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', [LoginController::class, "showLoginForm"]);


Auth::routes();
Route::get('logout', [LoginController::class, "logout"]);

Route::get('register', function () {
    abort(401);
});

Route::get('password/reset', function () {
    abort(401);
});

Route::get('app', [AppController::class, "index"]);

Route::get('surat/masuk', [AppController::class, "masuk"])->name("surat.masuk");
Route::get('surat/keluar', [AppController::class, "keluar"])->name("surat.keluar");

Route::get('surat/masuk/tambah', [AppController::class, "masukTambah"])->name("masuk.tambah");
Route::get('surat/masuk/keluar', [AppController::class, "keluarTambah"])->name("keluar.tambah");
