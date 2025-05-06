<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('register');
});

Route::group(['middleware' => 'auth'],function() {
Route::get('/tasks/create',[TaskController::class,'create'])->name('tasks.create');
Route::post('/tasks',[TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks',[TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}',[TaskController::class,'update'])->name('tasks.update');
Route::delete('/tasks/{task}',[TaskController::class,'destroy'])->name('tasks.destroy');
Route::get('/account/dashboard',[DashboardController::class,'index'])->name('account.dashboard');
Route::get('/account/logout',[LoginController::class,'logout'])->name('account.logout');
});
Route::group(['middleware' => 'guest'],function() {
Route::get('/account/login', [LoginController::class,'login'])->name('account.login');
Route::post('/account/authenticate', [LoginController::class,'authenticate'])->name('account.authenticate');
Route::get('/account/register',[LoginController::class,'register'])->name('account.register');
Route::post('/account/process-register', [LoginController::class,'processRegister'])->name('account.processRegister');
});
