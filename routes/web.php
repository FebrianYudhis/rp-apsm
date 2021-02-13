<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Surat\{SuratKeluarController, SuratMasukController};

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

Route::get('surat/masuk/tambah', [SuratMasukController::class, "tambah"])->name("masuk.tambah");
Route::post('surat/masuk/tambah', [SuratMasukController::class, "store"]);

Route::get('surat/masuk/keluar', [SuratKeluarController::class, "tambah"])->name("keluar.tambah");
