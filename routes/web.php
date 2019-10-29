<?php

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
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


    Route::get('/', 'HomeController@index')->name('dashboard');
   
    Route::get('/students','StudentController@index')->name('students.index');
    Route::get('/students/create','StudentController@create')->name('students.create');
    Route::get('/students/edit/{id}','StudentController@edit');
    Route::post('/student','StudentController@store');
    Route::put('/student','StudentController@update');
    Route::delete('/student/{id}','StudentController@destroy');
    //Route::resource('/student','StudentController');

    Route::get('/professors','ProfessorController@index')->name('professors.index');
    Route::get('/professors/create','ProfessorController@create')->name('professors.create');
    Route::get('/professors/edit/{id}','ProfessorController@edit');
    Route::post('/professor','ProfessorController@store');
    Route::put('/professor','ProfessorController@update');
    Route::delete('/professor/{id}','ProfessorController@destroy');

    Route::get('/courses','CourseController@index')->name('courses.index');
    Route::get('/courses/create','CourseController@create')->name('courses.create');
    Route::get('/courses/edit/{id}','CourseController@edit');
    Route::post('/course','CourseController@store');
    Route::put('/course','CourseController@update');
    Route::delete('/course/{id}','CourseController@destroy');

    Route::get('/assignments','AssignmentController@index')->name('assignments.index');
    Route::get('/assignments/{course}','AssignmentController@assignment');
    Route::get('/assignment/{ids}','AssignmentController@store');
    Route::delete('/assignment/{id}/{course}','AssignmentController@destroy');

    Route::get('/scores','ScoreController@index')->name('scores.index');
    Route::get('/scores/{course}','ScoreController@score');
    
    Route::get('/score','ScoreController@show')->name('show_scores');
    Route::get('/score/detail/{course}','ScoreController@show_detail');

    Route::get('/score/averages','ScoreController@course')->name('averages');
    Route::get('/score/averages/{course}','ScoreController@averages');
    
    Route::get('/score/{u1}/{u2}/{u3}/{u4}','ScoreController@store');
    Route::delete('/score/{id}/{course}','ScoreController@destroy');
