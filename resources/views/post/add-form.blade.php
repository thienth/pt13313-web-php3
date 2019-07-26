@extends('layouts.main')
@section('content')

<form action="" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" value="" placeholder="Enter title..." class="form-control">
	</div>
</form>

@endsection