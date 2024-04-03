<?php

use App\Http\Controllers\Autentikasi\AuthController;
use App\Http\Controllers\Dashboard\Account\UserAccountController;
use App\Http\Controllers\Dashboard\Guru\GuruController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\Jadwal\JadwalPendaftranController;
use App\Http\Controllers\Dashboard\Pendaftaran\PendaftaranController;
use App\Http\Controllers\Dashboard\Profile\ProfileController;
use App\Http\Controllers\Dashboard\Siswa\SiswaController;
use App\Http\Controllers\Dashboard\Spp\SppController;
use App\Http\Controllers\HomeController as ControllersHomeController;
use App\Http\Controllers\PendaftaranController as ControllersPendaftaranController;
use App\Http\Controllers\Siswa\Home\HomeController as HomeHomeController;
use App\Http\Controllers\Siswa\Pendaftaran\PendaftaranController as PendaftaranPendaftaranController;
use App\Models\Pendaftaran\Pendaftaran;
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
            Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
            Route::get('/pendaftaran/terverifikasi', [PendaftaranController::class, 'indexverif']);
            Route::get('/pendaftaran/notverifikasi', [PendaftaranController::class, 'indexnotverif']);
            Route::post('/pendaftaran/create', [PendaftaranController::class, 'store']);
            Route::get('/pendaftaran/edit/{id}', [PendaftaranController::class, 'edit']);
            Route::post('/pendaftaran/update/{id}', [PendaftaranController::class, 'update']);
            Route::delete('/pendaftaran/destroy/{id}', [PendaftaranController::class, 'destroy']);
            Route::post('/pendaftaran/update/status/{id}', [PendaftaranController::class, 'updatestatus']);

            //Profile
            Route::get('/profile', [ProfileController::class, 'index']);
            Route::post('/profile/create', [ProfileController::class, 'store']);
            Route::get('/profile/edit/{id}', [ProfileController::class, 'edit']);
            Route::post('/profile/update/{id}', [ProfileController::class, 'update']);
            Route::delete('/profile/destroy/{id}', [ProfileController::class, 'destroy']);

            //Jadwal Pendaftaran
            Route::get('/jadwal', [JadwalPendaftranController::class, 'index']);
            Route::post('/jadwal/create', [JadwalPendaftranController::class, 'store']);
            Route::get('/jadwal/edit/{id}', [JadwalPendaftranController::class, 'edit']);
            Route::post('/jadwal/update/{id}', [JadwalPendaftranController::class, 'update']);
            Route::delete('/jadwal/destroy/{id}', [JadwalPendaftranController::class, 'destroy']);

            //Data Siswa
            Route::get('/siswa', [SiswaController::class, 'index']);
            Route::post('/siswa/create', [SiswaController::class, 'store']);
            Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
            Route::post('/siswa/update/{id}', [SiswaController::class, 'update']);
            Route::delete('/siswa/destroy/{id}', [SiswaController::class, 'destroy']);
            Route::get('/siswa/export', [SiswaController::class, 'exportExcel']);
            Route::post('/siswa/import', [SiswaController::class, 'importExcel']);

            //Data Guru
            Route::get('/guru', [GuruController::class, 'index']);
            Route::post('/guru/create', [GuruController::class, 'store']);
            Route::get('/guru/edit/{id}', [GuruController::class, 'edit']);
            Route::post('/guru/update/{id}', [GuruController::class, 'update']);
            Route::delete('/guru/destroy/{id}', [GuruController::class, 'destroy']);
            Route::get('/guru/export', [GuruController::class, 'exportExcel']);
            Route::post('/guru/import', [GuruController::class, 'importExcel']);

            //Data Spp
            Route::get('/spp', [SppController::class, 'index']);
            Route::post('/spp/create', [SppController::class, 'store']);
            Route::get('/spp/edit/{id}', [SppController::class, 'edit']);
            Route::post('/spp/update/{id}', [SppController::class, 'update']);
            Route::delete('/spp/destroy/{id}', [SppController::class, 'destroy']);

            //Change Password
            Route::get('/changepassword', [UserAccountController::class, 'indexupdatepassword']);
            Route::post('/changepassword', [UserAccountController::class, 'updatepassword'])->name('changepassword');
        });
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('user')
        ->middleware('role:user')
        ->group(function () {
            //Home
            Route::get('/home', [HomeHomeController::class, 'index']);

            //Pendaftaran
            Route::get('/pendaftaran', [PendaftaranPendaftaranController::class, 'index']);
            Route::post('/pendaftaran/create', [PendaftaranPendaftaranController::class, 'store']);

            //Profile
            Route::get('/profile', [ProfileController::class, 'index']);
            Route::post('/profile/create', [ProfileController::class, 'store']);
            Route::get('/profile/edit/{id}', [ProfileController::class, 'edit']);
            Route::post('/profile/update/{id}', [ProfileController::class, 'update']);
            Route::delete('/profile/destroy/{id}', [ProfileController::class, 'destroy']);

            //Change Password
            Route::get('/changepassword', [UserAccountController::class, 'indexupdatepassword']);
            Route::post('/changepassword', [UserAccountController::class, 'updatepassword'])->name('changepassword');
        });
});
