<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.tasklist');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('logout', [ProfileController::class, 'logout'])->name('logout');
Route::get('/add_task', [TaskController::class,'add_task'])->name('add_task');
Route::get('/tasklist', [TaskController::class,'tasklist'])->name('tasklist');
Route::post('/task_save', [TaskController::class,'task_save'])->name('task_save');

require __DIR__.'/auth.php';
