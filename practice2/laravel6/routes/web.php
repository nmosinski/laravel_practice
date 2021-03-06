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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');//->middleware('auth'); @34 #authentication #permission
Route::get('/contact', 'ContactController@show')->name('contact.show');//->middleware('auth'); @34 #authentication #permission
Route::post('/contact', 'ContactController@store')->name('contact.store');//->middleware('auth'); @34 #authentication #permission
