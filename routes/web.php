<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController as Auth,
    DashboardController as Dashboard,
    DataPegawaiController as DataPegawai,
    PenugasanController,
    JenisPengawasanController as JenisPengawasan,
    StrataPendidikanController as StrataPendidikan,
    UnitKerjaController as UnitKerja,
    ObyekController as Obyek,
    jenjangJabatanController as jenJabatan,
    jabatanController as jabatan,
    pangkatController as pangkat,
    SpjRealisasiController,
    UserController as Users,
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
        Route::get('/list', [JenisPengawasan::class, 'list'])->name('list');
        Route::post('/store', [JenisPengawasan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [JenisPengawasan::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [JenisPengawasan::class, 'update'])->name('update');
        Route::delete('delete/{id}', [JenisPengawasan::class, 'destroy'])->name('delete');
    })->name('jenis-pengawasan');

    Route::group(['prefix' => 'realisasi', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [SpjRealisasiController::class, 'index'])->name('index');
        Route::get('/selectSt/{id}', [SpjRealisasiController::class, 'getStById'])->name('selectSt');
        Route::get('/spj/{id}', [SpjRealisasiController::class, 'getSpj'])->name('getSpj');
        Route::patch('/spj/{id}', [SpjRealisasiController::class, 'postSpj'])->name('postSpj');
        Route::get('/perencanaan/{id}', [SpjRealisasiController::class, 'showPerencanaan'])->name('showPerencanaan');
        Route::get('/pelaksanaan/{id}', [SpjRealisasiController::class, 'showPelaksanaan'])->name('showPelaksanaan');
        Route::get('/penyelesaian/{id}', [SpjRealisasiController::class, 'showPenyelesaian'])->name('showPenyelesaian');
    })->name('realisasi');

    Route::group(['prefix' => 'penugasan', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [PenugasanController::class, 'index'])->name('index');
    })->name('penugasan');

    Route::group(['prefix' => 'obyek', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [Obyek::class, 'index'])->name('index');
        Route::get('/list', [Obyek::class, 'listObyek'])->name('list');
        Route::get('/create', [Obyek::class, 'create'])->name('create');
        Route::post('/store', [Obyek::class, 'store'])->name('store');
        Route::get('/edit/{id}', [Obyek::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [Obyek::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [Obyek::class, 'destroy'])->name('delete');
    })->name('obyek');

    Route::group(['prefix' => 'strata-pendidikan', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [StrataPendidikan::class, 'index'])->name('index');
        Route::get('/create', [StrataPendidikan::class, 'create'])->name('create');
        Route::post('/store', [StrataPendidikan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [StrataPendidikan::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [StrataPendidikan::class, 'update'])->name('update');
        Route::delete('delete/{id}', [StrataPendidikan::class, 'destroy'])->name('delete');
    })->name('strata-pendidikan');

    Route::group(['prefix' => 'unit-kerja', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [UnitKerja::class, 'index'])->name('index');
        Route::get('/create', [UnitKerja::class, 'create'])->name('create');
        Route::post('/store', [UnitKerja::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UnitKerja::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [UnitKerja::class, 'update'])->name('update');
        Route::delete('delete/{id}', [UnitKerja::class, 'destroy'])->name('delete');
    })->name('unit-kerja');

    Route::group(['prefix' => 'jenjangJabatan', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [jenJabatan::class, 'index'])->name('index');
        Route::get('/list', [jenJabatan::class, 'listjenjangJabatan'])->name('list');
        Route::get('/create', [jenJabatan::class, 'create'])->name('create');
        Route::post('/store', [jenJabatan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [jenJabatan::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [jenJabatan::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [jenJabatan::class, 'destroy'])->name('delete');
    })->name('obyek');

    Route::group(['prefix' => 'jabatan', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [jabatan::class, 'index'])->name('index');
        Route::get('/list', [jabatan::class, 'listJabatan'])->name('list');
        Route::get('/create', [jabatan::class, 'create'])->name('create');
        Route::post('/store', [jabatan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [jabatan::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [jabatan::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [jabatan::class, 'destroy'])->name('delete');
    })->name('obyek');

    Route::group(['prefix' => 'pangkat', 'middleware' => ["authenticated"]], function () {
        Route::get('/', [pangkat::class, 'index'])->name('index');
        Route::get('/list', [pangkat::class, 'listPangkat'])->name('list');
        Route::get('/create', [pangkat::class, 'create'])->name('create');
        Route::post('/store', [pangkat::class, 'store'])->name('store');
        Route::get('/edit/{id}', [pangkat::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [pangkat::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [pangkat::class, 'destroy'])->name('delete');
    })->name('pangkat');

})->name("simapip");
