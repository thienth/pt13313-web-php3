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
Route::get('/', 'PostController@index');

Route::get('add-new', function(Request $request){
	$post = new App\Post();
	dd($request->all());
	$post->fill($request->all());
	$post->save();
	return "Thành công!";
});



