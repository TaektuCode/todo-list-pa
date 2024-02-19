<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\TasksController; 


Route::get('/', [TasksController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{todo}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
Route::patch('/tasks/{todo}', [TasksController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{todo}', [TasksController::class, 'destroy'])->name('tasks.destroy');
Route::patch('/tasks/{id}', [TasksController::class, 'update']);

