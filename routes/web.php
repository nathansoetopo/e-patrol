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
use App\Http\Controllers\TestController;
use App\Http\Controllers\AjaxController;


Route::get('/test', function () {
    return view('test.test');
});

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
            Route::post('/update-profile-admin', [ProfileController::class, 'StoreProfileAdmin']);
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
            Route::get('/data-presensi/pdf', [PresensiController::class, 'adminPresPDF']);
            Route::get('/data-presensi/excel', [PresensiController::class, 'excel']);
            Route::get('/data-hrd', [HRDController::class, 'dataHRDAdmin']);
            Route::get('/data-hrd/pdf', [HRDController::class, 'adminHrdPDF']);
            Route::get('/data-hrd/export/', [HRDController::class, 'excel']); //view
            Route::post('/data-hrd', [RegisterController::class, 'registerHRD']);
            Route::post('/data-hrd/{hrdID}/update-data', [RegisterController::class, 'updateHRD']);
            Route::get('/data-hrd/{hrdID}/update-status', [RegisterController::class, 'updateHRDStatus']);
            Route::get('/data-hrd/{hrdID}/delete-data', [RegisterController::class, 'destroyHRD']);
            Route::get('/data-satpam', [SatpamController::class, 'dataSatpamAdmin']);
            Route::post('/data-satpam', [RegisterController::class, 'registerSatpam']);
            Route::post('/data-satpam/{shiftID}/update-data', [RegisterController::class, 'updateSatpam']);
            Route::get('/data-satpam/{shiftID}/update-status', [RegisterController::class, 'updateSatpamStatus']);
            Route::get('/data-satpam/{shiftID}/delete-data', [RegisterController::class, 'destroySatpam']);
            Route::get('/data-satpam/pdf', [SatpamController::class, 'adminSatPDF']);
            Route::get('/data-satpam/excel/', [SatpamController::class, 'excel']);
            Route::get('/data-lokasi', [DataLokasiController::class, 'dataLokasiAdmin']);
            Route::post('/data-lokasi', [DataLokasiController::class, 'storeBarcode']);
            Route::get('/data-lokasi/{barcodeID}/satpam',[PresensiController::class, 'showUsersByLaporan']);
            Route::post('/data-lokasi/{lokasiID}/update-data', [DataLokasiController::class, 'updateBarcode']);
            Route::get('/data-lokasi/{lokasiID}/update-status', [DataLokasiController::class, 'updateBarcodeStatus']);
            Route::get('/data-lokasi/{lokasiID}/delete-data', [DataLokasiController::class, 'deleteBarcode']);
            Route::get('/data-lokasi/{lokasiID}/download-barcode', [DataLokasiController::class, 'downloadBarcode']);
            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
            Route::get('/daftar-lokasi', [DataLokasiController::class, 'showLokasiSuperAdmin']);
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
            Route::get('/data-presensi/pdf', [PresensiController::class, 'hrdPresPDF']);
            Route::post('/data-presensi', [PresensiController::class, 'storePresensi']);
            Route::get('/data-presensi/{presensiID}/update-status', [PresensiController::class, 'updatePresensiStatus']);
            Route::get('/data-presensi/{presensiID}/delete-data', [PresensiController::class, 'deletePresensi']);
            Route::get('/data-presensi/{presensiID}/data-users', [PresensiController::class, 'showUsersByPresensi']);
            Route::get('/data-presensi/pdf', [PresensiController::class, 'hrdPresPDF']);
            Route::get('/data-presensi/excel', [PresensiController::class, 'excel']);
            Route::get('/data-satpam', [SatpamController::class, 'dataSatpamHRD']);
            Route::post('/data-satpam', [RegisterController::class, 'registerSatpam']);
            Route::post('/data-satpam/{shiftID}/update-data', [RegisterController::class, 'updateSatpam']);
            Route::get('/data-satpam/{shiftID}/update-status', [RegisterController::class, 'updateSatpamStatus']);
            Route::get('/data-satpam/{shiftID}/delete-data', [RegisterController::class, 'destroySatpam']);
            Route::get('/data-satpam/pdf', [SatpamController::class, 'hrdSatPDF']);
            Route::get('/data-satpam/excel/', [SatpamController::class, 'excel']);
            Route::get('/data-lokasi', [DataLokasiController::class, 'dataLokasiHRD']);
            Route::post('/data-lokasi', [DataLokasiController::class, 'storeBarcode']);
            Route::get('/data-lokasi/{barcodeID}/satpam',[PresensiController::class, 'showUsersByLaporan']);
            Route::post('/data-lokasi/{lokasiID}/update-data', [DataLokasiController::class, 'updateBarcode']);
            Route::get('/data-lokasi/{lokasiID}/update-status', [DataLokasiController::class, 'updateBarcodeStatus']);
            Route::get('/data-lokasi/{lokasiID}/delete-data', [DataLokasiController::class, 'deleteBarcode']);
            Route::get('/data-lokasi/{lokasiID}/download-barcode', [DataLokasiController::class, 'downloadBarcode']);
            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
            Route::get('/daftar-lokasi', [DataLokasiController::class, 'showLokasi']);
        });
    });

    //satpam
    Route::middleware('is.satpam')->group(function () {
        Route::prefix('satpam')->group(function () {
            Route::get('/', [SatpamController::class, 'index']);
            Route::get('/profile', [ProfileController::class, 'satpamProfile']);
            Route::post('/update-profile-satpam', [ProfileController::class, 'StoreProfileSatpam']);
            Route::get('/scan', [SatpamController::class, 'indexScanBarcode']);
            Route::get('/scan/{barcodeID}/detail', [SatpamController::class, 'uploadLaporanBarcode']);
            Route::post('/scan/{barcodeID}/upload', [SatpamController::class, 'scanBarcode']);
            Route::get('/laporan', [SatpamController::class, 'showPresensi']);
            Route::get('/laporan/{presensiID}/detail', [SatpamController::class, 'reportSatpam']);
            Route::post('/laporan/{presensiID}/upload', [SatpamController::class, 'uploadPresensi']);
            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        });
    });

    //Ajax
    Route::post('search-user', [AjaxController::class, 'SearchUserAdminSide']);
    Route::post('search-hrd', [AjaxController::class, 'SearchHrdAdmin']);
    Route::post('search-satpam', [AjaxController::class, 'SearchSatpamAdmin']);
    Route::post('search-shift', [AjaxController::class, 'SearchShiftAdmin']);
    Route::post('search-lokasi', [AjaxController::class, 'SearchLokasi']);
    Route::post('search-presensi', [AjaxController::class, 'SearchPresensi']);
    //Test
    Route::get('test-map', [TestController::class, 'TestMap']);
    Route::get('test-scanner', [TestController::class, 'TestScanner']);
    Route::get('test-form', [TestController::class, 'TestForm']);
    Route::get('/test-ajax', [TestController::class, 'testAjaxView']);
    Route::post('test-ajax-search', [TestController::class, 'testSearchAjax']);
});
