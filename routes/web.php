<?php

use App\Http\Controllers\PageController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//->name('index') is used to give a name to the route
//This name can be used to generate a URL to this route
Route::get("/",[PageController::class,'index'])->name('index');
Route::get("/myBooks",[PageController::class,'show'])->name('show');
Route::get('/search', [PageController::class, 'search'])->name('search');
Route::get('/books/{id}', [PageController::class, 'store'])->name('store');
Route::get('/books/{id}/edit', [PageController::class, 'edit'])->name('edit');
Route::delete('/books/{id}', [App\Http\Controllers\PageController::class, 'delete']);
Route::get("/myBooks/edit/{id}",[PageController::class,'editBook'])->name('editBook');
Route::put("/myBooks/edit/{id}",[PageController::class,'update'])->name('update');

