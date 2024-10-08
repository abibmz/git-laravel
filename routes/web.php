<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('test/harga', function () {
    return view('test/harga');
});
Route::get('test/profile', function () {
    return view('test/profile');
});
Route::get('test/sidebar', function () {
    return view('test/sidebar');
});
Route::get('test/content', function () {
    return view('test/content');
});
Route::get('test/daftar', function () {
    return view('test/daftar');
});
Route::get('test/header', function () {
    return view('test/header');
});
Route::get('test/footer', function () {
    return view('test/footer');
});
Route::resource('siswa', siswaController::class);

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register',  [RegisterController::class, 'store'])->name('register.store');

Route::get('/login',  [LoginController::class, 'index'])->name('login.index');
Route::post('/login',  [LoginController::class, 'check_login'])->name('login.check_login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/logout', [DashboardController::class, 'logout'])->name('dashboard.logout');


