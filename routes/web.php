<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibitController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LandingpageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//login-logout
Route::get('/login', function () {
    return view('login.login');
})->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//endlogin-logout


//route untuk landingpage
Route::get('/', [IndexController::class, 'index']);
Route::resource('/galeri', LandingpageController::class);
Route::resource('/galeriartikel', InformasiController::class);
Route::get('/scan', function () {
    return view('landingpage.scan');
});
Route::get('/detail', function () {
    return view('landingpage.detail');
});
//end rout landingpage


//rout untuk admin dengan authentikasi
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {

    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/bibit', BibitController::class);
    Route::resource('/artikel', ArtikelController::class);
});
//end rout admin

Route::get('/bacasuhu', [SensorController::class, 'bacasuhu']);

Route::get('/bacakelembaban', [SensorController::class, 'bacakelembaban']);

Route::get('/bacatanah', [SensorController::class, 'bacatanah']);

Route::get('/dashboard/simpan/{nilaisuhu}/{nilaikelembaban}/{nilaitanah}', [SensorController::class, 'simpansensor']);