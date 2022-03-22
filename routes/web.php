<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HRD\HRDController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataShiftController;
use App\Http\Controllers\DataLokasiController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Satpam\SatpamController;


/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'store']);
Route::middleware('auth')->group(function () {
    Route::middleware('is.admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'index']);
            Route::post('/',[AdminController::class,'storePresensi']);
            Route::get('/profile', [ProfileController::class, 'adminProfile']);
            Route::get('/data-shift', [DataShiftController::class, 'showShiftAdmin']);
            Route::get('/data-satpam', [SatpamController::class, 'dataSatpamAdmin']);
            Route::get('/data-lokasi', [DataLokasiController::class, 'dataLokasiAdmin']);
            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        });
    });
    Route::middleware('is.hrd')->group(function () {
        Route::prefix('hrd')->group(function () {
            Route::get('/', [HRDController::class, 'index']);
            Route::get('/profile', [ProfileController::class, 'hrdProfile']);
            Route::get('/data-shift', [DataShiftController::class, 'showShiftHRD']);
            Route::get('/data-satpam', [SatpamController::class, 'dataSatpamHRD']);
            Route::get('/data-lokasi', [DataLokasiController::class, 'dataLokasiHRD']);
            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


            // Route::post('add-shift',[DataShiftController::class])
        });
    });
    Route::middleware('is.satpam')->group(function () {
        Route::prefix('satpam')->group(function () {
            Route::get('/', [SatpamController::class, 'index']);
            Route::get('/profile', [ProfileController::class, 'satpamProfile']);
            Route::get('/scan', [SatpamController::class, 'indexScanBarcode']);
            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        });
    });
});
