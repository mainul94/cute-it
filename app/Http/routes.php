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
    Route::resource('menu','MenuController');
});

Route::group(['middleware'=>['auth','api']], function () {
    Route::get('/api/getvalue/','APIController@getValue');
    Route::get('/api/get-values/','APIController@getValues');
    Route::delete('/api/delete/','APIController@deleteRecord');
    Route::delete('/api/child-menu/','APIController@deleteChildMenu');
    Route::patch('/api/child-menu/','APIController@updateChildMenu');
    Route::post('/api/child-menu/','APIController@storeChildMenu');
});

Route::auth();

Route::group(['middleware'=>'web'], function () {
    Route::get('map/{region?}','WebController@map');
    Route::get('country/{country}','WebController@country');
    Route::get('page/{page}','WebController@page');
    Route::get('{category}/{article?}','WebController@category');
});


Route::get('/home', 'HomeController@index');
