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
Auth::routes();


Route::get('/', 'MainController@home');
Route::get('/about', 'MainController@about');
Route::get('/contact', 'MainController@contact');
Route::post('/contact', 'MainController@submitContact');


Route::get('/dashboard', 'MainController@dashboard')->middleware('auth');
Route::put('/dashboard/userinfo/{id}', 'MainController@updateUser')->middleware('auth');
Route::put('/dashboard/password/{id}', 'MainController@changePassword')->middleware('auth');
Route::put('/dashboard/avatar/{id}', 'MainController@changeAvatar');

Route::get('/about/biography/create', 'BiographyController@create');
Route::post('/about/biography', 'BiographyController@store');
Route::get('/about/biography/edit', 'BiographyController@edit');
Route::put('/about/biography/{biography}', 'BiographyController@update');

Route::get('/about/job/create', 'JobController@create');
Route::post('/about/job', 'JobController@store');
Route::get('/about/job/{job}/edit', 'JobController@edit');
Route::put('/about/job/{job}', 'JobController@update');
Route::delete('/about/job/{job}', 'JobController@destroy');

Route::get('/about/education/create', 'EducationController@create');
Route::post('/about/education', 'EducationController@store');
Route::get('/about/education/{education}/edit', 'EducationController@edit');
Route::put('/about/education/{education}', 'EducationController@update');
Route::delete('/about/education/{education}', 'EducationController@destroy');

Route::get('/blog', 'ArticleController@index');
Route::get('/blog/articles/create', 'ArticleController@create')->middleware('auth');
Route::get('/blog/articles/{slug}', 'ArticleController@show');
Route::post('/blog/articles', 'ArticleController@store')->middleware('auth');
Route::get('/blog/articles/{article}/edit', 'ArticleController@edit')->middleware('auth');
Route::put('/blog/articles/{article}', 'ArticleController@update')->middleware('auth');
Route::delete('/blog/articles/{article}', 'ArticleController@destroy')->middleware('auth');

Route::post('/blog/tags/', 'TagsController@store');
