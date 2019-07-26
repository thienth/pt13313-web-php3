<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index(Request $request){
    	if(!$request->has('keyword') || empty($request->keyword) ){
			$posts = Post::paginate(5);
		}else{
			$kw = $request->keyword;
			$posts = Post::where('title', 'like', "%$kw%")
							->paginate(5);
			$posts->withPath("?keyword=$kw");
		}
	    return view('list-post', [
	    				'baiviet' => $posts
					]);
    }
    public function addNew(){
    	
    }
}
