@extends('layouts.backend')

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<div class="bg-grey-lighter h-screen font-sans flex">
    <div class="bg-white shadow w-64 h-screen flex-none">
        {{ Menu::admin() }}
    </div>
    <div class="flex-1 p-8">
        @yield('page')
    </div>
</div>

@endsection
