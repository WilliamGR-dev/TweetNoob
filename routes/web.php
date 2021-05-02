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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/', [App\Http\Controllers\HomeController::class, 'createPost']);

Route::get('/user', [App\Http\Controllers\HomeController::class, 'showProfile']);

Route::get('/deletepicture', [App\Http\Controllers\HomeController::class, 'deletepicture']);

Route::post('/modifyProfile', [App\Http\Controllers\HomeController::class, 'modifyProfile']);
