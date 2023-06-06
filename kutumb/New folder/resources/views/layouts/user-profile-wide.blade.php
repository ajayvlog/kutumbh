@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <div class="mb-2  text-dark col-12 border pt-2">
        <div class="row">
            <div class="col-3 col-md-1">
                {{ userPhoto($user, ['class' => 'img-fluid rounded-circle border']) }}
            </div>
            <div class="col-md-6 col-6">
                <span> <strong>{{ $user->name }}</strong> </span><br><span><small>@yield('subtitle')</small></span>
                <div> <small>@if($user->yob){{ __('Born') }} {{ $user->yob }}, @endif {!! nl2br($user->address) !!}</small> </div>
            </div> 
        </div> 
        <div class="row">
            <div class="col-12 border border-bottom-0 border-left-0 border-right-0 mt-2">
                <div class="pt-1">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="btn btn-primary btn-xs" href="{{ route('users.show',[$user->id]) }}">Show Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
        @yield('user-content')     
    </div>   
</div>
@endsection

