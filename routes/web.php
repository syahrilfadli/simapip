<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController as Auth,
    DashboardController as Dashboard,
    DataPegawaiController as DataPegawai,
    PenugasanController,
    JenisPengawasanController as JenisPengawasan,
};

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

Route::get('/', [Auth::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [Auth::class, 'login'])->name('login.call');

Route::group(['middleware' => ["authenticated"]], function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/logout', [Auth::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'pegawai', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [DataPegawai::class, 'index'])->name('index');
        Route::get('/list', [DataPegawai::class, 'listPegawai'])->name('list');
        Route::get('/{id}/profile', [DataPegawai::class, 'profilePegawai'])->name('profile');
    })->name('pegawai');

    Route::group(['prefix' => 'jenis-pengawasan', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [JenisPengawasan::class, 'index'])->name('index');
        Route::get('/create', [JenisPengawasan::class, 'create'])->name('create');
        Route::post('/store', [JenisPengawasan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [JenisPengawasan::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [JenisPengawasan::class, 'update'])->name('update');
        Route::delete('delete/{id}', [JenisPengawasan::class, 'destroy'])->name('delete');
    })->name('jenis-pengawasan');

    Route::group(['prefix' => 'penugasan', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [PenugasanController::class, 'index'])->name('index');
    })->name('penugasan');

})->name("simapip");
