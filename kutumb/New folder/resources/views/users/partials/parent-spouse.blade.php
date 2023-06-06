<div class="col-md-6">
    <div class="p-3 border mt-3">
        <div class="row mb-3">
            <div class="col-6"> <h5> Relations</h5></div>
            {{-- <div class="col-6 text-right">
                <a href="#!" class="border pl-2 pr-2 text-dark rounded">
                    <small> <i class="fas fa-calculator"></i> Kinship Calculator</small>
                </a>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                    <strong>{{ __('user.parent') }}</strong>
                </a>

                <span class="text-muted">({{ $user->parents->count() }})</span>
                {{-- {{ $user->fatherLink() }} --}}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="collapse show" id="collapseExample">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group">
                                @can ('edit', $user)
                                    @if (request('action') == 'set_father')
                                    {{ Form::open(['route' => ['family-actions.set-father', $user->id]]) }}
                                    {!! FormField::select('set_father_id', $malePersonList, ['label' => false, 'value' => $user->father_id, 'placeholder' => __('app.select_from_existing_males')]) !!}
                                    <div class="input-group">
                                        {{ Form::text('set_father', null, ['class' => 'form-control input-sm', 'placeholder' => __('app.enter_new_name')]) }}
                                        <span class="input-group-btn">
                                            {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'set_father_button']) }}
                                            {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
                                        </span>
                                    </div>
                                    {{ Form::close() }}
                                    @elseif( $user->fatherLink())
                                        <div class="col-12 col-md-3">
                                            {{ userPhoto($user->father, ['class' => 'img-fluid rounded-circle border']) }}
                                        </div>
                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                            <div> <span class="text-muted">{{ __('user.father') }}</span> </div>
                                            <div> <strong>{{ $user->fatherLink() }}</strong> </div>
                                            @if($user->father->yob)
                                                <div> <small class="text-muted"> {{ trans('user.dob') }} {{ $user->father->yob }}</small> </div>
                                            @endif
                                        </div>
                                    @else
                                        <a href="{{ route('users.show', [$user->id, 'action' => 'set_father'] ) }}" class="addLink"><i class="fas fa-plus-circle"></i></a>
                                        <div class="input-group-append">
                                            <span class="mt-3 ml-2"> <small>Add Father</small></span>
                                        </div>
                                    @endif
                                    @else
                                        @if( $user->fatherLink())
                                            <div class="col-12 col-md-3">
                                                {{ userPhoto($user->father, ['class' => 'img-fluid rounded-circle border']) }}
                                            </div>
                                            <div class="col-12 col-md-9 text-center text-lg-left">
                                                <div> <span class="text-muted">{{ __('user.father') }}</span> </div>
                                                <div> <strong>{{ $user->fatherLink() }}</strong> </div>
                                                @if($user->father->yob)
                                                    <div> <small class="text-muted"> {{ trans('user.dob') }} {{ $user->father->yob }}</small> </div>
                                                @endif
                                            </div>
                                        @else
                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                            <div> <strong>{{ __('"Father Record is not Found"') }}</strong> </div>
                                        </div>
                                        @endif
                                @endcan
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                @can ('edit', $user)
                                    @if (request('action') == 'set_mother')
                                    {{ Form::open(['route' => ['family-actions.set-mother', $user->id]]) }}
                                    {!! FormField::select('set_mother_id', $femalePersonList, ['label' => false, 'value' => $user->mother_id, 'placeholder' => __('app.select_from_existing_females')]) !!}
                                    <div class="input-group">
                                        {{ Form::text('set_mother', null, ['class' => 'form-control input-sm', 'placeholder' => __('app.enter_new_name')]) }}
                                        <span class="input-group-btn">
                                            {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'set_mother_button']) }}
                                            {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
                                        </span>
                                    </div>
                                    {{ Form::close() }}
                                    @elseif( $user->motherLink())
                                        <div class="col-12 col-md-3">
                                            {{ userPhoto($user->mother, ['class' => 'img-fluid rounded-circle border']) }}
                                        </div>
                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                            <div> <span class="text-muted">{{ __('user.mother') }}</span> </div>
                                            <div> <strong>{{ $user->motherLink() }}</strong> </div>
                                            @if($user->mother->yob)
                                                <div> <small class="text-muted"> {{ trans('user.dob') }} {{ $user->mother->yob }}</small> </div>
                                            @endif
                                        </div>                                        
                                    @else
                                        <a href="{{ route('users.show', [$user->id, 'action' => 'set_mother'] ) }}" class="addLink"><i class="fas fa-plus-circle"></i></a>
                                        <div class="input-group-append">
                                            <span class="mt-3 ml-2"> <small>Add Mother</small></span>
                                        </div>
                                    @endif
                                @else
                                    @if( $user->motherLink())
                                        <div class="col-12 col-md-3">
                                            {{ userPhoto($user->mother, ['class' => 'img-fluid rounded-circle border']) }}
                                        </div>
                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                            <div> <span class="text-muted">{{ __('user.mother') }}</span> </div>
                                            <div> <strong>{{ $user->motherLink() }}</strong> </div>
                                            @if($user->mother->yob)
                                                <div> <small class="text-muted"> {{ trans('user.dob') }} {{ $user->mother->yob }}</small> </div>
                                            @endif
                                        </div> 
                                    @else
                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                            <div> <strong>{{ __('"Mother record is not found"') }}</strong> </div>
                                        </div>
                                    @endif
                                @endcan              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
            <div class="row">
                <div class="col-12 mb-3">
                    <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="true" aria-controls="collapseExample1">
                        <strong>{{ __('Spouse And Child') }}</strong>
                    </a>

                    {{-- <span class="text-muted">(0)</span> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="collapse show" id="collapseExample1">
                        <div class="row">                           
                            <div class="col-12">
                                <div class="input-group">
                                    @if($user->gender_id == 1)
                                        @can('edit', $user)
                                            @if(request('action') == 'add_spouse')
                                                <div>
                                                    {{ Form::open(['route' => ['family-actions.add-wife', $user->id]]) }}
                                                    {!! FormField::select('set_wife_id', $femalePersonList, ['label' => false, 'placeholder' => __('app.select_from_existing_females')]) !!}
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                {{ Form::text('set_wife', null, ['class' => 'form-control input-sm', 'placeholder' => __('app.enter_new_name')]) }}
                                                            </div>
                                                            <div class="col-md-5">
                                                                {{ Form::text('marriage_date', null, ['class' => 'form-control input-sm', 'placeholder' => __('couple.marriage_date')]) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'set_wife_button']) }}
                                                    {{ link_to_route('users.show', __('app.cancel'), $user, ['class' => 'btn btn-default btn-sm']) }}
                                                    {{ Form::close() }}
                                                </div>
                                            @elseif($user->wifes->isEmpty() == false)
                                                @foreach($user->wifes as $wife)
                                                    <div class="col-12 col-md-3">
                                                        {{ userPhoto($wife, ['class' => 'img-fluid rounded-circle border']) }}
                                                    </div>

                                                    <div class="col-12 col-md-9 text-center text-lg-left">
                                                        <div> <span class="text-muted"> {{ __('user.spouse') }}</span> </div>
                                                        <div> <strong>{{ $wife->profileLink() }}</strong> </div>
                                                        @if($wife->yob)
                                                            <div> <small class="text-muted">{{ trans('user.dob') }} {{ $wife->yob }}</small> </div>
                                                        @endif
                                                    </div>
                                                @endforeach                                                                                                        
                                            @else
                                                @can('edit', $user)
                                                    <div class="pull-right">
                                                        @unless (request('action') == 'add_spouse')
                                                            <a href="{{ route('users.show', [$user->id, 'action' => 'add_spouse'] ) }}" class="addLink"><i class="fas fa-plus-circle"></i></a>
                                                            <div class="input-group-append">
                                                                <span class="mt-3 ml-2"> <small>Add Wife</small></span>
                                                            </div>                                                            
                                                        @endunless
                                                    </div>
                                                @endcan                                                    
                                            @endif
                                            @else
                                            @if($user->wifes->isEmpty() == false)
                                                @foreach($user->wifes as $wife)
                                                    <div class="col-12 col-md-3">
                                                        {{ userPhoto($wife, ['class' => 'img-fluid rounded-circle border']) }}
                                                    </div>

                                                    <div class="col-12 col-md-9 text-center text-lg-left">
                                                        <div> <span class="text-muted"> {{ __('user.spouse') }}</span> </div>
                                                        <div> <strong>{{ $wife->profileLink() }}</strong> </div>
                                                        @if($wife->yob)
                                                            <div> <small class="text-muted">{{ trans('user.dob') }} {{ $wife->yob }}</small> </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-12 col-md-9 text-center text-lg-left">
                                                    <div> <strong>{{ __('Wife Record Not Found') }}</strong> </div>
                                                </div>
                                            @endif
                                        @endcan 
                                    @else
                                        @can('edit', $user)
                                            @if(request('action') == 'add_spouse')
                                                <div>
                                                    {{ Form::open(['route' => ['family-actions.add-husband', $user->id]]) }}
                                                    {!! FormField::select('set_husband_id', $malePersonList, ['label' => false, 'placeholder' => __('app.select_from_existing_males')]) !!}
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                {{ Form::text('set_husband', null, ['class' => 'form-control input-sm', 'placeholder' => __('app.enter_new_name')]) }}
                                                            </div>
                                                            <div class="col-md-5">
                                                                {{ Form::text('marriage_date', null, ['class' => 'form-control input-sm', 'placeholder' => __('couple.marriage_date')]) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'set_husband_button']) }}
                                                    {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
                                                    {{ Form::close() }}
                                                </div>
                                            @elseif($user->husbands->isEmpty() == false)
                                                @foreach($user->husbands as $husband)
                                                    <div class="col-12 col-md-3">
                                                        {{ userPhoto($husband, ['class' => 'img-fluid rounded-circle border']) }}
                                                    </div>

                                                    <div class="col-12 col-md-9 text-center text-lg-left">
                                                        <div> <span class="text-muted"> {{ __('user.spouse') }}</span> </div>
                                                        <div> <strong>{{ $husband->profileLink() }}</strong> </div>
                                                        @if($husband->yob)
                                                            <div> <small class="text-muted">{{ trans('user.dob') }} {{ $husband->yob }}</small> </div>
                                                        @endif
                                                    </div>                                                    
                                                @endforeach                                                                                                        
                                            @else
                                                @can('edit', $user)
                                                    <div class="pull-right" >
                                                        @unless (request('action') == 'add_spouse')
                                                        @if(Auth::user()->gender_id)
                                                            <a href="{{ route('users.show', [$user->id, 'action' => 'add_spouse'] ) }}" class="addLink" id="check_gender"><i class="fas fa-plus-circle"></i></a>
                                                            <div class="input-group-append">
                                                                <span class="mt-3 ml-2"> <small>Add Husband {{(Auth::user()->gender_id)?'abc':'none'}}</small></span>
                                                            </div>
                                                            @else
                                                            <div class="input-group-append">
                                                                <span class="mt-3 ml-2"> <small>Please Add Gender</small></span>
                                                            </div>
                                                        @endif                                                                
                                                        @endunless
                                                    </div>
                                                @endcan                                                    
                                            @endif
                                            @else
                                            @if($user->husbands->isEmpty() == false)
                                                @foreach($user->husbands as $husband)
                                                    <div class="col-12 col-md-3">
                                                        {{ userPhoto($husband, ['class' => 'img-fluid rounded-circle border']) }}
                                                    </div>

                                                    <div class="col-12 col-md-9 text-center text-lg-left">
                                                        <div> <span class="text-muted"> {{ __('user.spouse') }}</span> </div>
                                                        <div> <strong>{{ $husband->profileLink() }}</strong> </div>
                                                        @if($husband->yob)
                                                            <div> <small class="text-muted">{{ trans('user.dob') }} {{ $husband->yob }}</small> </div>
                                                        @endif
                                                    </div>                                                    
                                                @endforeach 
                                            @else
                                                <div class="col-12 col-md-9 text-center text-lg-left">
                                                    <div> <strong>{{ __('Hunband Record Not Found') }}</strong> </div>
                                                </div>
                                            @endif
                                        @endcan 
                                    @endif                                       
                                </div>
                            </div>
                            @include('users.partials.childs')                            
                        </div>
                    </div>
                </div>
            </div>
       
            <hr>
            @include('users.partials.siblings')
        
    </div>
</div>

 

{{-- <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">{{ __('user.family') }}</h3></div>

    <table class="table">
        <tbody>
            <tr>
                <th class="col-sm-4">{{ __('user.father') }}</th>
                <td class="col-sm-8">
                    @can ('edit', $user)
                        @if (request('action') == 'set_father')
                        {{ Form::open(['route' => ['family-actions.set-father', $user->id]]) }}
                        {!! FormField::select('set_father_id', $malePersonList, ['label' => false, 'value' => $user->father_id, 'placeholder' => __('app.select_from_existing_males')]) !!}
                        <div class="input-group">
                            {{ Form::text('set_father', null, ['class' => 'form-control input-sm', 'placeholder' => __('app.enter_new_name')]) }}
                            <span class="input-group-btn">
                                {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'set_father_button']) }}
                                {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
                            </span>
                        </div>
                        {{ Form::close() }}
                        @else
                            {{ $user->fatherLink() }}
                            <div class="pull-right">
                                {{ link_to_route('users.show', __('user.set_father'), [$user->id, 'action' => 'set_father'], ['class' => 'btn btn-link btn-xs']) }}
                            </div>
                        @endif
                    @else
                        {{ $user->fatherLink() }}
                    @endcan
                </td>
            </tr>
            <tr>
                <th>{{ __('user.mother') }}</th>
                <td>
                    @can ('edit', $user)
                        @if (request('action') == 'set_mother')
                        {{ Form::open(['route' => ['family-actions.set-mother', $user->id]]) }}
                        {!! FormField::select('set_mother_id', $femalePersonList, ['label' => false, 'value' => $user->mother_id, 'placeholder' => __('app.select_from_existing_females')]) !!}
                        <div class="input-group">
                            {{ Form::text('set_mother', null, ['class' => 'form-control input-sm', 'placeholder' => __('app.enter_new_name')]) }}
                            <span class="input-group-btn">
                                {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'set_mother_button']) }}
                                {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
                            </span>
                        </div>
                        {{ Form::close() }}
                        @else
                            {{ $user->motherLink() }}
                            <div class="pull-right">
                                {{ link_to_route('users.show', __('user.set_mother'), [$user->id, 'action' => 'set_mother'], ['class' => 'btn btn-link btn-xs']) }}
                            </div>
                        @endif
                    @else
                        {{ $user->motherLink() }}
                    @endcan
                </td>
            </tr>
            <tr>
                <th class="col-sm-4">{{ __('user.parent') }}</th>
                <td class="col-sm-8">
                    @can ('edit', $user)
                    <div class="pull-right">
                        @unless (request('action') == 'set_parent')
                            {{ link_to_route('users.show', __('user.set_parent'), [$user->id, 'action' => 'set_parent'], ['class' => 'btn btn-link btn-xs']) }}
                        @endunless
                    </div>
                    @endcan

                    @if ($user->parent)
                    {{ $user->parent->husband->name }} & {{ $user->parent->wife->name }}
                    @endif

                    @can('edit', $user)
                        @if (request('action') == 'set_parent')
                            {{ Form::open(['route' => ['family-actions.set-parent', $user->id]]) }}
                            {!! FormField::select('set_parent_id', $allMariageList, ['label' => false, 'value' => $user->parent_id, 'placeholder' => __('app.select_from_existing_couples')]) !!}
                            {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'set_parent_button']) }}
                            {{ link_to_route('users.show', __('app.cancel'), $user, ['class' => 'btn btn-default btn-sm']) }}
                            {{ Form::close() }}
                        @endif
                    @endcan
                </td>
            </tr>
            @if ($user->gender_id == 1)
            <tr>
                <th>{{ __('user.wife') }}</th>
                <td>
                    @can ('edit', $user)
                    <div class="pull-right">
                        @unless (request('action') == 'add_spouse')
                            {{ link_to_route('users.show', __('user.add_wife'), [$user->id, 'action' => 'add_spouse'], ['class' => 'btn btn-link btn-xs']) }}
                        @endunless
                    </div>
                    @endcan

                    @if ($user->wifes->isEmpty() == false)
                        <ul class="list-unstyled">
                            @foreach($user->wifes as $wife)
                            <li>{{ $wife->profileLink() }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @can('edit', $user)
                        @if (request('action') == 'add_spouse')
                        <div>
                            {{ Form::open(['route' => ['family-actions.add-wife', $user->id]]) }}
                            {!! FormField::select('set_wife_id', $femalePersonList, ['label' => false, 'placeholder' => __('app.select_from_existing_females')]) !!}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        {{ Form::text('set_wife', null, ['class' => 'form-control input-sm', 'placeholder' => __('app.enter_new_name')]) }}
                                    </div>
                                    <div class="col-md-5">
                                        {{ Form::text('marriage_date', null, ['class' => 'form-control input-sm', 'placeholder' => __('couple.marriage_date')]) }}
                                    </div>
                                </div>
                            </div>
                            {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'set_wife_button']) }}
                            {{ link_to_route('users.show', __('app.cancel'), $user, ['class' => 'btn btn-default btn-sm']) }}
                            {{ Form::close() }}
                        </div>
                        @endif
                    @endcan
                </td>
            </tr>
            @else
            <tr>
                <th>{{ __('user.husband') }}</th>
                <td>
                    @can ('edit', $user)
                    <div class="pull-right">
                        @unless (request('action') == 'add_spouse')
                            {{ link_to_route('users.show', __('user.add_husband'), [$user->id, 'action' => 'add_spouse'], ['class' => 'btn btn-link btn-xs']) }}
                        @endunless
                    </div>
                    @endcan
                    @if ($user->husbands->isEmpty() == false)
                        <ul class="list-unstyled">
                            @foreach($user->husbands as $husband)
                            <li>{{ $husband->profileLink() }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @can('edit', $user)
                        @if (request('action') == 'add_spouse')
                        <div>
                            {{ Form::open(['route' => ['family-actions.add-husband', $user->id]]) }}
                            {!! FormField::select('set_husband_id', $malePersonList, ['label' => false, 'placeholder' => __('app.select_from_existing_males')]) !!}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        {{ Form::text('set_husband', null, ['class' => 'form-control input-sm', 'placeholder' => __('app.enter_new_name')]) }}
                                    </div>
                                    <div class="col-md-5">
                                        {{ Form::text('marriage_date', null, ['class' => 'form-control input-sm', 'placeholder' => __('couple.marriage_date')]) }}
                                    </div>
                                </div>
                            </div>
                            {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'set_husband_button']) }}
                            {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
                            {{ Form::close() }}
                        </div>
                        @endif
                    @endcan
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div> --}}

<script>
$('#check_gender').click(function(){
alert('yesdfsdfsdf');
});
</script>    
