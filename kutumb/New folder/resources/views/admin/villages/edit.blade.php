@extends('admin.layouts.adminapp')

@section('title', 'Village Managment')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h3 class="mt-4">Village Managment</h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Village</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Edit Village
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-primary" href="{{ route('admin.villages.index') }}"> Back</a>                            
                        </div>
                    </div>               
                   
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.villages.update',$village->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="state">Select State:</label>
                                <select name="state_id" class="form-control" style="width:500px">
                                    <option value="">--- Select State ---</option>
                                    @foreach ($states as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $village->state_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city">Select City:</label>
                                <select name="city_id" class="form-control"style="width:500px">
                                <option>--Select City--</option>
                                @foreach ($cities as $key => $value)
                                    <option value="{{ $key }}" {{ $key == $village->city_id ? 'selected':'' }}>{{ $value }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tehsil">Select Tehsil:</label>
                                <select name="tehsil_id" class="form-control"style="width:500px">
                                <option>--Select Tehsil--</option>
                                @foreach ($tehsils as $key => $value)
                                    <option value="{{ $key }}" {{ $key == $village->tehsil_id ? 'selected':'' }}>{{ $value }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Village Name:</strong>
                                <input type="text" name="village_name" value="{{ $village->village_name }}" class="form-control" placeholder="Enter Village Name" style="width:500px">
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div> 
                </div>               
            </div>
        </main>
    </div>
    <script type="text/javascript">
        $(document).ready(function ()
        {
            jQuery('select[name="state_id"]').on('change',function(){
                var stateID = jQuery(this).val();
                if(stateID)
                {
                    jQuery.ajax({
                        url : 'getEditCity/'+stateID,
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
                    $('select[name="city_id"]').append('<option value="">No Tehsil Available</option>');
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
                        url : 'getEditTehsil/'+cityID,
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
                    $('select[name="tehsil_id"]').append('<option value="">No Tehsil Available</option>');
                }
            });
        });
    </script>
@endsection