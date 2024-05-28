<?php

use App\Http\Controllers\Autentikasi\AuthController;
use App\Http\Controllers\Dashboard\Account\UserAccountController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\Pembayaran\PembayaranController as PembayaranPembayaranController;
use App\Http\Controllers\Dashboard\Pendaftaran\PendaftaranController;
use App\Http\Controllers\Dashboard\Profile\ProfileController;
use App\Http\Controllers\Siswa\Home\HomeController as HomeHomeController;
use App\Http\Controllers\Siswa\Kta\KtaSiswaController;
use App\Http\Controllers\Siswa\Pembayaran\PembayaranController;
use App\Http\Controllers\Siswa\Pendaftaran\PendaftaranController as PendaftaranPendaftaranController;
use App\Http\Controllers\Siswa\Profile\ProfileController as ProfileProfileController;
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

//Dashboard
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showForm']);
Route::post('/createregister', [AuthController::class, 'createRegister']);
Route::get('/form', [AuthController::class, 'showForm']);
Route::post('/createform', [AuthController::class, 'createForm']);

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')
        ->middleware('role:admin')
        ->group(function () {
            //Home
            Route::get('/home', [HomeController::class, 'index']);
            Route::post('/home/create', [HomeController::class, 'store']);
            Route::get('/home/edit/{id}', [HomeController::class, 'edit']);
            Route::post('/home/update/{id}', [HomeController::class, 'update']);
            Route::delete('/home/destroy/{id}', [HomeController::class, 'destroy']);

            //Account User
            Route::get('/account', [UserAccountController::class, 'index']);
            Route::post('/account/create', [UserAccountController::class, 'store']);
            Route::get('/account/edit/{id}', [UserAccountController::class, 'edit']);
            Route::post('/account/update/{id}', [UserAccountController::class, 'update']);
            Route::delete('/account/destroy/{id}', [UserAccountController::class, 'destroy']);
            Route::post('/account/changepassword/{id}', [UserAccountController::class, 'ubahpassword'])->name('change');

            //Pendaftaran
            Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
            Route::post('/pendaftaran/create', [PendaftaranController::class, 'store']);
            Route::get('/pendaftaran/edit/{id}', [PendaftaranController::class, 'edit']);
            Route::post('/pendaftaran/update/{id}', [PendaftaranController::class, 'update']);
            Route::delete('/pendaftaran/destroy/{id}', [PendaftaranController::class, 'destroy']);
            Route::post('/pendaftaran/update/status/{id}', [PendaftaranController::class, 'updatestatus']);
            Route::get('/pendaftaran/export', [PendaftaranController::class, 'exportExcel']);
            Route::post('/pendaftaran/import', [PendaftaranController::class, 'importExcel']);

            //Profile
            Route::get('/profile', [ProfileController::class, 'index']);
            Route::post('/profile/create', [ProfileController::class, 'store']);
            Route::get('/profile/edit/{id}', [ProfileController::class, 'edit']);
            Route::post('/profile/update/{id}', [ProfileController::class, 'update']);
            Route::delete('/profile/destroy/{id}', [ProfileController::class, 'destroy']);

            //Data Pembayaran
            Route::get('/pembayaran', [PembayaranPembayaranController::class, 'index']);
            Route::post('/pembayaran/create', [PembayaranPembayaranController::class, 'store']);
            Route::get('/pembayaran/edit/{id}', [PembayaranPembayaranController::class, 'edit']);
            Route::post('/pembayaran/update/{id}', [PembayaranPembayaranController::class, 'update']);
            Route::delete('/pembayaran/destroy/{id}', [PembayaranPembayaranController::class, 'destroy']);

            //Change Password
            Route::get('/changepassword', [UserAccountController::class, 'indexupdatepassword']);
            Route::post('/changepassword', [UserAccountController::class, 'updatepassword'])->name('changepassword');
        });
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('peserta')
        ->middleware('role:user')
        ->group(function () {
            //Home
            Route::get('/home', [HomeHomeController::class, 'index']);

            //Pendaftaran
            Route::get('/pendaftaran', [PendaftaranPendaftaranController::class, 'index']);
            Route::post('/pendaftaran/create', [PendaftaranPendaftaranController::class, 'store']);

            //pembayaran
            Route::get('/pembayaran', [PembayaranController::class, 'index']);
            Route::post('/pembayaran/create', [PembayaranController::class, 'store']);

            //KTA
            Route::get('/kta', [KtaSiswaController::class, 'index']);

            //Profile
            Route::get('/profile', [ProfileProfileController::class, 'index']);
            Route::post('/profile/create', [ProfileProfileController::class, 'store']);
            Route::get('/profile/edit/{id}', [ProfileProfileController::class, 'edit']);
            Route::post('/profile/update/{id}', [ProfileProfileController::class, 'update']);
            Route::delete('/profile/destroy/{id}', [ProfileProfileController::class, 'destroy']);

            //Change Password
            Route::get('/changepassword', [UserAccountController::class, 'indexupdatepassworduser']);
            Route::post('/changepassword', [UserAccountController::class, 'updatepassworduser'])->name('changepassword-user');
        });
});
