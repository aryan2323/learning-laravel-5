<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('about' ,['middleware' => 'auth' , 'uses'=> 'PageController@about']);
Route::get('contact' , 'PageController@contact');
Route::resource('articles', 'ArticlesController');
Route::get('tags/{tags}', 'TagsController@show');

//Route::get('articles' , 'ArticlesController@index');
//Route::get('articles/create' , 'ArticlesController@create');
//Route::get('articles/{id}' , 'ArticlesController@show');
//Route::post('articles' , 'ArticlesController@store');

//Route::controllers([
//    'auth'=> 'Auth\LoginController',
//    'password' => 'Auth\RegisterController',
//]);

Auth::routes();

Route::get('/home', 'HomeController@index');
