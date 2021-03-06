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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
  return view('welcome');
});
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/edit/{id}', 'DashboardController@edit');
Route::post('/dashboard/edit/{id}', 'DashboardController@update');
Route::post('/dashboard/delete/{id}', 'DashboardController@delete');
