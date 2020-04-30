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


Route::get('/', 'MainController@home');
Route::get('/about', 'MainController@about');
Route::get('/contact', 'MainController@contact');

Route::get('/about/biography/create', 'BiographyController@create');
Route::post('/about/biography', 'BiographyController@store');
Route::get('/about/biography/edit', 'BiographyController@edit');
Route::put('/about/biography/{biography}', 'BiographyController@update');

Route::get('/about/job/create', 'JobController@create');
Route::post('/about/job', 'JobController@store');
Route::get('/about/job/{job}/edit', 'JobController@edit');
Route::put('/about/job/{job}', 'JobController@update');

Route::get('/about/education/create', 'EducationController@create');
Route::post('/about/education', 'EducationController@store');
Route::get('/about/education/{education}/edit', 'EducationController@edit');
Route::put('/about/education/{education}', 'EducationController@update');

Route::get('/blog', 'ArticleController@index');
Route::get('/blog/article/create', 'ArticleController@create');
Route::get('/blog/article/{id}', 'ArticleController@show');
Route::post('/blog/article', 'ArticleController@store');
Route::get('/blog/article/{article}/edit', 'ArticleController@edit');
Route::put('/blog/article/{article}', 'ArticleController@update');
