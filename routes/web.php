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

//  Route::get('/', function () {
//      return view('welcome');
//  });
Auth::routes();

Route::get('/', function () {
	if (Auth::check()) {
		return redirect('/home');
	}

    return view('auth.login');
});

Route::get('/login', function () {
	if (Auth::check()) {
		return redirect('/home');
	}

    return view('auth.login');
})->name('login');

// login control
Route::post('/auth/check', 'MsdsLoginController@authenticate')->name('login.check');
Route::post('/auth/logout', 'MsdsLoginController@logout')->name('logout');

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('compare/{first?}/{second?}', 'MsdsController@compare');