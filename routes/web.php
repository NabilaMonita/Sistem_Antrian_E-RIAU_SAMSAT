<?php

use App\Http\Controllers\DashboardAntrianController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardLaporanController;
use App\Http\Controllers\FrontAntrianController;
use App\Http\Controllers\FeedbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('antrian', FrontAntrianController::class);
Route::get('livewire/antrian/cetakAntrian', [FrontAntrianController::class, 'cetakAntrian'])->name('cetakAntrian');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

    Route::group(['middleware' => 'CheckRole:admin'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('redirectifauthenticated');
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::get('dashboard/antrian/bpkb', [DashboardAntrianController::class, 'indexLayananBpkb']);
        Route::get('dashboard/antrian/stnk', [DashboardAntrianController::class, 'indexLayananStnk']);
        Route::get('dashboard/antrian/pajak', [DashboardAntrianController::class, 'indexLayananPajakKendaraan']);
        Route::get('dashboard/antrian/uji', [DashboardAntrianController::class, 'indexLayananUjiKendaraan']);

        Route::get('dashboard/laporan/index', [DashboardLaporanController::class, 'index']);
        Route::get('livewire/dashboard/laporan/cetakLaporan', [DashboardLaporanController::class, 'cetakLaporan'])->name('cetakLaporan');

        // Routes for feedback management
        Route::get('dashboard/feedback', [FeedbackController::class, 'index'])->name('dashboard.feedback.index');
        // routes/web.php
        Route::get('/feedback/{id}', [FeedbackController::class, 'show'])->name('feedback.show');

        // Rute untuk menghapus feedback
Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('dashboard.feedback.destroy');

    });
});
