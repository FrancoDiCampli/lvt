<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('home','AdminController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('courses', 'CourseController');
    Route::get('teacher', 'AdminController@teacher')->name('admin.teacher');
    Route::get('student', 'AdminController@student')->name('admin.student');

    Route::get('deliveries','StudentController@deliveries')->name('student.deliveries');

});
