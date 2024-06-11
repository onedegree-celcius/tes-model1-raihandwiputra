<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ListKontrasepsi\ListKontrasepsiController;
use App\Http\Controllers\ListPemakaiKontrasepsi\ListPemakaiKontrasepsiController;
use App\Http\Controllers\ListPropinsi\ListPropinsiController;
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

Route::redirect('/', '/dashboard');

Route::prefix('dashboard')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('', 'index')->name('dashboard');
    });
});

Route::prefix('list-propinsi')->group(function () {
    Route::controller(ListPropinsiController::class)->group(function () {
        Route::get('', 'index')->name('listpropinsi.index');
    });
});

Route::prefix('list-kontrasepsi')->group(function () {
    Route::controller(ListKontrasepsiController::class)->group(function () {
        Route::get('', 'index')->name('listkontrasepsi.index');
    });
});

Route::prefix('list-pemakai-kontrasepsi')->group(function () {
    Route::controller(ListPemakaiKontrasepsiController::class)->group(function () {
        Route::get('export', 'export')->name('listpemakaikontrasepsi.export');
        Route::get('', 'index')->name('listpemakaikontrasepsi.index');
        Route::get('create', 'create')->name('listpemakaikontrasepsi.create');
        Route::post('store', 'store')->name('listpemakaikontrasepsi.store');
    });
});
