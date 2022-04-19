<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\HRD\HRDController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataShiftController;
use App\Http\Controllers\DataLokasiController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Satpam\SatpamController;


/* Route::get('/', function () {
    return view('welcome');
}); */
//Semangat Mas Ridwan Sayang

//login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'store']);


//admin
Route::middleware('auth')->group(function () {
    Route::middleware('is.admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'index']);
            Route::post('/', [AdminController::class, 'storePresensi']);
            Route::get('/profile', [ProfileController::class, 'adminProfile']);
            Route::post('/profile/{id}', [ProfileController::class, 'adminUpdate']);
            Route::get('/data-shift', [DataShiftController::class, 'showShiftAdmin']);
            Route::post('/data-shift', [ShiftController::class, 'store']);
            Route::post('/data-shift/{shiftID}/update-data', [ShiftController::class, 'update']);
            Route::get('/data-shift/{shiftID}/update-status', [ShiftController::class, 'updateShiftStatus']);
            Route::get('/data-shift/{shiftID}/delete-data', [ShiftController::class, 'destroy']);
            Route::get('/data-shift/{shiftID}/data-satpam', [ShiftController::class, 'showSatpam']);
            Route::post('/data-shift/{shiftID}/assign-satpam', [ShiftController::class, 'assignSatpamToShift']);
            Route::get('/data-shift/{shiftID}/{satpamID}/resign-satpam', [ShiftController::class, 'resignSatpamFromShift']);
            Route::get('/data-shift/{shiftID}/data-hrd', [ShiftController::class, 'showHRD']);
            Route::post('/data-shift/{shiftID}/assign-hrd', [ShiftController::class, 'assignHRDToShift']);
            Route::get('/data-shift/{shiftID}/{hrdID}/resign-hrd', [ShiftController::class, 'resignHRDFromShift']);
            Route::get('/data-presensi', [PresensiController::class, 'index']);
            Route::post('/data-presensi', [PresensiController::class, 'storePresensi']);
            Route::get('/data-presensi/{presensiID}/update-status', [PresensiController::class, 'updatePresensiStatus']);
            Route::get('/data-presensi/{presensiID}/delete-data', [PresensiController::class, 'deletePresensi']);
            Route::get('/data-presensi/{presensiID}/data-users', [PresensiController::class, 'showUsersByPresensi']);
            Route::get('/data-hrd', [HRDController::class, 'dataHRDAdmin']);
            Route::post('/data-hrd', [RegisterController::class, 'registerHRD']);
            Route::post('/data-hrd/{hrdID}/update-data', [RegisterController::class, 'updateHRD']);
            Route::get('/data-hrd/{hrdID}/update-status', [RegisterController::class, 'updateHRDStatus']);
            Route::get('/data-hrd/{hrdID}/delete-data', [RegisterController::class, 'destroyHRD']);
            Route::get('/data-satpam', [SatpamController::class, 'dataSatpamAdmin']);
            Route::post('/data-satpam', [RegisterController::class, 'registerSatpam']);
            Route::post('/data-satpam/{shiftID}/update-data', [RegisterController::class, 'updateSatpam']);
            Route::get('/data-satpam/{shiftID}/update-status', [RegisterController::class, 'updateSatpamStatus']);
            Route::get('/data-satpam/{shiftID}/delete-data', [RegisterController::class, 'destroySatpam']);
            Route::get('/data-lokasi', [DataLokasiController::class, 'dataLokasiAdmin']);
            Route::post('/data-lokasi', [DataLokasiController::class, 'storeBarcode']);
            Route::post('/data-lokasi/{lokasiID}/update-data', [DataLokasiController::class, 'updateBarcode']);
            Route::get('/data-lokasi/{lokasiID}/update-status', [DataLokasiController::class, 'updateBarcodeStatus']);
            Route::get('/data-lokasi/{lokasiID}/delete-data', [DataLokasiController::class, 'deleteBarcode']);
            Route::get('/data-lokasi/{lokasiID}/download-barcode', [DataLokasiController::class, 'downloadBarcode']);
            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        });
    });

    //hrd
    Route::middleware('is.hrd')->group(function () {
        Route::prefix('hrd')->group(function () {
            Route::get('/', [HRDController::class, 'index']);
            Route::post('/', [HRDController::class, 'storePresensi']);
            Route::get('/profile', [ProfileController::class, 'hrdProfile']);
            Route::post('/update-profile-hrd', [ProfileController::class, 'StoreProfileHrd']);
            Route::get('/data-shift', [DataShiftController::class, 'showShiftHRD']);
            Route::get('/data-shift/{shiftID}/update-status', [ShiftController::class, 'updateShiftStatus']);
            Route::get('/data-shift/{shiftID}/data-satpam', [DataShiftController::class, 'showSatpam']);
            Route::post('/data-shift/{shiftID}/assign-satpam', [ShiftController::class, 'assignSatpamToShift']);
            Route::get('/data-shift/{shiftID}/{satpamID}/resign-satpam', [ShiftController::class, 'resignSatpamFromShift']);
            Route::get('/data-presensi', [PresensiController::class, 'indexHRD']);
            Route::get('/data-presensi/pdf', [PresensiController::class, 'CreatePDF']);
            Route::post('/data-presensi', [PresensiController::class, 'storePresensi']);
            Route::get('/data-presensi/{presensiID}/update-status', [PresensiController::class, 'updatePresensiStatus']);
            Route::get('/data-presensi/{presensiID}/delete-data', [PresensiController::class, 'deletePresensi']);
            Route::get('/data-presensi/{presensiID}/data-users', [PresensiController::class, 'showUsersByPresensi']);
            Route::get('/data-satpam', [SatpamController::class, 'dataSatpamHRD']);
            Route::post('/data-satpam', [RegisterController::class, 'registerSatpam']);
            Route::post('/data-satpam/{shiftID}/update-data', [RegisterController::class, 'updateSatpam']);
            Route::get('/data-satpam/{shiftID}/update-status', [RegisterController::class, 'updateSatpamStatus']);
            Route::get('/data-satpam/{shiftID}/delete-data', [RegisterController::class, 'destroySatpam']);
            Route::get('/data-lokasi', [DataLokasiController::class, 'dataLokasiHRD']);
            Route::post('/data-lokasi', [DataLokasiController::class, 'storeBarcode']);
            Route::post('/data-lokasi/{lokasiID}/update-data', [DataLokasiController::class, 'updateBarcode']);
            Route::get('/data-lokasi/{lokasiID}/update-status', [DataLokasiController::class, 'updateBarcodeStatus']);
            Route::get('/data-lokasi/{lokasiID}/delete-data', [DataLokasiController::class, 'deleteBarcode']);
            Route::get('/data-lokasi/{lokasiID}/download-barcode', [DataLokasiController::class, 'downloadBarcode']);
            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


            // Route::post('add-shift',[DataShiftController::class])
        });
    });

    //satpam
    Route::middleware('is.satpam')->group(function () {
        Route::prefix('satpam')->group(function () {
            Route::get('/', [SatpamController::class, 'index']);
            Route::get('/profile', [ProfileController::class, 'satpamProfile']);
            Route::post('/update-profile-satpam', [ProfileController::class, 'StoreProfileSatpam']);
            Route::get('/scan', [SatpamController::class, 'indexScanBarcode']);
            Route::get('/laporan', [SatpamController::class, 'showPresensi']);
            Route::get('/laporan/{presensiID}/detail', [SatpamController::class, 'reportSatpam']);
            Route::post('/laporan/{presensiID}/upload', [SatpamController::class, 'uploadPresensi']);
            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        });
    });
});
