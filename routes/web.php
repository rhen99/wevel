<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('landing');
});
Route::get("/login", [LoginController::class, "show"])->name("login");
Route::get("/register", [RegisterController::class, "show"])->name("register");
