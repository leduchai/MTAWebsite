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
Route::get('san-pham.html','Client\HomeController@category')->name('product');
Route::get('khach-hang.html','Client\HomeController@customer')->name('customer');
Route::get('tin-tuc.html','Client\HomeController@post')->name('post');
Route::get('lien-he.html','ContactController@contact')->name('contact');
Route::get('contact/list','ContactController@index')->name('contact.list');
Route::post('contact/save','ContactController@save')->name('contact.save');
Route::get('contact/remove/{id}', 
				'ContactController@remove')->name('contact.remove');
Route::get('gio-hang','client\CartController@index')->name('cart');
Route::post('them-gio-hang','client\CartController@addCart')->name('addCart');
Route::get('gio-hang/{id}','client\CartController@removeCart')->name('cart.remove');
Route::get('xoa','client\CartController@remove')->name('cart.removeall');
Route::post('gio-hang/cap-nhat','client\CartController@updateCart')->name('cart.update');
Route::post('save','Admin\OrderController@save')->name('order.save');
Auth::routes();

Route::get('{slug1}/{slug2?}', 'Client\HomeController@getContent');

