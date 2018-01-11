<form action="{{ $url }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}

	<button type="submit" class="text-red my-1 text-sm font-normal px-2" title="Delete">
		<i class="fa fa-trash-o" aria-hidden="true"></i>
	</button>
</form>
