<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PersonalInfoController;


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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::post('/patientlist', [ListController::class, 'searchquery'])->name('meklesana');

Route::get('/patientinfo', [InfoController::class, 'getPatientInfo'])->name('pacientainfo');

Route::get('/personal-info', [PersonalInfoController::class, 'showPersonalInfo'])->name('personal.info');

Route::get('/overview', [OverviewController::class, 'index'])->name('home');

Route::get('/logout', function () {
    return redirect()->route('login', ['logout' => 1]);
});

