<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);

Route::controller(AdminController::class)->group(function () {
    // Route::get('admin', 'index');
    Route::get('panel/dashboard', 'dashboard');

    // Loker
    Route::get('panel/lokerdaftar', 'lokerdaftar');
    Route::get('panel/lokertambah', 'lokertambah');
    Route::post('panel/lokertambahsimpan', 'lokertambahsimpan');
    Route::get('panel/lokeredit/{id}', 'lokeredit');
    Route::post('panel/lokereditsimpan/{id}', 'lokereditsimpan');
    Route::get('panel/lokerhapus/{id}', 'lokerhapus');

    // Beasiswa
    Route::get('panel/beasiswadaftar', 'beasiswadaftar');
    Route::get('panel/beasiswatambah', 'beasiswatambah');
    Route::post('panel/beasiswatambahsimpan', 'beasiswatambahsimpan');
    Route::get('panel/beasiswaedit/{id}', 'beasiswaedit');
    Route::post('panel/beasiswaeditsimpan/{id}', 'beasiswaeditsimpan');
    Route::get('panel/beasiswahapus/{id}', 'beasiswahapus');

    // Lomba
    Route::get('panel/lombadaftar', 'lombadaftar');
    Route::get('panel/lombatambah', 'lombatambah');
    Route::post('panel/lombatambahsimpan', 'lombatambahsimpan');
    Route::get('panel/lombaedit/{id}', 'lombaedit');
    Route::post('panel/lombaeditsimpan/{id}', 'lombaeditsimpan');
    Route::get('panel/lombahapus/{id}', 'lombahapus');

    // profil
    Route::get('panel/profil', 'profil');
    Route::get('panel/profiledit', 'profiledit');
    Route::post('panel/profileditsimpan', 'profileditsimpan');

    Route::get('panel/logout', 'logout');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('loginakun', 'login');
    Route::post('logincek', 'logincek');
    Route::get('lokerdaftar', 'lokerdaftar');
    Route::get('lokerdetail/{id}', 'lokerdetail');
    Route::get('beasiswadaftar', 'beasiswadaftar');
    Route::get('beasiswadetail/{id}', 'beasiswadetail');
    Route::get('lombadaftar', 'lombadaftar');
    Route::get('lombadetail/{id}', 'lombadetail');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
