<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@index');
Route::get('index/index', 'IndexController@index');

Route::post('/filter', 'IndexController@filters')->name('filter');
Route::get('/page/{pageNumber}', 'IndexController@pagination')->name('pageNumber');
