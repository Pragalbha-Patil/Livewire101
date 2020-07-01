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

// Auth::routes();

Route::group(['middleware' => 'guest'], function(){
    Route::livewire('/register', 'register')
        ->layout('layouts.app')
        ->name('register');

    Route::livewire('/login', 'login')
        ->layout('layouts.app')
        ->name('login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/logout', 'HomeController@logout')->name('logout');
});
