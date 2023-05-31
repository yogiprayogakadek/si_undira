<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->namespace('Main')->group(function() {
    Route::controller('DashboardController')
            ->prefix('/')
            ->name('dashboard.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/chart', 'chart')->name('chart');
            });

    Route::controller('PasienController')
            ->prefix('/pasien')
            ->name('pasien.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{pasien_id}', 'edit')->name('edit');
                Route::post('/update', 'update')->name('update');
            });

    Route::controller('KunjunganController')
            ->prefix('/kunjungan')
            ->name('kunjungan.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{kunjungan_id}', 'edit')->name('edit');
                Route::post('/update', 'update')->name('update');
                Route::get('/data-pasien/{pasien_id}', 'dataPasien')->name('data-pasien');
            });

    Route::controller('RetensiController')
            ->prefix('/retensi')
            ->name('retensi.')
            ->group(function() {
                Route::get('/aktif', 'aktif')->name('aktif');
                Route::get('/tidak-aktif', 'tidakAktif')->name('tidak-aktif');
            });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
