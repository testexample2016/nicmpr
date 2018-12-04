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
    return view('auth/login');
});



// Route::get('admin', 'AdminController@index' );

// Route::get('admin/create', 'AdminController@create' );

// Route::get('admin/{id}', 'AdminController@show' );

// Route::post('admin', 'AdminController@store' );


Route::get('/admin/dashboard', 'AdminController@getDashboard')->middleware('auth');


Route::resource('admin', 'AdminController')->middleware('admin');

Route::resource('project', 'ProjectController')->middleware('admin');


// Route::get('ajax',function(){
//    return view('param.message');
// });

// Route::post('getmsg','ParamController@ajaxtest');


Route::resource('param', 'ParamController')->middleware('admin');;

Route::resource('employee', 'EmployeeController');

Route::get('createOptional/{id}', 'OptionalController@createOptional');

Route::post('storeOptional', 'OptionalController@storeOptional');

Route::get('createInauguration/{id}', 'InaugurationController@createInauguration');

Route::post('storeInauguration', 'InaugurationController@storeInauguration');

Route::get('createTraining/{id}', 'TrainingController@createTraining');

Route::post('storeTraining', 'TrainingController@storeTraining');

Route::get('createAward/{id}', 'AwardController@createAward');

Route::post('storeAward', 'AwardController@storeAward');

Route::get('final/{id}', 'EmployeeController@finalSubmit');

Route::get('progress/{id}', 'EmployeeController@createProgress');

Route::get('adminindex/{id}', 'EmployeeController@adminindex');

Route::get('mprduration', 'MprdurationController@index');

Route::post('mprduration', 'MprdurationController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

