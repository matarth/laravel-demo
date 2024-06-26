<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [TodoController::class, 'list'])->name('todo.list')->middleware('auth');
Route::get('/add', [TodoController::class, 'edit'])->name('todo.add')->middleware('auth');
Route::post('/add', [TodoController::class, 'create'])->name('todo.add')->middleware('auth');
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit')->middleware('auth');
Route::post('/edit/{id}', [TodoController::class, 'update'])->name('todo.edit')->middleware('auth');
Route::get('/finalize/{id}', [TodoController::class, 'finalizeItem'])->name('todo.finalize')->middleware('auth');
