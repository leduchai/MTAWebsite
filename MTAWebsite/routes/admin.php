<?php
use Illuminate\Http\Request;
Route::get('/generate-slug-category', function(Request $request){
	$slug = str_slug(trim($request->title), '-');
	$date = date('i');
	$slug1 ="/chuyen-muc/".$slug.".html";
	$result = App\Models\Slug::checkSlugExisted($slug1);
	if($result)
	{
		$slug ="/chuyen-muc/".$slug.'-'.$date.".html";
	}
	else
	{
		$slug =$slug1;
	}
	return response()->json(['data' => $slug]);
})->name('slug.generate.category');
Route::get('/page-generate-slug', function(Request $request){
	$slug = str_slug(trim($request->title), '-');
	$date = date('i');
	$slug1 ='/'.$slug.".html";
	$result = App\Models\Slug::checkSlugExisted($slug1);
	if($result)
	{
		$slug =$slug.'-'.$date.".html";
	}
	else
	{
		$slug =$slug1;
	}
	return response()->json(['data' => $slug]);
})->name('slug.generate.page');
Route::get('/generate-post-slug', function(Request $request){
	$slug = str_slug(trim($request->title), '-');
	$date = date('i');
	$slug1 ="/bai-viet/".$slug.".html";
	$result = App\Models\Slug::checkSlugExisted($slug1);
	if($result)
	{
		$slug ="/bai-viet/".$slug.'-'.$date.".html";
	}
	else
	{
		$slug =$slug1;
	}
	return response()->json(['data' => $slug]);
})->name('slug.generate.post');
Route::group(['middleware' => 'auth'], function(){
	Route::group(['middleware' => 'check-mod'], function(){
		Route::get('/', function(){
			return view('admin.dashboard');
		})->name('admin');
		Route::group(['prefix'=>'profile'],function(){
			Route::get('/', 'Admin\ProfileController@update')->name('profile.form');
			Route::post('/', 'Admin\ProfileController@save')->name('profile.save');
		});
		Route::group(['prefix'=>'user','middleware'=>'check-admin'],function(){
			Route::get('list', 
				'UserController@index')->name('user.list');
			Route::get('create', 
				'UserController@create')->name('user.create');
			Route::post('save', 
				'UserController@save')->name('user.save');
			Route::post('change-role', 
				'UserController@changerole')->name('user.role');
			Route::get('remove/{id}', 
				'UserController@remove')->name('user.remove');
		});
		Route::group(['prefix'=>'category'],function(){
			Route::get('list', 
				'Admin\CateController@index')->name('cate.post.list');
			Route::get('/create', 
				'Admin\CateController@create')->name('cate.post.create');
			Route::get('/edit/{id}', 
				'Admin\CateController@update')->name('cate.post.update');
			Route::post('/save', 
				'Admin\CateController@save')->name('cate.post.save');
			Route::post('/remove', 
				'Admin\CateController@remove')->name('cate.post.remove');
		});
		Route::group(['prefix'=>'post'],function(){
			Route::get('list', 
				'Admin\PostController@index')->name('post.list');
			Route::get('/remove', 
				'Admin\PostController@remove')->name('post.remove');
			Route::get('post/create', 
				'Admin\PostController@create')->name('post.create');
			
			Route::post('/save', 
				'Admin\PostController@save')->name('post.save');
			Route::get('/edit/{id}', 
				'Admin\PostController@update')->name('post.update');
		});
		Route::group(['prefix'=>'page'],function(){
			Route::get('list', 
				'Admin\PageController@index')->name('page.list');

			Route::get('/create', 
				'Admin\PageController@create')->name('page.create');
			Route::get('/edit/{id}', 
				'Admin\PageController@update')->name('page.update');
			Route::post('/save','Admin\PageController@save')->name('page.save');
			Route::post('/remove','Admin\PageController@remove')->name('page.remove');
			Route::get('/delete/{id}','Admin\PageController@delete')->name('page.delete');	
		});

		Route::group(['prefix'=>'banner'],function(){
			Route::get('list', 
				'Admin\BannerController@index')->name('banner.list');
			Route::get('/create', 
				'Admin\BannerController@create')->name('banner.create');
			Route::get('/edit/{id}', 
				'Admin\BannerController@update')->name('banner.update');
			Route::post('/save','Admin\BannerController@save')->name('banner.save');
			Route::get('/remove/{id}','Admin\BannerController@remove')->name('banner.remove');	
		});
				Route::group(['prefix'=>'faculty'],function(){
			Route::get('list', 
				'Admin\FacultyController@index')->name('faculty.list');
			Route::get('/create', 
				'Admin\FacultyController@create')->name('faculty.create');
			Route::get('/edit/{id}', 
				'Admin\FacultyController@update')->name('faculty.update');
			Route::post('/save','Admin\FacultyController@save')->name('faculty.save');
			Route::get('/remove/{id}','Admin\FacultyController@remove')->name('faculty.remove');	
		});
			Route::group(['prefix'=>'contract'],function(){
			Route::get('list', 
				'Admin\ContractController@index')->name('contract.list');
			Route::get('/create', 
				'Admin\ContractController@create')->name('contract.create');
			Route::get('/edit/{id}', 
				'Admin\ContractController@update')->name('contract.update');
			Route::post('/save','Admin\ContractController@save')->name('contract.save');
			Route::get('/remove/{id}','Admin\ContractController@remove')->name('contract.remove');	
		});
		Route::group(['prefix'=>'setting'],function(){

			Route::get('/', 
				'Admin\SettingController@update')->name('setting');
			Route::post('/save','Admin\SettingController@save')->name('setting.save');
			
		});

		Route::group(['prefix'=>'menu'],function(){
			Route::get('list', 
				'Admin\MenuController@index')->name('menu');
			Route::post('/create-page', 
				'Admin\MenuController@createpage')->name('menu.page.create');
			Route::post('/create-product','Admin\MenuController@createproduct')->name('menu.product.create');
			Route::post('/create-post','Admin\MenuController@createpost')->name('menu.post.create');
			Route::get('/edit/{id}', 
				'Admin\MenuController@update')->name('menu.update');
			Route::post('/save','Admin\MenuController@save')->name('menu.save');
			Route::get('/remove/{id}','Admin\MenuController@remove')->name('menu.remove');	
		});
		Route::post('/categ/cms','Admin\AjaxController@cms')->name('category.create');
	});
});
?>