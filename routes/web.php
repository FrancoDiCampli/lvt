<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('home','AdminController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
