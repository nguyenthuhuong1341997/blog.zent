<?php

use Illuminate\Http\Request;

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
// Route::get('/welcome', function () {
// 	$phone = \App\User::find(1)->phone;
// 	dd($phone);
	// $tag= \App\Tag::find(1);
	// dd($tag->posts);
    //return view('welcome');

    // $user \App\User::select('users.*', 'phones.mobile')->join('phones', 'users.id','=','phones.user_id')->where
// });
// Route::get('/', function () {
//     return view('master');
// });

Route::get('crop-image', 'ImageController@index');

Route::post('crop-image', ['as'=>'upload.image','uses'=>'ImageController@uploadImage']);

Route::get('/', function () {
	 // $user= App\User::find(1)->delete();
    $user= App\User::withTrashed()->restore();
    echo "ok";
});

Route::post('upload',function(Request $request){
	foreach ($request->image as $key => $images) {
		# code...
		$path= $images->store('imagess');
		echo $path;
		// dd($path);
	}
	
});
// Route::post('upload',function(Request $request){
// 	Storage::delete('imagess/LXvnfmrdNYcoHV7KSipUd4YXN5cfdLSb2shor8mU.jpeg');
	
// });
// Route::get('/about', function () {

//     return view('layouts/about');
// });

// Route::get('/home1column', function () {
	
//     return view('layouts/home1column');
// });
// Route::get('',function(){
// 	return view('welcome');
// })->middleware('checkage');

// Route::middleware('checkage')->group(function(){
	// Route::get('/home', 'HomeController@index')->name('home');
// });

// Route::get('/index', 'HomeController@index');
// Auth::routes();


Auth::routes();

Route::prefix('admin')->group(function(){
	
	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login');
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');

	// Registration Routes...
	Route::get('register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('register', 'Admin\RegisterController@register');

	// Password Reset Routes...
	Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset', 'Admin\ResetPasswordController@reset');

Route::middleware('admin.auth')->group(function(){
	Route::get('/dashboard', function () {

    return view('welcome');
});

});
		// Route::middleware('auth')->group(function(){
		// Route::prefix('admin')->group(function(){
		//domain/admin/home
		// Route::get('/dashboard', 'HomeController@index')->name('home');
		// Route::get('/xxx','HomeController@getList')->name('admin.user');
		// Route::resource('usersxx','HomeController');
		// Route::post('dashboard','HomeController@store');
		// Route::get('/dashboard/show/{id}','HomeController@show');
		// Route::post('/dashboard/update/{id}','HomeController@update');

		// Route::get('/posts', 'PostController@index')->name('posts');
		
		// Route::get('/postlist','PostController@getList');
		// Route::resource('postResource','PostController');
		// Route::post('posts','PostController@store');
		// Route::get('/posts/show/{id}','PostController@show');
		// Route::put('pots/{id}','PostController@update');

		// Route::get('/categories', 'CategoryController@index')->name('categories');
		// Route::get('/category/show/{id}','CategoryController@show');
		// Route::get('/categorylist','CategoryController@getList');
		// Route::resource('categoryResource','CategoryController');
		// Route::post('categories','CategoryController@store');
	// });
	// });
});

