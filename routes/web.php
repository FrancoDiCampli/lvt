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
    Route::get('deliveries', 'StudentController@deliveries')->name('student.deliveries');
    Route::get('penddings', 'StudentController@penddings')->name('student.penddings');
    Route::get('deliver/{job}', 'StudentController@deliver')->name('deliver');
    Route::post('deliver', 'StudentController@store')->name('deliver.store');
    Route::put('updateDelivery/{id}','StudentController@updateDelivery')->name('update.delivery');
    Route::get('delivery/{id}','StudentController@show')->name('delivery.show');
    Route::post('add/comment','StudentController@addComment')->name('comment.store');

    //Subjects
    // Teachers
    Route::resource('teachers', 'TeacherController')->except(['create', 'index']);
    Route::get('nuevaTarea/{subject}', 'TeacherController@nuevaTarea')->name('nuevaTarea');
    Route::get('teacher/create/{subject}', 'TeacherController@create')->name('teacher.create');
    Route::get('teacher/index/{subject}', 'TeacherController@index')->name('teacher.index');
    Route::get('teacher/descargar/{job}', 'TeacherController@descargar')->name('teacher.descargar');
    Route::get('teacher/descargarDelivery/{job}', 'TeacherController@descargarDelivery')->name('teacher.descargarDelivery');
    Route::post('teacher/filtrar', 'TeacherController@filtrar')->name('teacher.filtrar');
    // Ver tarea con su entrega
    Route::get('entrega/{delivery}', 'TeacherController@delivery')->name('teacher.delivery');


    Route::resource('subjects', 'SubjectController');

    //Enrollments
    Route::resource('enrollments', 'EnrollmentController');

    // Jobs
    Route::get('jobs/descargar/{job}', 'StudentController@descargar')->name('jobs.descargar');
});

