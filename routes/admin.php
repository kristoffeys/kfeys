<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/admin/overview');
});

Route::get('/overview', 'OverviewController@index');
Route::resource('/posts', 'PostController', ['except' => ['show']]);
Route::resource('/pages', 'PageController');
Route::resource('/categories', 'CategoryController');
