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

Route::get('/','HomeController@index');
Route::group(['namespace'=>'Content','prefix'=>'content'],function(){
    Route::get('index','ContentController@index');
    Route::post('test','ContentController@test');
    Route::get('view','ContentController@view');
});
Route::group(['namespace'=>'Excel','prefix'=>'excel'],function($web){
    Route::get('export','ExcelController@ExcelExport');
    Route::get('import','ExcelController@ExcelImport');

});
Route::group(['namespace'=>'Area','prefix'=>'area'],function($web){
    Route::get('/','AreaController@getArea');
});