<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test/index', [TaskController::class, 'index'])->name('task.index');
Route::get('/test/view', [TaskController::class, 'view'])->name('task.view');
Route::post('/test/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::get('/test/create', [TaskController::class, 'showForm'])->name('task.create');
Route::post('/test/delete', [TaskController::class, 'delete'])->name('task.delete');

require __DIR__.'/auth.php';
