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
Route::group(['middleware' => 'auth'], function(){
	Route::get('/', 'PostController@index')
			->name('homepage');
	Route::get('remove-post/{id}', function($id){
		$post = App\Post::find($id);

		DB::beginTransaction();
		try{
			$post->delete();	
			DB::commit();
		}catch(Exception $ex){
			// ghi log
			DB::rollBack();
		}
	});

	Route::get('post/add-new', 'PostController@addNew')->name('post.add');
	Route::post('post/add-new', 'PostController@saveAddNew');

	Route::get('post/edit/{id}', 'PostController@editForm')->name('post.edit');
	Route::post('post/edit/{id}', 'PostController@saveEdit');
});

Route::get('cp-login', 'Auth\LoginController@loginForm')->name('login');
Route::post('cp-login', 'Auth\LoginController@postLogin');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');




