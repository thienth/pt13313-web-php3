@extends('layouts.main')
@section('content')

<form action="" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" value="" placeholder="Enter title..." class="form-control">
	</div>
	<div class="form-group">
		<label>Image</label>
		<input type="file" name="image" value="" class="form-control">
	</div>
	<div class="form-group">
		<label>Category</label>
		<select name="category_id" class="form-control">
			@foreach ($cates as $ca)
			<option value="{{$ca->id}}">{{$ca->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Author</label>
		<select name="author" class="form-control">
			@foreach ($authors as $au)
			<option value="{{$au->id}}">{{$au->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Content</label>
		<textarea name="content" rows="10" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>Publish date</label>
		<input type="date" name="publish_date" value="" class="form-control">
	</div>
	
	<div class="checkbox">
	    <label>
	    	<input type="checkbox" name="status" value="1"> Enable
	    </label>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-sm btn-info">Save</button>
		<a href="{{route('homepage')}}" title="" class="btn btn-sm btn-danger">Cancel</a>
	</div>
</form>

@endsection