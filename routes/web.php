<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiddleController;
use App\Http\Controllers\CommentController;

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

require __DIR__.'/auth.php';



Route::get('/riddles', [RiddleController::class, 'index'])->name('riddles.index');
Route::get('/riddles/create', [RiddleController::class, 'create'])->name('riddles.create');
Route::post('/riddles', [RiddleController::class, 'store'])->name('riddles.store');
Route::get('/riddles/{id}', [RiddleController::class, 'show'])->name('riddles.show');
Route::get('/riddles/{id}/edit', [RiddleController::class, 'edit'])->name('riddles.edit');
Route::put('/riddles/{id}', [RiddleController::class, 'update'])->name('riddles.update');
Route::delete('/riddles/{id}', [RiddleController::class, 'destroy'])->name('riddles.destroy');


Route::post('/riddles/{riddle}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');


