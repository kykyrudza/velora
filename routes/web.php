<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/about',[HomeController::class,'about'])->name('about');

Route::get('/contacts',[HomeController::class,'contacts'])->name('contacts');

Route::post('/login',[AuthController::class,'login'])->name('login');
