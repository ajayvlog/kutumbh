@extends('layouts.app')

@section('content')
@if (request('action') == 'delete' && $user)
    @can('delete', $user)
    
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">{{ __('user.delete') }} : {{ $user->name }} JP</h3></div>
                    <div class="panel-body">
                        <table class="table table-condensed">
                            <tr><td>{{ __('user.name') }}</td><td>{{ $user->name }}</td></tr>
                            <tr><td>{{ __('user.nickname') }}</td><td>{{ $user->nickname }}</td></tr>
                            <tr><td>{{ __('user.gender') }}</td><td>{{ $user->gender }}</td></tr>
                            <tr><td>{{ __('user.father') }}</td><td>{{ $user->father_id ? $user->father->name : '' }}</td></tr>
                            <tr><td>{{ __('user.mother') }}</td><td>{{ $user->mother_id ? $user->mother->name : '' }}</td></tr>
                            <tr><td>{{ __('user.childs_count') }}</td><td>{{ $childsCount = $user->childs()->count() }}</td></tr>
                            <tr><td>{{ __('user.spouses_count') }}</td><td>{{ $spousesCount = $user->marriages()->count() }}</td></tr>
                            <tr><td>{{ __('user.managed_user') }}</td><td>{{ $managedUserCount = $user->managedUsers()->count() }}</td></tr>
                            <tr><td>{{ __('user.managed_couple') }}</td><td>{{ $managedCoupleCount = $user->managedCouples()->count() }}</td></tr>
                        </table>
                        @if ($childsCount + $spousesCount + $managedUserCount + $managedCoupleCount)
                            {{ __('user.replace_delete_text') }}
                            {{ Form::open([
                                'route' => ['users.destroy', $user],
                                'method' => 'delete',
                                'onsubmit' => 'return confirm("'.__('user.replace_confirm').'")',
                            ]) }}
                            {!! FormField::select('replacement_user_id', $replacementUsers, [
                                'label' => false,
                                'placeholder' => __('user.replacement'),
                            ]) !!}
                            {{ Form::submit(__('user.replace_delete_button'), [
                                'name' => 'replace_delete_button',
                                'class' => 'btn btn-danger',
                            ]) }}
                            {{ link_to_route('users.edit', __('app.cancel'), [$user], ['class' => 'btn btn-default pull-right']) }}
                            {{ Form::close() }}
                        @else
                            {!! FormField::delete(
                                ['route' => ['users.destroy', $user]],
                                __('user.delete_confirm_button'),
                                ['class' => 'btn btn-danger'],
                                ['user_id' => $user->id]
                            ) !!}
                            {{ link_to_route('users.edit', __('app.cancel'), [$user], ['class' => 'btn btn-default']) }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endcan
@else
<div class="container-fluid mt-3">
    <div class="mb-2  text-dark col-12 border pt-2">
        <div class="row mb-6">
            <div class="col-6"> <h5> {{ $user->profileLink() }} <small>({{ __('user.edit') }})</small></h5></div>
            
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    {{ link_to_route('users.show', __('app.show_profile').' '.$user->name, [$user->id], ['class' => 'nav-link active']) }}
                </li> &nbsp;
                @can('delete', $user)
                <li>{{ link_to_route('users.edit', __('user.delete'), [$user, 'action' => 'delete'], ['class' => 'btn btn-danger pull-right', 'id' => 'del-user-'.$user->id]) }}</li>
                @endcan
            </ul>
            
        </div>
    </div><div class="col-12">
    <div class="row">
        <div class="mb-2 text-dark col-9 border pt-2">
            <div class="row">
                <div class="col-md-4 jpbox1 border border-muted rounded p-1 m-1">
                    {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' =>'patch', 'autocomplete' => 'off']) }}
                    <div class="panel panel-default">
                        <div class="panel-heading"><u><h5 class="panel-title">{{ __('Personal Details') }}</h5></u></div>
                        <div class="panel-body">
                            {!! FormField::text('name', ['label' => __('user.name')]) !!}
                            {!! FormField::text('nickname', ['label' => __('user.nickname')]) !!}
                            <div class="row">
                                <div class="col-md-6">{!! FormField::radios('gender_id', [1 => __('app.male_code'), __('app.female_code')], ['label' => __('user.gender')]) !!}</div>
                                <div class="col-md-4">
                                    {!! FormField::text('birth_order', ['label' => __('user.birth_order'), 'type' => 'number', 'min' => 1]) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">{!! FormField::text('pob', ['label' => __('Place of Birth'), 'placeholder' => __('Place Of Birth')]) !!}</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tob">Time of Birth:</label>
                                        <input type="time" name="tob" id="time" class="form-control" value="{{ $user->tob }}" placeholder="Time of Birth"/>
                                    </div>
                                </div>
                                
                                {{-- <div class="col-md-6">{!! FormField::time('tob', ['label' => __('Time of Birth')]) !!}</div> --}}

                                <div class="col-md-6">{!! FormField::text('yob', ['label' => __('user.yob'), 'placeholder' => __('app.example').' 1959']) !!}</div>
                                <div class="col-md-6">{!! FormField::text('dob', ['label' => __('user.dob'), 'placeholder' => __('app.example').' 1959-07-20']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">{!! FormField::text('yod', ['label' => __('user.yod'), 'placeholder' => __('app.example').' 2003']) !!}</div>
                                <div class="col-md-6">{!! FormField::text('dod', ['label' => __('user.dod'), 'placeholder' => __('app.example').' 2003-10-17']) !!}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-heading"><u><h5 class="panel-title">{{ __('app.login_account') }}</h5></u></div>
                        <div class="panel-body">
                            {!! FormField::email('email', ['label' => __('auth.email'), 'placeholder' => __('app.example').' nama@mail.com']) !!}
                            {!! FormField::password('password', ['label' => __('auth.password'), 'placeholder' => '******', 'value' => '']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 jpbox1 border border-muted rounded p-1 m-1 tooltipLink" data-tooltip="{{ __('Religions Panel') }}" title="{{ __('Religions Panel') }}">
                    <div class="panel panel-default">
                        <div class="panel-heading"><u><h5 class="panel-title">{{ __('Religions') }}</h5></u></div>
                        <div class="panel-body">
                            
                            <div class="form-group d-none">
                                <label for="religion">Select Religion:</label>
                                <select name="relign_id" class="form-control">
                                    <option value="">--- Select Religion ---</option>
                                    @foreach ($religions as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->relign_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group d-none">
                                <label for="cast">Select Cast:</label>
                                <select name="cast_id" class="form-control">
                                    <option value="">--- Select Cast ---</option>
                                    @foreach ($casts as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->cast_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="dynasty">Select Dynasty:</label>
                                <select name="dynasty_id" class="form-control">
                                    <option value="">--- Select Dynasty ---</option>
                                    @foreach ($dynasties as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->dynasty_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="clan">Select Gotra:</label>
                                <select name="clan_id" class="form-control">
                                    <option value="">--- Select Gotra ---</option>
                                    @foreach ($clans as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->clan_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subclan">Select Sub-Gotra:</label>
                                <select name="subclan_id" class="form-control">
                                    <option value="">--- Select Sub-Gotra ---</option>
                                    @foreach ($subclans as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->subclan_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- {!! FormField::textarea('address', ['label' => __('app.address')]) !!}
                            {!! FormField::text('city', ['label' => __('app.city'), 'placeholder' => __('app.example').' Jakarta']) !!}
                            {!! FormField::text('phone', ['label' => __('app.phone'), 'placeholder' => __('app.example').' 081234567890']) !!} --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 jpbox1 border border-muted rounded p-1 m-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><u><h5 class="panel-title">{{ __('app.address') }} &amp; {{ __('app.contact') }}</h5></u></div>
                        <div class="panel-body">
                            {!! FormField::text('phone', ['label' => __('app.phone'), 'placeholder' => __('app.example').' 081234567890']) !!}
                            {!! FormField::text('address', ['label' => __('Current Location')]) !!}                            
                            <div class="form-group">
                                <label for="country">Select Country:</label>
                                <select name="country_id" class="form-control">
                                    <option value="">--- Select Country ---</option>
                                    @foreach ($countries as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->country_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="state">Select State:</label>
                                <select name="state_id" class="form-control">
                                    <option value="">--- Select State ---</option>
                                    @foreach ($states as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->state_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="city">Select City:</label>
                                <select name="city_id" class="form-control">
                                    <option value="">--- Select City ---</option>
                                    @foreach ($cities as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->city_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tehsil">Select Tehsil:</label>
                                <select name="tehsil_id" class="form-control">
                                    <option value="">--- Select Tehsil ---</option>
                                    @foreach ($tehsils as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->tehsil_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="village">Select Village:</label>
                                <select name="village_id" class="form-control">
                                    <option value="">--- Select Village ---</option>
                                    @foreach ($villages as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->village_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>                
                    <hr>
                    <div class="text-right" style="margin-bottom: 1em;">
                        {{ Form::submit(__('app.update'), ['class' => 'btn btn-primary']) }}
                        {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-danger']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="mb-2 text-dark col-3 border pt-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">{{ __('user.update_photo') }}</h3></div>
                {{ Form::open(['route' => ['users.photo-upload', $user], 'method' => 'patch', 'files' => true]) }}
                <div class="panel-body text-center">
                    {{ userPhoto($user, ['style' => 'width:100%;max-width:300px']) }}
                </div>
                <div class="panel-body">
                    {!! FormField::file('photo', ['required' => true, 'label' => __('user.reupload_photo'), 'info' => ['text' => 'Format jpg, maks: 200 Kb.', 'class' => 'warning']]) !!}
                </div>
                <div class="panel-footer">
                    {!! Form::submit(__('user.update_photo'), ['class' => 'btn btn-success']) !!}
                    {{ link_to_route('users.show', __('app.cancel'), [$user], ['class' => 'btn btn-danger']) }}
                </div>
                {{ Form::close() }}
            </div>
            
        </div>
    </div></div>
</div>





    
    
    {{-- <div class="col-md-12">
        {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' =>'patch', 'autocomplete' => 'off']) }}
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">{{ __('user.edit') }}</h3></div>
                <div class="panel-body">
                    {!! FormField::text('name', ['label' => __('user.name')]) !!}
                    {!! FormField::text('nickname', ['label' => __('user.nickname')]) !!}
                    <div class="row">
                        <div class="col-md-6">{!! FormField::radios('gender_id', [1 => __('app.male_code'), __('app.female_code')], ['label' => __('user.gender')]) !!}</div>
                        <div class="col-md-4">
                            {!! FormField::text('birth_order', ['label' => __('user.birth_order'), 'type' => 'number', 'min' => 1]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{!! FormField::text('yob', ['label' => __('user.yob'), 'placeholder' => __('app.example').' 1959']) !!}</div>
                        <div class="col-md-6">{!! FormField::text('dob', ['label' => __('user.dob'), 'placeholder' => __('app.example').' 1959-07-20']) !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{!! FormField::text('yod', ['label' => __('user.yod'), 'placeholder' => __('app.example').' 2003']) !!}</div>
                        <div class="col-md-6">{!! FormField::text('dod', ['label' => __('user.dod'), 'placeholder' => __('app.example').' 2003-10-17']) !!}</div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                {{ Form::submit(__('app.update'), ['class' => 'btn btn-primary']) }}
                {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">{{ __('app.address') }} &amp; {{ __('app.contact') }}</h3></div>
                <div class="panel-body">
                    {!! FormField::textarea('address', ['label' => __('app.address')]) !!}
                    {!! FormField::text('city', ['label' => __('app.city'), 'placeholder' => __('app.example').' Jakarta']) !!}
                    {!! FormField::text('phone', ['label' => __('app.phone'), 'placeholder' => __('app.example').' 081234567890']) !!}
                </div>
            </div>
            <div class="panel panel-default jpbox2">
                <div class="panel-heading"><h3 class="panel-title">{{ __('app.login_account') }}</h3></div>
                <div class="panel-body">
                    {!! FormField::email('email', ['label' => __('auth.email'), 'placeholder' => __('app.example').' nama@mail.com']) !!}
                    {!! FormField::password('password', ['label' => __('auth.password'), 'placeholder' => '******', 'value' => '']) !!}
                </div>
            </div>
        </div>
        {{ Form::close() }}
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">{{ __('user.update_photo') }}</h3></div>
                {{ Form::open(['route' => ['users.photo-upload', $user], 'method' => 'patch', 'files' => true]) }}
                <div class="panel-body text-center">
                    {{ userPhoto($user, ['style' => 'width:100%;max-width:300px']) }}
                </div>
                <div class="panel-body">
                    {!! FormField::file('photo', ['required' => true, 'label' => __('user.reupload_photo'), 'info' => ['text' => 'Format jpg, maks: 200 Kb.', 'class' => 'warning']]) !!}
                </div>
                <div class="panel-footer">
                    {!! Form::submit(__('user.update_photo'), ['class' => 'btn btn-success']) !!}
                    {{ link_to_route('users.show', __('app.cancel'), [$user], ['class' => 'btn btn-default']) }}
                </div>
                {{ Form::close() }}
            </div>
            @can('delete', $user)
                {{ link_to_route('users.edit', __('user.delete'), [$user, 'action' => 'delete'], ['class' => 'btn btn-danger pull-right', 'id' => 'del-user-'.$user->id]) }}
            @endcan
        </div>
    </div> --}}
@endif
@endsection

@section('ext_css')
<link href="{{ asset('css/plugins/jquery.datetimepicker.css') }}" rel="stylesheet">
@endsection

@section('script')
<script src="{{ asset('js/plugins/jquery.datetimepicker.js') }}"></script>
<script>
    (function() {
        $('#dob,#dod').datetimepicker({
            timepicker:false,
            format:'Y-m-d',
            closeOnDateSelect: true,
            scrollInput: false
        });
    })();

    //$('$time').pickatime()
</script>
<script type="text/javascript">
    $(document).ready(function ()
    {
        jQuery('select[name="relign_id"]').on('change',function(){
            var relignID = jQuery(this).val();
            if(relignID)
            {
                jQuery.ajax({
                    url : 'getCast/'+relignID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        jQuery('select[name="cast_id"]').empty();
                        jQuery.each(data, function(key,value){
                            $('select[name="cast_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="cast_id"]').empty();
            }
        });
    });

    $(document).ready(function ()
    {
        jQuery('select[name="clan_id"]').on('change',function(){
            var clanID = jQuery(this).val();
            if(clanID)
            {
                jQuery.ajax({
                    url : 'getSubclan/'+clanID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        jQuery('select[name="subclan_id"]').empty();
                        jQuery.each(data, function(key,value){
                            $('select[name="subclan_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="subclan_id"]').empty();
            }
        });
    });

    $(document).ready(function ()
    {
        jQuery('select[name="country_id"]').on('change',function(){
            var countryID = jQuery(this).val();
            if(countryID)
            {
                jQuery.ajax({
                    url : 'getState/'+countryID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        jQuery('select[name="state_id"]').empty();
                        jQuery.each(data, function(key,value){
                            $('select[name="state_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="state_id"]').empty();
            }
        });
    });

    $(document).ready(function ()
    {
        jQuery('select[name="state_id"]').on('change',function(){
            var stateID = jQuery(this).val();
            if(stateID)
            {
                jQuery.ajax({
                    url : 'getCity/'+stateID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        jQuery('select[name="city_id"]').empty();
                        jQuery.each(data, function(key,value){
                            $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="city_id"]').empty();
            }
        });
    });

    $(document).ready(function ()
    {
        jQuery('select[name="city_id"]').on('change',function(){
            var cityID = jQuery(this).val();
            if(cityID)
            {
                jQuery.ajax({
                    url : 'getTehsil/'+cityID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        jQuery('select[name="tehsil_id"]').empty();
                        jQuery.each(data, function(key,value){
                            $('select[name="tehsil_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="tehsil_id"]').empty();
            }
        });
    });

    $(document).ready(function ()
    {
        jQuery('select[name="tehsil_id"]').on('change',function(){
            var tehsilID = jQuery(this).val();
            if(tehsilID)
            {
                jQuery.ajax({
                    url : 'getVillage/'+tehsilID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        jQuery('select[name="village_id"]').empty();
                        jQuery.each(data, function(key,value){
                            $('select[name="village_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="village_id"]').empty();
            }
        });
    });
</script>

@endsection
