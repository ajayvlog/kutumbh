@extends('layouts.app')

@section('content')
<!-- <h2 class="page-header">
    {{ trans('app.search_your_family') }}
    @if (request('q'))
    <small class="pull-right">{!! trans('app.user_found', ['total' => $users->total(), 'keyword' => request('q')]) !!}</small>
    @endif
</h2> -->

<!-- slider starts-->
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>
    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>

        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('slider/jdzuengwew-the-hindu-today.jpg') }}" alt="Los Angeles" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('slider/pehzh5j4rs-the-hindu-today.jpg') }}" alt="Chicago" width="1100" height="500">
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <!-- slider ends-->

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-5 col-sm-7 pt-lg-4 pl-lg-5 pt-3 pl-3 pb-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="heading-medium">{{ trans('app.search_your_family') }}
                        @if (request('q'))
                            <small class="pull-right">{!! trans('app.user_found', ['total' => $users->total(), 'keyword' => request('q')]) !!}</small>
                        @endif
                    </h3>
                    <p>
                        Very soon, leaves will begin to appear as you build your family tree—these are Ancestry Hints. And each one is a potential discovery. Follow the leaves and watch your family tree grow.
                    </p>
                </div>
                <div class="col-12 mb-lg-4 mb-3">
                    {{ Form::open(['method' => 'get','class' => '']) }}
                    <div class="input-group">
                        <div class="input-group-prepend">
                            {{ Form::text('q', request('q'), ['class' => 'form-control form-control-lg rounded-border rounded-right-0 txt-search-home', 'placeholder' => trans('app.search_your_family_placeholder'), 'aria-label'=> trans('app.search_your_family_placeholder')]) }}
                        </div>
                            {{ Form::button('<i class="fas fa-search"></i>', ['type' =>'submit','class' => 'btn btn-primary btn-lg rounded-border rounded-left-0'] )  }} 
                            {{ link_to_route('users.search', 'Reset', [], ['class' => 'btn btn-default']) }}
                            
                    </div>
                    {{ Form::close() }}
                </div>
                @if (Auth::guest())
                    <div class="col-12"><a href="#">  <img class="img-fluid" src="{{ asset('images/btn-get-start-your-family.png') }}"></a></div>
                @endif                
            </div>
        </div>
        <div class="col-12 col-lg-7 col-sm-5 pt-lg-3 pb-lg-3 pr-lg-5 pt-sm-5 text-right family-tree-home">
            <img class="img-fluid" src="{{ asset('images/family-tree-home.jpg') }}">
        </div>
    </div>
</div>
<div class="divider-shadow"> </div>
<div class="container graphic-div text-sm-center text-md-left">
    <div class="row">
        <div class="col-12 text-center mt-3 mb-4">
            <div class="section-title text-center mb-5">
                <h2>How does it all work? </h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 mb-3">
            <h3> One name is all it takes to start making your family tree </h3>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen booktext ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
        </div>
        <div class="col-2 text-center rope-icon-holder">
            <span class="rope-icon rounded-circle"> <i class="fas fa-search"></i></span>
            <div class="divider-graphic-tree"> </div>
        </div>
        <div class="col-md-5 mb-5">
            <img class="img-fluid" src="images/graphic-family-tree.png">
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 mb-3 order-sm-12">
            <h3> Look for the leaf </h3>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen booktext ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
        </div>
        <div class="col-2 text-center rope-icon-holder order-sm-2">
            <span class="rope-icon rounded-circle"> <i class="fas fa-leaf"></i></span>
            <div class="divider-graphic-tree"> </div>
        </div>
        <div class="col-md-5 mb-5 order-sm-1">
            <img class="img-fluid" src="images/graphic-family-tree2.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <h3> Billions of records. Millions of fellow family history seekers </h3>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen booktext ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
        </div>
        <div class="col-2 text-center rope-icon-holder">
            <span class="rope-icon rounded-circle"> <i class="fas fa-file-alt"></i></span>
            <div class="divider-graphic-tree"> </div>
        </div>
        <div class="col-md-5 mb-3">
            <img class="img-fluid" src="images/graphic-family-tree3.png">
        </div>
    </div>
</div>

@if (request('q'))
<br>
{{ $users->appends(Request::except('page'))->render() }}
@foreach ($users->chunk(4) as $chunkedUser)
<div class="row">
    @foreach ($chunkedUser as $user)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                {{ userPhoto($user, ['style' => 'width:100%;max-width:300px']) }}
                @if ($user->age)
                    {!! $user->age_string !!}
                @endif
            </div>
            <div class="panel-body">
                <h3 class="panel-title">{{ $user->profileLink() }} ({{ $user->gender }})</h3>
                <div>{{ trans('user.nickname') }} : {{ $user->nickname }}</div>
                <hr style="margin: 5px 0;">
                <div>{{ trans('user.father') }} : {{ $user->father_id ? $user->father->name : '' }}</div>
                <div>{{ trans('user.mother') }} : {{ $user->mother_id ? $user->mother->name : '' }}</div>
            </div>
            <div class="panel-footer">
                {{ link_to_route('users.show', trans('app.show_profile'), [$user->id], ['class' => 'btn btn-default btn-xs']) }}
                {{ link_to_route('users.chart', trans('app.show_family_chart'), [$user->id], ['class' => 'btn btn-default btn-xs']) }}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach

{{ $users->appends(Request::except('page'))->render() }}
@endif
@endsection
