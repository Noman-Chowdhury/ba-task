<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/solution/1',[\App\Http\Controllers\QAController::class,'question1']);
Route::get('/solution/2',[\App\Http\Controllers\QAController::class,'question2']);
Route::get('/solution/3',[\App\Http\Controllers\QAController::class,'question3']);
