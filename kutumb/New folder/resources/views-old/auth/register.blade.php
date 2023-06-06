@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12"> <h3>Create Account</h3></div>
        <div class="col-md-6">
            <form role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
                 <div class="form-row">
                    <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }} col-md-6">
                        <label for="inputNickname">{{ trans('user.nickname') }}</label>
                        <input id="nickname" type="text" class="form-control" name="nickname"placeholder="Nickname" value="{{ old('nickname') }}" required autofocus>
                        @if ($errors->has('nickname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nickname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="inputName">{{ trans('user.name') }}</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">{{ trans('user.email') }}</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6{{ $errors->has('gender_id') ? ' has-error' : '' }}">
                        <label for="gender_id">{{ trans('user.gender') }}</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender_id" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender_id" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>


                        <!-- <div class="form-check form-check-inline">
                            <label for="gender_id">{{ trans('user.gender') }}</label>

                            {!! FormField::radios('gender_id', [1 => trans('app.male'), 2 => trans('app.female')], ['label' => false],['class'=>'form-check-input']) !!}
                        </div> -->
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">{{ trans('auth.password') }}</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password-confirm">{{ trans('auth.password_confirmation') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
