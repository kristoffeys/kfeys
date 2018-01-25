@extends('layouts.backend')

@section('content')
    <?php
    $labelClasses = 'label text-grey-darker mb-2';
    $fieldClasses = 'input input-grey';

    $edit = false;
    if ($page->id) {
        $edit = true;
    }
    ?>

	<div class="bg-white rounded border-2 max-w-xl mx-auto flex-1 my-8 pb-4">
		<div class="bg-grey-lighter mb-2 px-8 py-2 text-grey-darker font-bold">
			<h1 class="p-0 text-grey-darker">
				@if($edit)
					Edit Page
				@else
					New Page
				@endif
			</h1>
		</div>
		@if($edit)
			{!! Form::model($page, ['class' => 'p-8','route' => ['pages.update', $page->id], 'method' => 'put'])  !!}
		@else
			{!! Form::model($page, ['class' => 'p-8','route' => 'pages.store']) !!}
		@endif

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		{!! csrf_field() !!}
		<div class="mb-4{{ $errors->has('title') ? ' has-error' : '' }}">
			{!! Form::label('title', 'Title', ['class' => $labelClasses]) !!}
			{!! Form::text('title', null, ['class' => $fieldClasses]) !!}
		</div>
		<div class="mb-4{{ $errors->has('excerpt') ? ' has-error' : '' }}">
			{!! Form::label('excerpt', 'Excerpt', ['class' => $labelClasses]) !!}
			{!! Form::textarea('excerpt', null, ['class' => $fieldClasses]) !!}
		</div>
		<div class="mb-4{{ $errors->has('markdown') ? ' has-error' : '' }}">
			{!! Form::textarea('markdown', null, ['class' => 'markdown-editor ' . $fieldClasses]) !!}
		</div>

		<div class="mb-4{{ $errors->has('meta_description') ? ' has-error' : '' }}">
			{!! Form::label('meta_description', 'Meta Description', ['class' => $labelClasses]) !!}
			{!! Form::textarea('meta_description', null, ['class' => $fieldClasses]) !!}
		</div>

		<div class="mb-4{{ $errors->has('status') ? ' has-error' : '' }}">
			{!! Form::label('status', 'Status', ['class' => $labelClasses]) !!}
			{!! Form::select('status', \App\Models\Post::$statusdropdown, $edit ? null : \App\Models\Post::STATUS_DRAFT, ['class' => $fieldClasses]) !!}
		</div>

		<button type="submit" class="bg-green hover:bg-green-darker text-white font-bold py-2 px-8 rounded">
			@if($edit)
				Update
			@else
				Save
			@endif
		</button>

		{!! Form::close() !!}
	</div>

@endsection
