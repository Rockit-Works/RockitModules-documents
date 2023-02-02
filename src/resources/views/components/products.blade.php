<table class="products-table">
	<tr>
		@foreach($products['columns'] as $column)
			<th>{{$column}}</th>
		@endforeach
	</tr>
	@foreach($products['items'] as $product)
		<tr>
			@foreach($product as $item)
				<td>{!! $item !!}</td>
			@endforeach
		</tr>
	@endforeach
</table>