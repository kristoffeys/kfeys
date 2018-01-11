@extends('layouts.backend')

@section('content')
        <div class="flex justify-between items-center bg-grey-lighter mb-8 px-6 py-2 text-grey-darker font-bold">
            <h1 class="p-0 text-grey-darker">Posts</h1>
            <a href="{{ action('PostController@create') }}" class="bg-green hover:bg-green-darker text-white font-bold py-2 px-8 rounded no-underline">
                New Post
            </a>
        </div>

        @foreach($posts as $post)
        <div class="flex justify-between items-start px-6 py-2 border-b border-grey-lighter">
            <div>
                <div>
                    <a href="{{ action('PostController@edit', $post->id) }}">{{ $post->title }}</a>
                </div>
                <div class="text-xs text-grey font-medium">
                    {{ $post->created_at->format('d/m/Y H:i') }}
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="text-sm my-1 px-2 border-r {{ $post->status === \App\Models\Post::STATUS_PUBLISHED ? 'text-green' : 'text-orange' }}">{{ $post->status }}</div>
                @include('admin.deleteButton', ['url' => action('PostController@destroy', [$post->id])])
            </div>
        </div>
        @endforeach
@endsection
