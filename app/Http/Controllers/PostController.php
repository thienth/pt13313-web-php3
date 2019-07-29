<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
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

    public function saveAddNew(Request $request){
        $validateData = $request->validate([
            'title' => [
                'required',
                Rule::unique('posts'),
            ],
            'image' => 'required|file|mimes:jpeg,png',
            'publish_date' => 'required|date|after:'.Carbon::now()->subDay()->format('Y-m-d')
        ],
        [
            'title.required' => 'Vui lòng điền dữ liệu cho tiêu đề',
            'title.unique' => 'Tiêu đề đã tồn tại, vui lòng chọn tiêu đề khác'
        ]);

    	$model = new Post();
    	$model->fill($request->all());
    	// dd($model);
    	$model->save();
    	return redirect(route('homepage'));
    }

}
