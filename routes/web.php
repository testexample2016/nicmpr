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


Route::get('/admin/dashboard', 'AdminController@getDashboard')->middleware('admin','auth');


Route::resource('admin', 'AdminController')->middleware('admin','auth');

Route::resource('project', 'ProjectController')->middleware('admin','auth');


// Route::get('ajax',function(){
//    return view('param.message');
// });

// Route::post('getmsg','ParamController@ajaxtest');


Route::resource('param', 'ParamController')->middleware('auth','admin');

// Route::resource('employee', 'EmployeeController');

Route::get('employee', 'EmployeeController@index')->middleware('auth');

Route::post('employee', 'EmployeeController@store');

Route::get('/changePassword','EmployeeController@showChangePassword')->name('changePassword')->middleware('auth');

Route::post('/changePassword','EmployeeController@changePassword');

Route::get('createOptional/{id}', 'OptionalController@createOptional')->middleware('checkoptional');

Route::post('storeOptional', 'OptionalController@storeOptional');

Route::get('createInauguration/{id}', 'InaugurationController@createInauguration')->middleware('checkoptional');

Route::post('storeInauguration', 'InaugurationController@storeInauguration');

Route::get('createTraining/{id}', 'TrainingController@createTraining')->middleware('checkoptional');

Route::post('storeTraining', 'TrainingController@storeTraining');

Route::get('createAward/{id}', 'AwardController@createAward')->middleware('checkoptional');

Route::post('storeAward', 'AwardController@storeAward');

Route::get('createInitiative/{id}', 'InitiativeController@createInitiative')->middleware('checkoptional');

Route::post('storeInitiative', 'InitiativeController@storeInitiative');

Route::get('createReview/{id}', 'ReviewController@createReview')->middleware('checkoptional');

Route::post('storeReview', 'ReviewController@storeReview');

Route::get('final/{id}', 'EmployeeController@finalSubmit')->middleware('checkoptional');

Route::get('progress/{id}', 'EmployeeController@createProgress')->middleware('auth');

Route::get('adminindex/{id}', 'EmployeeController@adminindex')->middleware('auth','admin');

Route::get('mprduration', 'MprdurationController@index')->middleware('auth');;

Route::post('mprduration', 'MprdurationController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('generate', 'GenerateController@preview')->middleware('auth','admin','isallsubmitted');

Route::get('/downloadPDF','GenerateController@downloadPDF')->middleware('auth','admin','isallsubmitted');

Route::get('dynamic', 'GenerateController@dynamic');

Route::post('dynamic', 'GenerateController@searchPDF');

