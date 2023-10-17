<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\SubjectController; 
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
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/posts/index', [PostController::class, 'index'])->name('index');
    Route::get('/posts/create/{subject}', [PostController::class, 'create'])->name('create');
    Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('edit');
    Route::get('/posts/select', [SubjectController::class, 'select'])->name('select');
    Route::get('/posts/show/{post}', [PostController::class, 'show'])->name('show');
    Route::post('/posts/like', [PostController::class, 'like'])->name('posts.like');
    
    Route::post('/posts/index', [PostController::class, 'store'])->name('store');
    Route::put('/posts/edit/{post}', [PostController::class, 'update'])->name('update');
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
