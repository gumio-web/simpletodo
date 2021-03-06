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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return redirect()->route('index');
});

Route::get('todo', 'TodoController@index')->name('index');
Route::post('todo/store', 'TodoController@store')->name('store');
Route::post('todo/update', 'TodoController@update')->name('update');
Route::post('todo/delete', 'TodoController@delete')->name('delete');


