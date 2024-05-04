<?php

use App\Http\Controllers\commentsController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\NewsCategoriesController;
use App\Http\Controllers\newsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [loginController::class, 'showLoginForm']);
Route::get('/news/{id}', [newsController::class, 'getNewsById']);
Route::get('/main',[newsController::class,'index']);
Route::get('/addNew',[newsController::class,'addNew']);
Route::post('/saveNew',[newsController::class,'saveNew']);
Route::get('/login', [loginController::class, 'showLoginForm'])->name('login.showLoginForm');
Route::post('/login/requestLogin', [loginController::class, 'requestLogin'])->name('login.request');
Route::post('/comment/{id}', [commentsController::class, 'addNewComment']);
Route::post('/filterNews', [NewsController::class, 'filterNews'])->name('filterNews');
Route::get('/create-category', [NewsCategoriesController::class, 'getCreateCategoryView'])->name('create.category.view');
Route::post('/create-category', [NewsCategoriesController::class, 'createCategory'])->name('create.category');
