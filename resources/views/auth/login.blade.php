@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12"><h3>{{ $title }}</h3></div>
        {{-- <div class="col-12"> <h3>Login</h3></div> --}}
        <div class="col-md-6">
            {{-- <form role="form" method="POST" action="{{ route('login') }}"> --}}
            <form role="form" method="POST" action="{{ route($loginRoute) }}">
            {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">{{ trans('auth.email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">{{ trans('auth.password') }}</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="gridCheck">
                            Remember Me
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('auth.login') }}
                        </button>
                        {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ trans('auth.forgot_password') }}
                        </a> --}}
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route($forgotPasswordRoute) }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
