<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('landing');
});
Route::get("/dashboard", [HomeController::class, "home"])->name("home")->middleware("auth");
Route::get("/login", [LoginController::class, "show"])->name("login");
Route::get("/register", [RegisterController::class, "show"])->name("register");
Route::post("/registerUser", [RegisterController::class, "register"])->name("registerUser");
Route::post("/authenticate", [LoginController::class, "authenticate"])->name("authUser");

Route::post("/logout", [LoginController::class, "logout"])->name('logout');
