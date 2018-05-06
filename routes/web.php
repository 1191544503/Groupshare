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
Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::patch('/user/{user}', 'UserController@update')->name('user.update');
Route::get('/user/{user}/{team}', 'UserController@showother')->name('user.showother');
Route::get('/user/{user}', 'UserController@show')->name('user.show');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('team','TeamController');
/****message*******/
Route::get('/message/{team}/edit', 'MessageController@edit')->name('message.edit');
Route::patch('/message/{team}', 'MessageController@update')->name('message.update');
Route::delete('/message/{message}/{team}', 'MessageController@destroy')->name('message.destroy');
//Route::resource('message','MessageController');
//Route::resource('users','UsersController');
//Route::get('/users', 'UsersController@index')->name('users.index');
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');
//Route::get('/users/create', 'UsersController@create')->name('users.create');
//Route::post('/users', 'UsersController@store')->name('users.store');
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
//Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
//Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
/*****resources********/
Route::get('/resources/{team}/create', 'ResourceController@create')->name('resources.create');
Route::post('/resources', 'ResourceController@store')->name('resources.store');
Route::get('/resources/{resource}', 'ResourceController@show')->name('resources.show');
Route::get('/resources/{resource}/edit', 'ResourceController@edit')->name('resources.edit');
Route::patch('/resources/{resource}', 'ResourceController@update')->name('resources.update');
Route::delete('/resources/{resource}', 'ResourceController@destroy')->name('resources.destroy');
Route::post('/upload_image', 'ResourceController@uploadImage')->name('resources.upload_image');
Route::post('/team/add','Team_UserController@addteam')->name('team.add');
Route::post('/team/auditteam','Team_UserController@auditteam')->name('team.auditteam');

Route::get('/admins/login','AdminController@login')->name('admins.login');
Route::post('/admins/check','AdminController@check')->name('admins.check');


Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);