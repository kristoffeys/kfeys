@extends('layouts.backend')

@section('content')
	<div class="flex justify-between items-center bg-grey-lighter mb-8 px-6 py-2 text-grey-darker font-bold">
		<h1 class="p-0 text-grey-darker">Pages</h1>
		<a href="{{ action('PageController@create') }}" class="bg-green hover:bg-green-darker text-white font-bold py-2 px-8 rounded no-underline">
			New Page
		</a>
	</div>

	@foreach($pages as $page)
		<div class="flex justify-between items-start px-6 py-2 border-b border-grey-lighter">
			<div>
				<div>
					<a href="{{ action('PageController@edit', $page->id) }}">{{ $page->title }}</a>
				</div>
			</div>
			<div class="flex justify-between items-center">
				<div class="text-sm my-1 px-2 border-r {{ $page->status === \App\Models\Page::STATUS_ACTIVE ? 'text-green' : 'text-orange' }}">{{ $page->status }}</div>
				@include('admin.deleteButton', ['url' => action('PageController@destroy', [$page->id])])
			</div>
		</div>
	@endforeach
@endsection
