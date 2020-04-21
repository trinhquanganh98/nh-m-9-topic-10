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
    return view('welcome');
});


Route::get('book_index', 'book_controller@book_index')->name('book_index');

Route::get('book_create', 'book_controller@book_create')->name('book_create');
Route::post('book_create', 'book_controller@book_store')->name('book_store');

Route::get('book_delete/{id}', 'book_controller@book_delete')->name('book_delete');


Route::get('book_find', 'book_controller@book_find')->name('book_find');
Route::post('book_finded', 'book_controller@book_finded')->name('book_finded');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
