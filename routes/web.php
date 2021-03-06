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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'admin'],function () {
    Route::resource('/admin', 'AdminUserController');
    Route::resource('/subject', 'ManageSubjectController');
    Route::resource('/course', 'ManageCourseController');
    Route::resource('/student','ManageStudentController');
    Route::get('/users', 'AdminUserController@showUsers');
    Route::get('/users/get_datatable','AdminUserController@get_datatable');
});