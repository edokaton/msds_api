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

use App\Msds;
use App\Pengguna;

//  Route::get('/', function () {
//      return view('welcome');
//  });
Auth::routes();

Route::get('/', function () {
	if (Auth::check()) {
		return redirect('/home');
	}

    return view('view.login');
});

Route::get('/login', function () {
	if (Auth::check()) {
		return redirect('/home');
	}

    return view('view.login');
})->name('login');

// login control
Route::post('/auth/check', 'MsdsLoginController@authenticate')->name('login.check');
Route::post('/auth/logout', 'MsdsLoginController@logout')->name('logout');

// msds controller
Route::middleware(['auth'])->group(function () {
	Route::get('/home', function(){
		$msds = Msds::all();

		return view('read.msds_list', ['msds' => $msds]);
	})->name('home');

	Route::get('msds', function(){
		$msds = Msds::all();

		return view('read.msds_list', ['msds' => $msds]);
	});

	Route::get('msds/create', 'MsdsController@create')->name('msds.create');
	Route::get('msds/edit/{id}', 'MsdsController@edit')->name('msds.edit');
	Route::post('msds/store', 'MsdsController@store')->name('msds.save');
	Route::post('msds/update/{id}', 'MsdsController@update')->name('msds.update');
	Route::post('msds/delete/{id}', 'MsdsController@destroy')->name('msds.destroy');
});

// pengguna controller
Route::middleware(['auth'])->group(function () {
	Route::resource('pengguna', 'PenggunaController');

	// Route::get('pengguna/create', 'PenggunaController@create')->name('pengguna.create');
	// Route::get('pengguna/edit/{id}', 'PenggunaController@edit')->name('pengguna.edit');
	// Route::post('pengguna/store', 'PenggunaController@store')->name('pengguna.save');
	// Route::post('pengguna/update/{id}', 'PenggunaController@update')->name('pengguna.update');
	// Route::post('pengguna/delete/{id}', 'PenggunaController@destroy')->name('pengguna.destroy');
});