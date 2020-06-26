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
}) ->name('index');

//create auth and home page by install laravel ui and db migrate
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//In the Page Controller, add named routes to simplify calling
Route::get('/about','PageController@about')->name('about');
Route::get('/contact','PageController@contact')->name('contact');
Route::post('/contact','PageController@submitContact');