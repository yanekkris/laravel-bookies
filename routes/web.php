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

Route::get('/api/books', 'APIBookController@index');

Route::get('/hello', 'HelloController@index');

//Books routing

Route::get('/books', 'BookController@index')->name('bookz');

Route::get('/books/{book_id}', 'BookController@show')->where('book_id', '[0-9]+');

Route::get('/books/create',         'BookController@create');
Route::post('/books',               'BookController@store');
Route::get('/books/{book_id}/edit', 'BookController@edit');
Route::post('/books/{book_id}',     'BookController@update');


Route::post('/books/{book_id}/add_related_book', 'BookController@addRelatedBook')->name('books.addRelatedBook');
Route::delete('/books/{book_id}/remove_related_book', 'BookController@removeRelatedBook')->name('books.removeRelatedBook');




//Publishers routing

Route::get('/publishers', 'PublisherController@index')->name('publishers.index');

Route::get('/publishers/{publisher_id}', 'PublisherController@show')->where('publisher_id', '[0-9]+');

Route::get('/publishers/create', 'PublisherController@create')->name('publishers.create');
Route::post('/publishers', 'PublisherController@store')->name('publishers.store');
Route::get('/publishers/{id}/edit', 'PublisherController@edit')->name('publishers.edit');
Route::put('/publishers/{id}', 'PublisherController@update')->name('publishers.update');


//Review routing

Route::post('/books/{book_id}/review', 'ReviewController@create')->name('books.create');
Route::get('/books/{book_id}/reviews/{review_id}', 'ReviewController@show');

Route::delete('/reviews/{revies_id}', 'ReviewController@delete')->name('reviews.delete');

Auth::routes();


//Cart routing


Route::get('/cart', 'CartController@index');

Route::post('/add-to-cart', 'CartController@add');


//Authors routing

Route::get('/authors', 'AuthorController@index')->name('authors.index');

//Authentication

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Bookshops routing

Route::get('/bookshops', 'BookshopController@index')->name('bookshops.index');
Route::get('/bookshops/create', 'BookshopController@create')->name('bookshops.create');
Route::post('/bookshops', 'BookshopController@store')->name('bookshops.store');

Route::get('/bookshops/{bookshop_id}', 'BookshopController@show')->name('bookshops.show')->where('bookshop_id', '[0-9]+');

Route::post('/bookshops/{bookshop_id}/add_book', 'BookshopController@addBook')->name('bookshops.addBook');
Route::post('/bookshops/{bookshop_id}/remove_book', 'BookshopController@removeBook')->name('bookshops.removeBook');

Route::post('/bookshops/{book_id}/edit', 'BookshopController@editStock')->name('bookshops.editStock');


//Reservations routing

Route::get('/reservations', 'ReservationController@index')->name('reservations.index');
Route::get('/reservations/create', 'ReservationController@create')->name('reservations.create')->middleware('auth');
Route::post('/reservations', 'ReservationController@store')->name('reservations.store')->middleware('auth');


//upload routing

Route::get('upload', 'UploadController@form');
Route::post('upload', 'UploadContoller@upload');