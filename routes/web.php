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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.index');
    });
    Route::resource('user', 'Admin\UserController');
    Route::resource('category', 'Admin\CategoryController');
});

Route::prefix('datatable')->group(function () {
    Route::get('user-datatable', 'Datatable\UserDataTableController@index')->name('datatable.users');
    Route::get('category-datatable', 'Datatable\CategoryDataTableController@index')->name('datatable.category');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/signin', function () {
    return view('Login.login');
});
Route::get('/signup', function () {
    return view('Register.register');
});
