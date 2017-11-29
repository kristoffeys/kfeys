@extends('layouts.backend')

@section('content')
<div class="bg-grey-lighter h-screen font-sans">
    <div class="container mx-auto h-full flex justify-center items-center">
        <div class="w-1/3 text-center">
            <h1 class="font-hairline mb-6">Login</h1>

            <form class="text-left border-green border-solid p-8 border-t-8 bg-white mb-2 rounded-lg shadow-lg" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="mb-4{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">E-Mail Address</label>
                    <input id="email" type="email" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 focus:border-green" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="mb-4{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Password</label>
                    <input id="password" type="password" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 focus:border-green" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="mb-4">
                    <div class="checkbox">
                        <label class="text-grey-dark text-xs block mb-2">
                            <input type="checkbox" class="mr-1" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>

                <button type="submit" class="bg-green hover:bg-green-darker text-white font-bold py-2 px-8 rounded">
                    Login
                </button>
            </form>
            <a class="no-underline inline-block align-baseline text-xs text-blue hover:text-blue-dark" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
    </div>
</div>
@endsection
