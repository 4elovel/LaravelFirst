<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\newsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [loginController::class, 'showLoginForm']);
Route::get('/main',[newsController::class,'index']);
Route::get('/addNew',[newsController::class,'addNew']);
Route::post('/saveNew',[newsController::class,'saveNew']);
Route::get('/login', [loginController::class, 'showLoginForm'])->name('login.showLoginForm');
Route::post('/login/requestLogin', [loginController::class, 'requestLogin'])->name('login.request');
