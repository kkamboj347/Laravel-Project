<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/tasks/create',[TaskController::class,'create'])->name('tasks.create');
Route::post('/tasks',[TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks',[TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}',[TaskController::class,'update'])->name('tasks.update');
Route::delete('/tasks/{task}',[TaskController::class,'destroy'])->name('tasks.destroy');

Route::get('/account/login', [LoginController::class,'login'])->name('auth.login');
Route::get('/account/register',function() {
    return view('auth.register');
});
Route::post('/account/authenticate', [LoginController::class,'authenticate'])->name('account.authenticate');