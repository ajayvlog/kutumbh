@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <div class="mb-2  text-dark col-12 border pt-2">
        <div class="row">
            <div class="col-3 col-md-1">
                {{ userPhoto($couple->husband ? $couple->husband : $couple->wife , ['class' => 'img-fluid rounded-circle border']) }}
            </div>
            <div class="col-md-6 col-6">
                <span> <strong>{{ $couple->husband->name }} & {{ $couple->wife->name }}</strong></span><br><span><small>{{ trans('couple.edit') }}</small></span>
            </div> 
        </div> 
        <div class="row">
            <div class="col-12 border border-bottom-0 border-left-0 border-right-0 mt-2">
                <div class="pt-1">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                               {{ link_to_route('couples.show', trans('couple.show'), [$couple], ['class' => 'btn btn-primary']) }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @include('couples.partials.stat')
        <div class="row">
            <div class="col-md-2">
                <div class="row text-right">
                    {{-- <div class="col-12"> <strong>{{ trans('user.siblings') }} </strong> </div>
                    <div class="col-12"> <small class="text-muted"> Preffered</small> </div> --}}
                </div>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">{{ trans('couple.update') }}</h3></div>
                    {!! Form::model($couple, ['route' => ['couples.update', $couple], 'method' => 'patch']) !!}
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! FormField::text('marriage_date', ['label' => trans('couple.marriage_date')]) !!}
                            </div>
                            <div class="col-md-6">
                                {!! FormField::text('divorce_date', ['label' => trans('couple.divorce_date')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        {!! Form::submit(trans('couple.update'), ['class' => 'btn btn-success']) !!}
                        {{ link_to_route('couples.show', trans('app.cancel'), [$couple], ['class' => 'btn btn-default']) }}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection

@section ('ext_css')
<link rel="stylesheet" href="{{ asset('css/plugins/jquery.datetimepicker.css') }}">
@endsection

@section ('ext_js')
<script src="{{ asset('js/plugins/jquery.datetimepicker.js') }}"></script>
@endsection

@section ('script')
<script>
(function () {
    $('#marriage_date, #divorce_date').datetimepicker({
        timepicker:false,
        format:'Y-m-d',
        closeOnDateSelect: true,
        scrollInput: false
    });
})();
</script>
@endsection
