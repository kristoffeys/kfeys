@extends('layouts.backend')

@section('content')
	<div class="flex justify-between items-center bg-grey-lighter mb-8 px-6 py-2 text-grey-darker font-bold">
		<h1 class="p-0 text-grey-darker">Categories</h1>
	</div>
	<div class="mb-4">
		<div class="flex mt-4">
			<input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Add category">
			<button class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal">+</button>
		</div>
	</div>
	<div>
		@foreach($categories as $category)
			<div class="flex mb-4 items-center">
				<p class="w-full text-grey-darkest">{{ $category->name }}</p>
				@include('admin.deleteButton', ['url' => action('CategoryController@destroy', [$category->id])])
			</div>
		@endforeach

	</div>

@endsection
