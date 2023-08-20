<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
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

Route::get('/', [NewsController::class, 'index'])->name('news.index');

Route::get('/account', [UserController::class, 'showAccountForm'])->name('account');
Route::post('/account', [UserController::class, 'update'])->name('account.update');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');
Route::post('/signup', [UserController::class, 'signup'])->name('signup.user');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.user');

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::delete('feedback/{id}/delete', [FeedbackController::class, 'delete'])->name('feedback.delete');

Route::get('/create', function () {
    return view('create');
})->name('create');
Route::post('/create', [NewsController::class, 'create'])->name('news.create');

Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::post('/news/{id}', [FeedbackController::class, 'create'])->name('feedback.create');

Route::get('/manage', [NewsController::class, 'manage'])->name('news.manage');
Route::prefix('manage')->group(function () {
    Route::delete('/{id}/delete', [NewsController::class, 'delete'])->name('news.delete');
    Route::get('/{id}/edit', [NewsController::class, 'editForm'])->name('news.edit.form');
    Route::post('/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
});
