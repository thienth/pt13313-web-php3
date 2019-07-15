<form action="" method="get">
	<input type="text" name="keyword" placeholder="Tìm kiếm...">
	<button type="submit">tim</button>
</form>
<table>
	<tbody>
		@foreach($baiviet as $bv)
		<tr>
			<td>{{$bv->id}}</td>
			<td>{{$bv->title}}</td>
			<td>
				<img src="{{$bv->image}}" width="70">
			</td>
		</tr>
		@endforeach
	</tbody>
</table>