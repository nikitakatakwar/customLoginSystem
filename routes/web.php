<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/', function () {
    return view('welcome');
});
Route::get('nik', function () {
    return view('nik');
});

Route::get('/login', function () {
    return view('login', ['name' => 'James']);
});
Route::get('/registration',[CustomAuthController::class,'registration']);

Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user')->middleware('admin');

Route::post('/login-user',[CustomAuthController::class,'loginUser'])->middleware(EnsureTokenIsValid::class)->name('login-user');

Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->name('dash');
Route::get('/profile', function () {
    //
})->middleware(EnsureTokenIsValid::class);
