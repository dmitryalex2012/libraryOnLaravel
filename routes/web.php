<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'BookController@index');
Route::get('book', 'BookController@index')->name('filter');

Auth::routes();
Route::prefix('manage')->middleware('role:superadministrator')->group(function () {
    Route::get('/', 'ManageController@index');
    Route::get('dashboard', 'ManageController@dashboard')->name('manage.dashboard');
    Route::get('books', 'ManageController@books')->name('manage.books');
    Route::get('users', 'ManageController@users')->name('manage.users');
    Route::get('users/edit/{id}', 'ManageController@editUser')->name('manage.editUser');
    Route::post('user/edited', 'ManageController@editedUser')->name('manage.userEdited');
    Route::get('user/add', 'ManageController@userAdd')->name('manage.addUser');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
