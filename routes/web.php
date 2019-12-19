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

//user
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/game', 'StaticPagesController@game')->name('game');
Route::get('/music', 'StaticPagesController@music')->name('music');
Route::get('/picture', 'StaticPagesController@picture')->name('picture');
Route::get('/tool', 'StaticPagesController@tool')->name('tool');

//用户资源路由
Route::resource('users', 'UsersController');
Route::get('users/{user}/projects', 'UsersController@projects')->name('users.projects');


//登陆状态路由
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

//项目资源路由
Route::resource('projects', 'ProjectsController');

//产品资源路由
Route::resource('products', 'ProductsController');

//评论资源路由
Route::resource('comments', 'CommentsController');

Route::resource('follows', 'FollowsController');
Route::get('follows/{user}/store', 'FollowsController@store')->name('follows.store');
Route::get('follows/{user}/destroy', 'FollowsController@destroy')->name('follows.destroy');

Route::get('followers/{user}', 'FollowsController@followers')->name('follows.followers');
Route::get('followings/{user}', 'FollowsController@followings')->name('follows.followings');