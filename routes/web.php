<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('restricted-zone')->middleware('auth')->group(function(){
    Route::get('/', 'TestController@logged');
});

Route::prefix('free-zone')->group(function(){
    Route::get('/', 'TestController@guest');
});

Route::resource('posts', 'PostController');