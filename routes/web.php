<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Surat\{SuratDigitalController, SuratKeluarController, SuratMasukController};

Route::get('/', [LoginController::class, "showLoginForm"]);


Auth::routes();
Route::get('logout', [LoginController::class, "logout"]);

Route::get('register', function () {
    abort(401);
});

Route::get('password/reset', function () {
    abort(401);
});


Route::middleware('auth')->group(function () {
    Route::get('app', [AppController::class, "index"]);

    Route::get('surat/masuk', [AppController::class, "masuk"])->name("surat.masuk");
    Route::get('surat/keluar', [AppController::class, "keluar"])->name("surat.keluar");
    Route::get('surat/digital', [AppController::class, "digital"])->name("surat.digital");

    Route::get('surat/masuk/tambah', [SuratMasukController::class, "tambah"])->name("masuk.tambah");
    Route::post('surat/masuk/tambah', [SuratMasukController::class, "store"]);
    Route::get('surat/masuk/edit/{id}', [SuratMasukController::class, "edit"])->name('masuk.edit');
    Route::post('surat/masuk/edit/{id}', [SuratMasukController::class, "update"]);
    Route::delete('surat/masuk/hapus/{id}', [SuratMasukController::class, "hapus"])->name('masuk.hapus');

    Route::get('surat/keluar/tambah', [SuratKeluarController::class, "tambah"])->name("keluar.tambah");
    Route::post('surat/keluar/tambah', [SuratKeluarController::class, "store"]);
    Route::get('surat/keluar/edit/{id}', [SuratKeluarController::class, "edit"])->name("keluar.edit");
    Route::post('surat/keluar/edit/{id}', [SuratKeluarController::class, "update"]);
    Route::delete('surat/keluar/hapus/{id}', [SuratKeluarController::class, "hapus"])->name('keluar.hapus');

    Route::get('surat/digital/tambah', [SuratDigitalController::class, "tambah"])->name("digital.tambah");
    Route::post('surat/digital/tambah', [SuratDigitalController::class, "store"]);
    Route::get('surat/digital/edit/{id}', [SuratDigitalController::class, "edit"])->name("digital.edit");
    Route::post('surat/digital/edit/{id}', [SuratDigitalController::class, "update"]);
    Route::delete('surat/digital/hapus/{id}', [SuratDigitalController::class, "hapus"])->name('digital.hapus');
});