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



// Route::get('admin', 'AdminController@index' );

// Route::get('admin/create', 'AdminController@create' );

// Route::get('admin/{id}', 'AdminController@show' );

// Route::post('admin', 'AdminController@store' );


Route::get('/admin/dashboard', 'AdminController@getDashboard');


Route::resource('admin', 'AdminController');

Route::resource('project', 'ProjectController');


// Route::get('ajax',function(){
//    return view('param.message');
// });

// Route::post('getmsg','ParamController@ajaxtest');


Route::resource('param', 'ParamController');

Route::resource('employee', 'EmployeeController');

Route::get('progress/{id}', 'EmployeeController@createProgress');







