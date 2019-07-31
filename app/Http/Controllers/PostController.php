<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddFormRequest;

use App\Post;
use App\User;
use App\Category;
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
    	$model = new Post();
    	$authors = User::all();
    	$cates = Category::all();

    	return view('post.add-form', compact('model', 'authors', 'cates'));
    }

    public function saveAddNew(AddFormRequest $request){

    	$model = new Post();
    	$model->fill($request->all());
    	// dd($model);
    	$model->save();
    	return redirect(route('homepage'));
    }

}
