<?php

use App\Http\Controllers\AdminSurveiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\RespondController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/survei-user', [AdminSurveiController::class, 'halamanUser'])->name('UsersSurvei');
Route::post('/survei-user', [AdminSurveiController::class, 'store'])->name('login');
Route::get('/', [HomeController::class, 'index']);
Route::resource('/respond', RespondController::class);


Auth::routes();

Route::post('/reset', [RespondController::class, 'reset']);
Route::put('/is_active/{id}', [RespondController::class, 'is_active']);
Route::put('/dis_active/{id}', [RespondController::class, 'dis_active']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin', function () {
    return view('layouts.admin');
})->name('admin');

Route::get('/loginadmin', function () {
    return view('auth.login');
})->name('loginadmin');

Route::get('/halamanadmin', function () {
    return view('halamanadmin');
})->name('halamanadmin');


// Route::get('/halamanadmin', [AdminSurveiController::class, 'halamanAdmin'])->name('halamanadmin'); // Definisi rute untuk halaman admin
Route::get('/adminsurvei', [AdminSurveiController::class, 'halamanAdmin'])->name('adminsurvei');
Route::post('/adminsurvei', [AdminSurveiController::class, 'store'])->name('adminsurvei.store');

Route::resource('/question', QuestionsController::class);
