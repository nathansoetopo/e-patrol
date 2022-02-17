<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HRDController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\SatpamController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::middleware('is.admin.api')->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('/',[AdminController::class,'index']);
            Route::get('/accounts',[AdminController::class,'showAllAccounts']);
            Route::get('/{roleName}/accounts',[AdminController::class,'showRoleAccounts']);
            Route::post('/register/hrd',[RegisterController::class,'registerHRD']);
            Route::post('/update/{userID}/hrd',[RegisterController::class,'updateHRD']);
            Route::get('/delete/{userID}/hrd',[RegisterController::class,'destroyHRD']);
            Route::post('/register/satpam',[RegisterController::class,'registerSatpam']);
            Route::post('/update/{userID}/satpam',[RegisterController::class,'updateSatpam']); 
            Route::get('/delete/{userID}/satpam',[RegisterController::class,'destroySatpam']); 
            Route::get('/shift',[ShiftController::class,'index']);
            Route::get('/show/{shiftID}/shift',[ShiftController::class,'show']);
            Route::post('/create/shift',[ShiftController::class,'store']);
            Route::post('/update/{shiftID}/shift',[ShiftController::class,'update']);
            Route::get('/delete/{shiftID}/shift',[ShiftController::class,'destroy']);
            Route::post('/assign/{shiftID}/hrd',[ShiftController::class,'assignHRDToShift']);
            Route::post('/resign/{shiftID}/hrd',[ShiftController::class,'resignHRDFromShift']);
            Route::post('/assign/{shiftID}/satpam',[ShiftController::class,'assignSatpamToShift']);
            Route::post('/resign/{shiftID}/satpam',[ShiftController::class,'resignSatpamFromShift']);
        });
    });
    Route::middleware('is.hrd.api')->group(function(){
        Route::prefix('hrd')->group(function(){
            Route::get('/',[HRDController::class,'index']);
            Route::post('/{shiftID}/presensi',[HRDController::class,'storePresensi']);
            Route::get('delete/{shiftID}/presensi',[HRDController::class,'deletePresensi']);
            Route::get('get/{shiftID}/presensi',[HRDController::class,'showPresensiOnShift']);
            Route::post('/barcode',[HRDController::class,'storeBarcode']);
        });
    });
    Route::middleware('is.satpam.api')->group(function(){
        Route::prefix('satpam')->group(function(){
            Route::get('/',[SatpamController::class,'index']);
            Route::post('/{presensiID}/{shiftID}/presensi',[SatpamController::class,'uploadPresensi']);
            Route::post('/{latitude}/{longitude}/scan',[SatpamController::class,'scanBarcode']);
        });
    });
});
