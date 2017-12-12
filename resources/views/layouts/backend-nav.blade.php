@extends('layouts.backend')

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<div class="bg-grey-lighter h-screen font-sans flex">
    <div class="bg-white shadow w-64 h-screen flex-none">
        <ul class="list-reset">
            <li >
                <a href="#" class="block p-4 text-grey-darker font-bold hover:border-green hover:bg-grey-lighter border-r-4">Home</a>
            </li>
            <li >
                <a href="#" class="block p-4 text-grey-darker font-bold border-grey-lighter hover:border-green hover:bg-grey-lighter border-r-4">About us</a>
            </li>
            <li >
                <a href="#" class="block p-4 text-grey-darker font-bold border-grey-lighter hover:border-green hover:bg-grey-lighter border-r-4">Services</a>
            </li>
            <li >
                <a href="#" class="block p-4 text-grey-darker font-bold border-grey-lighter hover:border-green hover:bg-grey-lighter border-r-4">Contact us</a>
            </li>
        </ul>
    </div>
    <div class="flex-1 p-8">
        @yield('page')
    </div>
</div>

@endsection
