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

//strona glowna
Route::get("/",[PageController::class,'index'])->name('index');

//strona z lista ksiazek uzytkownika zapisanych w bazie danych
Route::get("/myBooks",[PageController::class,'show'])->name('show');

//routing zapewniajacy wyszukanie nowej listy ksiazek na stronie z podanym haslem
Route::get('/search', [PageController::class, 'search'])->name('search');

//routing zapewniajacy zapisanie ksiazki do bazy danych
Route::get('/books/{id}', [PageController::class, 'store'])->name('store');

//routing zapewnijacy otworzenie informacji o ksiazce ze strony glownej
Route::get('/books/{id}/edit', [PageController::class, 'edit'])->name('edit');

//routing zapewniajacy usuniecie ksiazki o danym id
Route::delete('/books/{id}', [App\Http\Controllers\PageController::class, 'delete']);

// routing zapeniajacy otworzenie informacji o ksiazce ze strony zapisanych ksiazek uzytkownika w bazie danych w tym notatek jego
Route::get("/myBooks/edit/{id}",[PageController::class,'editBook'])->name('editBook');

//routing zapewniajacy zapisanie notatki do bazy danych
Route::put("/myBooks/update/{id}",[PageController::class,'update'])->name('update');

