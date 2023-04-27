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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//CRUD resource routes
Route::resource('libraries', 'LibraryController');
Route::resource('books', 'BookController');

//Routes for books-specific actions (borrow,return)
Route::post('books/{id}/borrow', 'BookController@borrow')->name('books.borrow');
Route::post('books/{id}/return', 'BookController@return')->name('books.return');
