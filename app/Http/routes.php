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

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('articles', 'ArticlesController');
Route::resource('comments','CommentsController');
Route::get('/getImport','ExcelController@getImport');
Route::post('postImport','ExcelController@postImport');
Route::get('/deleteAll','ExcelController@deleteAll');
Route::get('/getExport','ExcelController@getExport');
