<?php

use App\Course;
use App\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.dashboard');
});

// Route::get('home','AdminController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('allCourses',function(){
    return Course::all();
});

Route::group(['middleware' => 'auth'], function () {

    Route::resource('courses', 'CourseController');
    Route::get('teacher', 'AdminController@teacher')->name('admin.teacher');
    Route::get('student', 'AdminController@student')->name('admin.student');
    Route::get('adviser', 'AdminController@adviser')->name('admin.adviser');

    // Students Routes
    Route::get('deliveries', 'StudentController@deliveries')->name('student.deliveries');
    Route::get('penddings', 'StudentController@penddings')->name('student.penddings');
    Route::get('deliver/{job}', 'StudentController@deliver')->name('deliver');
    Route::post('deliver', 'StudentController@store')->name('deliver.store');
    Route::put('updateDelivery/{id}','StudentController@updateDelivery')->name('update.delivery');
    Route::get('delivery/{id}','StudentController@show')->name('delivery.show');
    Route::post('add/comment','StudentController@addComment')->name('comment.store');

    // Teachers
    Route::resource('teachers', 'TeacherController')->except(['create', 'index']);
    Route::get('teacher/create/{subject}', 'TeacherController@create')->name('teacher.create');
    Route::get('teacher/showJob/{id}', 'TeacherController@showJob')->name('teacher.showJob');
    Route::get('teacher/index/{subject}', 'TeacherController@index')->name('teacher.index');
    Route::get('teacher/descargar/{job}', 'TeacherController@descargar')->name('teacher.descargar');
    Route::get('teacher/descargarDelivery/{job}', 'TeacherController@descargarDelivery')->name('teacher.descargarDelivery');
    Route::post('teacher/filtrar', 'TeacherController@filtrar')->name('teacher.filtrar');
    // Ver tarea con su entrega
    Route::get('entrega/{delivery}', 'TeacherController@delivery')->name('teacher.delivery');

    // Asesores
    Route::get('showJob/{id}','AdviserController@showJob')->name('adviser.showJob');
    Route::put('updateJob/{id}','AdviserController@updateJob')->name('adviser.updateJob');

    Route::resource('subjects', 'SubjectController');

    // Enrollment
    Route::resource('enrollments', 'EnrollmentController');

    // Jobs
    Route::get('jobs/descargar/{job}', 'StudentController@descargar')->name('jobs.descargar');


    // Nuevas Rutas
    Route::get('import','UserController@import')->name('import');
    Route::post('import/users','UserController@importUsers')->name('import.users');

    // Users
    Route::resource('user', 'UserController');

    Route::post('test',function(Request $request){
        return $request;
    });

    Route::resource('posts', 'PostController')->except('create');
    Route::resource('annotations', 'AnnotationController');

    Route::get('newpost/{subject}','PostController@create')->name('new.post');
});

