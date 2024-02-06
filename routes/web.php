<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

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

Route::get('/comments', [CommentController::class, 'index'])->name('comment.index');

Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register-process', [AuthController::class, 'register'])->name('register.process');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login-process', [AuthController::class, 'login'])->name('login.process');

    Route::get('/forgot', [AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot-process', [AuthController::class, 'forgot'])->name('forgot.process');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('comment/create', [CommentController::class, 'create'])->name('comment.create');
    Route::post('comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('comment/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::patch('comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('comment/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');
});
