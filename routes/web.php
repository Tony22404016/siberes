<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisUserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisAdminController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;


Route::get('/', [ServiceController::class, 'home'])->name('product.home');
Route::get('/detail/{id}', [ServiceController::class, 'detail'])->name('service.detail');

Route::get('/portal', function () {
    return view('Portal');
});

//User Login Activity
Route::get('/regis', [RegisUserController::class, 'create'])->name('register.form');
Route::post('/regis', [RegisUserController::class, 'store'])->name('register.store');
Route::get('/login', [LoginUserController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginUserController::class, 'login'])->name('login.submit')->middleware('guest');
Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');


//Admin Login Activity
Route::get('/Admin/Regis/Siberes', [RegisAdminController::class, 'create'])->name('admin.register');
Route::post('/Admin/Regis/Siberes', [RegisAdminController::class, 'store'])->name('admin.store');
Route::get('/Admin/Login', [LoginAdminController::class, 'showLoginForm'])->name('LoginAdmin');
Route::post('/Admin/Login', [LoginAdminController::class, 'login'])->name('Login_Admin');


//pengelolaan data service
Route::get('/addProduct', [ServiceController::class, 'create'])->name('product.form');
Route::post('/addProduct', [ServiceController::class, 'store'])->name('service.store');
Route::get('/service/{id}/edit-service', [ServiceController::class, 'edit'])->name('service.edit');
Route::put('/product/{id}', [ServiceController::class, 'update'])->name('service.update');
Route::delete('/product/{destroy}', [ServiceController::class, 'destroy'])->name('service.destroy');


//autentikasi route
Route::middleware(['auth:web'])->group(function () { 
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/{id}', [OrderController::class, 'create'])->name('checkout.form');
});


//autentikasi admin
Route::middleware(['auth:admin'])->group(function(){
    Route::get('/Services', [ServiceController::class, 'index'])->name('service.index');
});
