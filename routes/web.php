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
Route::get('/', function (Request $request) {
	// if(!$request->has('keyword') || empty($request->keyword) ){
	// 	$posts = App\Post::all();
	// }else{
	// 	$kw = $request->keyword;
	// 	$posts = App\Post::where('title', 'like', "%$kw%")
	// 					->get();
	// }
	// 
	$posts = App\Post::where('author_id', '>', 1)
						->avg('author_id');
	dd($posts);
    
    return view('list-post', [
    				'baiviet' => $posts
				]);
});

Route::get('add-new', function(Request $request){
	$post = new App\Post();
	dd($request->all());
	$post->fill($request->all());
	$post->save();
	return "Thành công!";
});

