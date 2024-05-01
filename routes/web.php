<?php

use App\Http\Controllers\newsController;
use Illuminate\Support\Facades\Route;

Route::get('/',[newsController::class,'index']);
Route::get('/addNew',[newsController::class,'addNew']);
Route::post('/saveNew',[newsController::class,'saveNew']);
