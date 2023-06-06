@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <div class="mb-2  text-dark col-12 border pt-2">
        <div class="row">
            <div class="col-3 col-md-1">
                {{ userPhoto($couple->husband ? $couple->husband : $couple->wife , ['class' => 'img-fluid rounded-circle border']) }}
            </div>
            <div class="col-md-6 col-6">
                <span> <strong>{{ $couple->husband->name }} & {{ $couple->wife->name }}</strong></span><br><span><small>{{ trans('couple.detail') }}</small></span>
            </div> 
        </div> 
        <div class="row">
            <div class="col-12 border border-bottom-0 border-left-0 border-right-0 mt-2">
                <div class="pt-1">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            @can('edit', $couple)
                                {{ link_to_route('couples.edit', trans('couple.edit'), $couple, ['class' => 'btn btn-warning']) }}
                            @endcan
                        </li>
                        <li class="nav-item">
                            {{ link_to_route('users.show', __('Back To Profile'), $couple->husband->id, ['class' => 'btn btn-default']) }}
                        </li>
                        <li class="nav-item">
                            {{ link_to_route('users.show', __('Wife Profile'), $couple->wife->id, ['class' => 'btn btn-default']) }}
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
        @include('couples.partials.stat') 
        @if ($couple->childs->isEmpty())
            <i>{{ trans('app.childs_were_not_recorded') }}</i>
        @else
            <div class="row">
                <div class="col-12 mb-3">
                    <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                        <strong>{{ trans('user.childs') }} & {{ trans('user.grand_childs') }}</strong>
                    </a>
                    <span class="text-muted">({{ count($couple->childs) }})</span>
                </div>
                <div class="col-12">
                    <div class="collapse show" id="collapseExample">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="row text-right">
                                    {{-- <div class="col-12"> <strong>{{ trans('user.siblings') }} </strong> </div>
                                    <div class="col-12"> <small class="text-muted"> Preffered</small> </div> --}}
                                </div>
                            </div>
                            @foreach($couple->childs->chunk(4) as $chunkedChild)
                                @foreach($chunkedChild as $key => $child)                                    
                                    @if($key!=0 && ($key%2)==0 )
                                        <div class="col-md-2" style="margin-left: 0.1em;"></div>
                                    @endif
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-12 p-2 border">
                                                <div class="row">
                                                    <div class="col-12 col-md-3">
                                                        {{ userPhoto($child, ['class' => 'img-fluid rounded-circle border']) }}
                                                    </div>
                                                    <div class="col-12 col-md-9 text-center text-lg-left">
                                                        <div> <span class="text-muted"> {{ $child->gender == 'F' ? __('Daughter') : __('Son') }}</span> </div>
                                                        <div> <strong>{{ $child->profileLink() }} ({{ $child->gender }})</strong> </div>
                                                        <div> <small class="text-muted">{{ __('Born') }} {{ $child->yob ? $child->yob : '"Date Not Available"' }}</small> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 p-2 ">
                                                <!-- efefef -->
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample{{ $key }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $key }}">
                                                            <strong><small>Show {{ trans('user.grand_childs') }}</small></strong>
                                                        </a>
                                                        <span class="text-muted"> <small>({{ count($child->childs) }})</small></span>
                                                    </div>
                                                </div>
                                                @if($child->childs)
                                                    <div class="collapse" id="collapseExample{{ $key }}" style="margin-left: 1em;">
                                                        @foreach($child->childs as $grand)
                                                            <div class="col-12 p-2 border bg-light" >
                                                                <div class="row">
                                                                    <div class="col-12 col-md-3">
                                                                        {{ userPhoto($grand, ['class' => 'img-fluid rounded-circle border']) }}
                                                                    </div>
                                                                    <div class="col-12 col-md-9 text-center text-lg-left">
                                                                        <div> <span class="text-muted"> {{ $grand->gender == 'F' ? __('Daughter') : __('Son') }}</span> </div>
                                                                        <div> <strong>{{ $grand->profileLink() }} ({{ $grand->gender }}) </strong> </div>
                                                                        <div> <small class="text-muted">{{ __('Born') }} {{ $grand->yob ? $grand->yob : '"Date Not Available"' }}</small> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach                            
                                                    </div>
                                                @endif
                                                <!-- efefef -->
                                            </div>                                                
                                        </div>
                                    </div>
                                @endforeach
                                @if (! $loop->last)
                                <div class="clearfix"></div><hr>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>   
</div>   
@endsection
