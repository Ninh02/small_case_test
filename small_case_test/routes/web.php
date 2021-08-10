<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard');
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/userLogin',[LoginController::class,'userLogin'])->name('user.login');
Route::get('/registration',[LoginController::class,'registration'])->name('registration');
Route::post('/userRegistration',[LoginController::class,'userRegistration'])->name('user.registration');
Route::get('/logOut',[LoginController::class,'logOut'])->name('logOut');

Route::prefix('/categories')->group(function (){
    Route::get('/',[CategoryController::class,'index'])->name('category.index');
    Route::get('/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/create',[CategoryController::class,'store'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/edit/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
});
Route::prefix('/books')->group(function (){
    Route::get('/',[BookController::class,'index'])->name('books.index');
    Route::get('/create',[BookController::class,'create'])->name('books.create');
    Route::post('/create',[BookController::class,'store'])->name('books.store');
    Route::get('/edit/{id}',[BookController::class,'edit'])->name('books.edit');
    Route::post('/edit/{id}',[BookController::class,'update'])->name('books.update');
    Route::get('/delete/{id}',[BookController::class,'delete'])->name('books.delete');
    Route::get('/category/{id}',[BookController::class,'showBooks'])->name('bookOfCategory.showBooks');
});
