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
Route::get('/', 'PostController@index')->name('homepage');
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

Route::get('add-new', 'PostController@addNew')->name('post.add');
Route::post('add-new', 'PostController@saveAddNew');



