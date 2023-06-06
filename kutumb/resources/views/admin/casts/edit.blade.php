@extends('admin.layouts.adminapp')

@section('title', 'Cast Managment')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h3 class="mt-4">Cast Managment</h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Cast</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Edit Cast
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-primary" href="{{ route('admin.casts.index') }}"> Back</a>                            
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
                        <form action="{{ route('admin.casts.update',$cast->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="religion">Select Religion:</label>
                                <select name="relgn_id" class="form-control" style="width:500px">
                                    <option value="">--- Select Religion ---</option>
                                    @foreach ($religions as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $cast->relgn_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Cast Name:</strong>
                                <input type="text" name="cast_name" value="{{ $cast->cast_name }}" class="form-control" placeholder="Enter Cast Name" style="width:500px">
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