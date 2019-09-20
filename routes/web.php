<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/admin', 'HomeController@admin')->name('admin');

Route::get('/', 'HomeController@blank')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'RoomsController@free')->name('home.free');

Route::get('/room', 'RoomsController@index')->name('room.index');

Route::post('/room', 'RoomsController@store')->name('room.store');

Route::delete('/room/{id}', 'RoomsController@delete')->name('room.delete');

Route::get('/room/{id}', 'RoomsController@edit')->name('room.edit');

Route::put('/room/{id}/update', 'RoomsController@update')->name('room.update');

Route::get('/myroom/{id}', 'BookingsController@edit')->name('myroom.edit');

Route::post('/myroom/{id}', 'BookingsController@update')->name('myroom.update');
	
Route::post('/myroom/{id}', 'BookingsController@free')->name('myroom.free');

