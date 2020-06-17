<?php

use App\Http\Controllers\UserController;
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
Auth::routes();

Route::get('/', function () {
    return view('layouts.master');
    // return view('home');
});

//Profile-Settings
Route::get('/profile', 'UserController@index');
Route::post('/profile', 'UserController@update')->name('profile');

//Main page
Route::get('/home', 'HomeController@index')->name('home');
