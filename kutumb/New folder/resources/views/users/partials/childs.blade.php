<div class="row">
    <div class="col-12">
        <div class="input-group">
            @can('edit', $user)
                @if (request('action') == 'add_child')
                    <div class="list-group-item">
                        {{ Form::open(['route' => ['family-actions.add-child', $user->id]]) }}
                        <div class="row">
                            <div class="col-md-8">
                                {!! FormField::text('add_child_name', ['label' => __('user.child_name')]) !!}
                            </div>
                            <div class="col-md-4">
                                {!! FormField::radios('add_child_gender_id', [1 => __('app.male'), 2 => __('app.female')], ['label' => __('user.child_gender')]) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                {!! FormField::select('add_child_parent_id', $usersMariageList, ['label' => __('user.add_child_from_existing_couples', ['name' => $user->name]), 'placeholder' => __('app.unknown')]) !!}
                            </div>
                            <div class="col-md-4">
                                {!! FormField::text('add_child_birth_order', ['label' => __('user.birth_order'), 'type' => 'number', 'min' => 1]) !!}
                            </div>
                        </div>

                        {{ Form::submit(__('user.add_child'), ['class' => 'btn btn-success btn-sm']) }}
                        {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
                        {{ Form::close() }}
                    </div>
                @elseif( $user->childs)
                    @forelse($user->childs as $child)
                        <div class="col-12 col-md-3">
                            {{ userPhoto($child, ['class' => 'img-fluid rounded-circle border']) }}
                        </div>
                        <div class="col-12 col-md-9 text-center text-lg-left">
                            <div> <span class="text-muted"> {{ $child->gender == 'F' ? __('Daughter') : __('Son**') }}</span> </div>
                            <div> <strong>{{ $child->profileLink() }} ({{ $child->gender }})</strong> </div>
                            @if($child->yob)
                                <div> <small class="text-muted">{{ trans('user.dob') }} {{ $child->yob }}</small> </div>
                            @endif
                        </div>
                         

                        @empty
                        
                    @endforelse
                    <a href="{{ route('users.show', [$user->id, 'action' => 'add_child'] ) }}" class="addLink"><i class="fas fa-plus-circle"></i></a>
                        <div class="input-group-append">
                            <span class="mt-3 ml-2"> <small>Add Child</small></span>
                        </div>
                @else
                    <a href="{{ route('users.show', [$user->id, 'action' => 'add_child'] ) }}" class="addLink"><i class="fas fa-plus-circle"></i></a>
                    <div class="input-group-append">
                        <span class="mt-3 ml-2"> <small>Add Child</small></span>
                    </div>
                @endif
            @else
                {{-- @if( $user->childs) --}}
                    @forelse($user->childs as $child)
                        <div class="col-12 col-md-3">
                            {{ userPhoto($child, ['class' => 'img-fluid rounded-circle border']) }}
                        </div>
                        <div class="col-12 col-md-9 text-center text-lg-left">
                            <div> <span class="text-muted"> {{ $child->gender == 'F' ? __('Daughter') : __('Son999') }}</span> </div>
                            <div> <strong>{{ $child->profileLink() }} ({{ $child->gender }})</strong> </div>
                            @if($child->yob)
                                <div> <small class="text-muted">{{ trans('user.dob') }} {{ $child->yob }}</small> </div>
                            @endif
                        </div>
                        @empty
                        <div class="col-12 col-md-9 text-center text-lg-left">
                            <div> <strong>{{ __('Child record not found') }}</strong> </div>
                        </div>
                    @endforelse
                {{-- @else --}}
                    
                {{-- @endif --}}
            @endcan         
        </div>
    </div>
</div>





{{-- <div class="panel panel-default">
    <div class="panel-heading">
        @can ('edit', $user)
        <div class="pull-right" style="margin: -3px -6px">
            {{ link_to_route('users.show', __('user.add_child'), [$user->id, 'action' => 'add_child'], ['class' => 'btn btn-success btn-xs']) }}
        </div>
        @endcan
        <h3 class="panel-title">{{ __('user.childs') }} ({{ $user->childs->count() }})</h3>
    </div>

    <ul class="list-group">
        @forelse($user->childs as $child)
            <li class="list-group-item">
                {{ $child->profileLink() }} ({{ $child->gender }})
            </li>
        @empty
            <li class="list-group-item">{{ __('app.childs_were_not_recorded') }}</li>
        @endforelse
        @can('edit', $user)
        @if (request('action') == 'add_child')
        <li class="list-group-item">
            {{ Form::open(['route' => ['family-actions.add-child', $user->id]]) }}
            <div class="row">
                <div class="col-md-8">
                    {!! FormField::text('add_child_name', ['label' => __('user.child_name')]) !!}
                </div>
                <div class="col-md-4">
                    {!! FormField::radios('add_child_gender_id', [1 => __('app.male'), 2 => __('app.female')], ['label' => __('user.child_gender')]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    {!! FormField::select('add_child_parent_id', $usersMariageList, ['label' => __('user.add_child_from_existing_couples', ['name' => $user->name]), 'placeholder' => __('app.unknown')]) !!}
                </div>
                <div class="col-md-4">
                    {!! FormField::text('add_child_birth_order', ['label' => __('user.birth_order'), 'type' => 'number', 'min' => 1]) !!}
                </div>
            </div>

            {{ Form::submit(__('user.add_child'), ['class' => 'btn btn-success btn-sm']) }}
            {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
            {{ Form::close() }}
        </li>
        @endif
        @endcan
    </ul>
</div> --}}
