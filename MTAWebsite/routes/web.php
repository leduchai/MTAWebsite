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
use Illuminate\Http\Request;
Route::get('/','client\HomeController@index')->name('home.page');
Route::get('/403-forbidden', function(){
	return view('forbidden');
})->name('403.error');
Route::get('/404-notfound', function(){
	return view('forbidden');
})->name('404.error');
Route::get('/logout', function(){
	Auth::logout();
	return redirect(route('login'));
})->name('logout');
Route::get('/login', function(){
	if(!Auth::viaRemember()){
		return redirect("/admin");
	}
	return view('admin.auth.login');
})->name('login');
Route::get('lien-he.html','ContactController@contact')->name('contact');

Route::post('contact/save','ContactController@save')->name('contact.save');

Route::post('/search','client\HomeController@search')->name('search');
Auth::routes();

Route::get('{slug1}/{slug2?}', 'Client\HomeController@getContent');

