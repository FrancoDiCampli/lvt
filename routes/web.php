<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.dashboard');
});

// Route::get('home','AdminController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('courses', 'CourseController');
    Route::get('teacher', 'AdminController@teacher')->name('admin.teacher');
    Route::get('student', 'AdminController@student')->name('admin.student');

    // Students Routes
    Route::get('deliveries','StudentController@deliveries')->name('student.deliveries');
    Route::get('penddings','StudentController@penddings')->name('student.penddings');
    Route::get('deliver/{job}', 'StudentController@deliver')->name('deliver');
    Route::post('deliver', 'StudentController@store')->name('deliver.store');

    //Subjects
    Route::resource('subjects', 'SubjectController');

    //Enrollments
    Route::resource('enrollments', 'EnrollmentController');

    // Jobs
    Route::get('jobs/descargar/{job}', 'StudentController@descargar')->name('jobs.descargar');

});
