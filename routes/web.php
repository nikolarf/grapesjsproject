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

// Route::get('/{id}', function ($id) {

//     return view('index-simple', compact('id'));
// });

Route::get('/', function () {
    return view('index-simple');
});

Route::get('/{user}/{id}', 'TestController@show');

Route::post('/content/store/{id}', 'ContentPageController@store')->name('content.store');
Route::get('/content/load/{id}', 'ContentPageController@load')->name('content.load');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
