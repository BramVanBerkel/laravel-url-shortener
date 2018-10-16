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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/urls', 'UrlController@view')->name('urls');
    Route::get('/edit/{id}', 'UrlController@edit')->name('edit');
    Route::post('/update', 'UrlController@update')->name('update');
    Route::post('/remove', 'UrlController@remove')->name('remove');
});
Route::post('/new', 'UrlController@create')->name('new');

Route::get('/u/{short}', 'RedirectController@redirect');

Auth::routes();