@extends('admin.layouts.adminapp')

@section('title', 'State Managment')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h3 class="mt-4">State Managment</h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">State</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Edit State
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-primary" href="{{ route('admin.states.index') }}"> Back</a>                            
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
                        <form action="{{ route('admin.states.update',$state->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="country">Select Country:</label>
                                <select name="country_id" class="form-control" style="width:500px">
                                    <option value="">--- Select Country ---</option>
                                    @foreach ($countries as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $state->country_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>State Name:</strong>
                                <input type="text" name="state_name" value="{{ $state->state_name }}" class="form-control" placeholder="Enter State Name">
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
@endsection