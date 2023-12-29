<?php

use App\Models\CourseMaterial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\CourseMaterialController;

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


Route::resource('courses', CourseController::class,);

Route::prefix('{course}')->group(function () {
    Route::resource('course_materials', CourseMaterialController::class);
});

Route::get('/categories', [BookCategoryController::class, 'index'])->name('category.index');


Route::middleware('auth')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('book.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/books/create', [BookController::class, 'store'])->name('books.store');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.delete');
});
Route::middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/categories', [BookCategoryController::class, 'index'])->name('category.index');
    Route::delete('/categories/{id}', [BookCategoryController::class, 'destroy'])->name('category.delete');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
