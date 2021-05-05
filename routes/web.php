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
    Route::get('users/editing/{id}', 'ManageController@userEditing')->name('manage.userEditing');
    Route::post('user/edited{id}', 'ManageController@userEdited')->name('manage.userEdited');
    Route::get('user/add', 'ManageController@addUser')->name('manage.addUser');
    Route::post('user/added', 'ManageController@userAdded')->name('manage.userAdded');
    Route::get('book/editing/{id}', 'ManageController@bookEditing')->name('manage.bookEditing');
    Route::post('book/edited{id}', 'ManageController@bookEdited')->name('manage.bookEdited');
    Route::get('book/delete/{id}', 'ManageController@deleteBook')->name('manage.deleteBook');
    Route::get('book/add', 'ManageController@addBook')->name('manage.addBook');
    Route::post('book/added', 'ManageController@bookAdded')->name('manage.bookAdded');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('loginSuccessful');
//Route::get('login/successful', 'Auth\LoginController@loginSuccessful')->name('loginSuccessful');
