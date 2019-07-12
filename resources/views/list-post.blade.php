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