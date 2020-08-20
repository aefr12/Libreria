<?php

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

Route::get('/', function () {
    return redirect()->route('Libro.index');
});

Route::resource('/Libro', 'BooksController');
Route::resource('/Categoria', 'CategorysController');
Route::get('/eliminarLibro/{id}','BooksController@eliminar')->name('Libro.eliminar');
Route::get('/solicitar','BooksController@solicitar')->name('Libro.solicitar');
Route::post('/prestar','BooksController@prestar')->name('Libro.prestar');
Route::get('/confirmarPrestamo/{id}', 'BooksController@confirmar')->name('Libro.confirmar');