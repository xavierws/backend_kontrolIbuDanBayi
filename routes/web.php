<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthWebController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('register-nurse', [AuthController::class, 'showRegisterPage']);
Route::post('register-nurse', [AuthController::class, 'registerNurse'])->name('register');

Auth::routes(['register' => false]);

// Route::get('login', [AuthWebController::class, ''])->name('login');
// Route::get('logout', [AuthWebController::class, ''])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/kuis')->group( function (){
    Route::get('/', [DashboardController::class, 'index'])->name('kuis.index');

    Route::get('/{id}', [DashboardController::class, 'show'])->name('kuis.show');

    Route::get('/{id}/add', [DashboardController::class, 'create'])->name('kuis.create');
    Route::post('/{id}/add', [DashboardController::class, 'store'])->name('kuis.store');
    Route::get('/{id}/edit', [DashboardController::class, 'edit'])->name('kuis.edit');
    Route::put('/{id}/edit', [DashboardController::class, 'update'])->name('kuis.update');
    Route::get('/{id}/delete', [DashboardController::class, 'destroy'])->name('kuis.destroy');
});

Route::prefix('/survey')->group(function (){
    Route::get('/', [DashboardController::class, 'indexSurvey'])->name('survey.index');
});



