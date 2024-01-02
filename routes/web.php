<?php

use App\Http\Controllers\Auth\ProviderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookCategoryController;

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

Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/books/export', [BookController::class, 'exportExcel'])->name('books.export');
    Route::get('/books', [BookController::class, 'index'])->name('book.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/books/create', [BookController::class, 'store'])->name('books.store');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.delete');
    Route::get('/books/edit/{slug}', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
    Route::get('/books/{slug}', [BookController::class, 'show'])->name('books.show');
});
Route::middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/categories', [BookCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [BookCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [BookCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}', [BookCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [BookCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [BookCategoryController::class, 'destroy'])->name('categories.delete');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
