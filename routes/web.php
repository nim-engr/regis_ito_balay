<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TaskController::class,'tasklist'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('logout', [ProfileController::class, 'logout'])->name('logout');
Route::get('/add_task', [TaskController::class,'add_task'])->name('add_task');
Route::get('/tasklist', [TaskController::class,'tasklist'])->name('tasklist');
Route::post('/task_save', [TaskController::class,'task_save'])->name('task_save');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::post('/tasks/{id}/take', [TaskController::class, 'takeTask'])->name('tasks.take');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/{id}/duplicate', [TaskController::class, 'duplicate'])->name('tasks.duplicate');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/update-task-status', [TaskController::class, 'updateStatus'])->name('task.updateStatus');

Route::post('/get-comments', [TaskController::class, 'getComments'])->name('get.comments');
Route::post('/save-comment', [TaskController::class, 'saveComment'])->name('save.comment');//save comment

require __DIR__.'/auth.php';
