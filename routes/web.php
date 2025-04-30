<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JeniscomplainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\ReviewComplainController;
use App\Http\Controllers\LoginControllerController;
use App\Http\Controllers\LoginAsController;

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

Route::get('/',[LoginAsController::class,'index'])->name('loginas')->Middleware('guest');    
Route::get('/login', [LoginControllerController::class,'login']);
Route::post('/login', [LoginControllerController::class,'authenticate']);
Route::get('/logout', [LoginControllerController::class,'logout']);
    // Route::resource('/home',HomeController::class)->Middleware('auth');
Route::resource('/home',HomeController::class);
Route::resource('/ecomplain',ComplainController::class);
Route::resource('/review-complain',ReviewComplainController::class);
Route::get('/laporan',[LaporanController::class, 'laporan']);
// Route::delete('/review-complain/{id}',[ReviewComplainController::class,'destroy']);





