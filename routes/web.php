<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/about',[HomeController::class,'about'])->name('about');

Route::get('/contacts',[HomeController::class,'contacts'])->name('contacts');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile/{id}/user', [UserController::class, 'index'])->name('profile.show');
Route::get('/profile/{id}/user/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::post('/profile/{id}/user/edit', [UserController::class, 'update'])->name('profile.update');
