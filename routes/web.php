<?php

use App\Http\Controllers\NewsController;
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

Route::get('/account', function () {
    return view('account');
});

Route::get('/create', function () {
    return view('create');
})->name('create');
Route::post('/create', [NewsController::class, 'create'])->name('news.create');

Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/manage', [NewsController::class, 'manage'])->name('news.manage');
Route::prefix('manage')->group(function () {
    Route::delete('/{id}/delete', [NewsController::class, 'delete'])->name('news.delete');
    Route::get('/{id}/edit', [NewsController::class, 'editForm'])->name('news.edit.form');
    Route::post('/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
});
