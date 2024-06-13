<?php

use App\Http\Controllers\Autentikasi\AuthController;
use App\Http\Controllers\Dashboard\Account\UserAccountController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\Pembayaran\PembayaranController as PembayaranPembayaranController;
use App\Http\Controllers\Dashboard\Pendaftaran\PendaftaranController;
use App\Http\Controllers\Dashboard\Profile\ProfileController;
use App\Http\Controllers\pengurus\Biodata\BiodataController as BiodataBiodataController;
use App\Http\Controllers\pengurus\Home\HomeController as PengurusHomeHomeController;
use App\Http\Controllers\pengurus\Kta\KtaSiswaController as KtaKtaSiswaController;
use App\Http\Controllers\pengurus\Pembayaran\PembayaranController as PengurusPembayaranPembayaranController;
use App\Http\Controllers\pengurus\Pendaftaran\PendaftaranController as PengurusPendaftaranPendaftaranController;
use App\Http\Controllers\pengurus\Profile\ProfileController as PengurusProfileProfileController;
use App\Http\Controllers\Siswa\Biodata\BiodataController;
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

            Route::get('/cetak-all-kta', [KtaSiswaController::class, 'cetakAllKTA']);
            Route::get('/cetak-kta-peserta/{id}', [KtaSiswaController::class, 'cetakKTAPeserta']);
            Route::get('/cetak-kta-pengurus/{id}', [KtaSiswaController::class, 'cetakKTPPengurus']);

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
            Route::post('/payment', [PembayaranController::class, 'payment']);

            //KTA
            Route::get('/kta', [KtaSiswaController::class, 'index']);

            //Biodata
            Route::get('/biodata', [BiodataController::class, 'index']);
            Route::post('/biodata/create', [BiodataController::class, 'store']);
            Route::get('/biodata/edit/{id}', [BiodataController::class, 'edit']);
            Route::post('/biodata/update/{id}', [BiodataController::class, 'update']);
            Route::delete('/biodata/destroy/{id}', [BiodataController::class, 'destroy']);

            //cetak kta
            Route::get('/cetak-kta', [KtaSiswaController::class, 'cetakKTA']);

            //Profile
            Route::get('/profile', [ProfileProfileController::class, 'index']);
            Route::post('/profile/create', [ProfileProfileController::class, 'store']);
            Route::get('/profile/edit/{id}', [ProfileProfileController::class, 'edit']);
            Route::post('/profile/update/{id}', [ProfileProfileController::class, 'update']);
            Route::delete('/profile/destroy/{id}', [ProfileProfileController::class, 'destroy']);

            Route::post('/orders/shipping-fee', [PembayaranController::class, 'shippingFee']);
            Route::post('/orders/choose-package', [PembayaranController::class, 'checkout']);

            //Change Password
            Route::get('/changepassword', [UserAccountController::class, 'indexupdatepassworduser']);
            Route::post('/changepassword', [UserAccountController::class, 'updatepassworduser'])->name('changepassword-user');
        });
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('pengurus')
        ->middleware('role:pengurus')
        ->group(function () {
            //Home
            Route::get('/home', [PengurusHomeHomeController::class, 'index']);

            //Pendaftaran
            Route::get('/pendaftaran', [PengurusPendaftaranPendaftaranController::class, 'index']);
            Route::post('/pendaftaran/create', [PengurusPendaftaranPendaftaranController::class, 'store']);

            //pembayaran
            Route::get('/pembayaran', [PengurusPembayaranPembayaranController::class, 'index']);
            Route::post('/pembayaran/create', [PengurusPembayaranPembayaranController::class, 'store']);
            Route::post('/payment', [PengurusPembayaranPembayaranController::class, 'payment']);

            //KTA
            Route::get('/kta', [KtaKtaSiswaController::class, 'index']);

            //Biodata
            Route::get('/biodata', [BiodataBiodataController::class, 'index']);
            Route::post('/biodata/create', [BiodataBiodataController::class, 'store']);
            Route::get('/biodata/edit/{id}', [BiodataBiodataController::class, 'edit']);
            Route::post('/biodata/update/{id}', [BiodataBiodataController::class, 'update']);
            Route::delete('/biodata/destroy/{id}', [BiodataBiodataController::class, 'destroy']);

            //cetak kta
            Route::get('/cetak-kta', [KtaKtaSiswaController::class, 'cetakKTA']);

            //Profile
            Route::get('/profile', [PengurusProfileProfileController::class, 'index']);
            Route::post('/profile/create', [PengurusProfileProfileController::class, 'store']);
            Route::get('/profile/edit/{id}', [PengurusProfileProfileController::class, 'edit']);
            Route::post('/profile/update/{id}', [PengurusProfileProfileController::class, 'update']);
            Route::delete('/profile/destroy/{id}', [PengurusProfileProfileController::class, 'destroy']);

            Route::post('/orders/shipping-fee', [PengurusPembayaranPembayaranController::class, 'shippingFee']);
            Route::post('/orders/choose-package', [PengurusPembayaranPembayaranController::class, 'checkout']);

            //Change Password
            Route::get('/changepassword', [UserAccountController::class, 'indexupdatepasswordpengurus']);
            Route::post('/changepassword', [UserAccountController::class, 'updatepasswordpengurus'])->name('changepassword-pengurus');
        });
});

//get kota
Route::get('/get-cities/{province_id}', [KtaSiswaController::class, 'getCities']);
