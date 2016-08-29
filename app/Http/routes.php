<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'], function () {
    Route::resource('user','UserController');
    Route::resource('role','RoleController');
    Route::resource('permission','PermissionController');
    Route::resource('setting','SettingController');
    Route::resource('region','RegionController');
    Route::resource('country','CountryController');
    Route::resource('division','DivisionController');
    Route::resource('page','PageController');
    Route::resource('slide','SlideController');
    Route::resource('media','MediaController');
    Route::resource('category','CategoryController');
    Route::resource('article','ArticleController');
});

Route::group(['middleware'=>'auth'], function () {
    Route::get('/api/getvalue/','APIController@getValue');
    Route::get('/api/get-values/','APIController@getValues');
});

Route::auth();

Route::get('/home', 'HomeController@index');
