@extends('layouts.main')
@section('content')
<form action="{{route('post.edit', ['id' => $model->id])}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" value="{{old('title', $model->title)}}" placeholder="Enter title..." class="form-control">
		@if($errors->first('title'))
		<span class="text-danger">{{$errors->first('title')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label>Image</label>
		<input type="file" name="image" value="" class="form-control">
		@if($errors->first('image'))
		<span class="text-danger">{{$errors->first('image')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label>Category</label>
		<select name="category_id" class="form-control">
			@foreach ($cates as $ca)
				<option value="{{$ca->id}}"
					@if($ca->id == $model->category_id)
					selected
					@endif
				>{{$ca->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Author</label>
		<select name="author_id" class="form-control">
			@foreach ($authors as $au)
			<option value="{{$au->id}}"
					@if($au->id == $model->author_id)
					selected
					@endif
				>{{$au->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Content</label>
		<textarea name="content" rows="10" class="form-control">{!! old('content', $model->content)!!}</textarea>
	</div>
	<div class="form-group">
		<label>Publish date</label>
		<input type="text" name="publish_date" value="{{old('publish_date', $model->publish_date)}}" class="form-control">
		@if($errors->first('publish_date'))
		<span class="text-danger">{{$errors->first('publish_date')}}</span>
		@endif
	</div>
	
	<div class="checkbox">
	    <label>
	    	<input type="checkbox"
	    		@if($model->status)
	    		checked 
	    		@endif	
	    	 name="status" value="1"> Enable
	    </label>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-sm btn-info">Save</button>
		<a href="{{route('homepage')}}" title="" class="btn btn-sm btn-danger">Cancel</a>
	</div>
</form>

@endsection