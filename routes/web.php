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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/task/index', [TaskController::class, 'index'])->name('task.index');
Route::get('/task/view', [TaskController::class, 'view'])->name('task.view');
Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');

Route::get('/task/{id}', [TaskController::class, 'show']);
Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/task/update/{id}', [TaskController::class, 'update'])->name('task.update');
Route::post('/task/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');


require __DIR__.'/auth.php';
