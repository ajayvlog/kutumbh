@extends('admin.layouts.adminapp')

@section('title', 'Subclan Managment')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h3 class="mt-4">Subclan Managment</h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Subclan</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Edit Subclan
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-primary" href="{{ route('admin.subclans.index') }}"> Back</a>                            
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
                        <form action="{{ route('admin.subclans.update',$subclan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="clan">Select Clan:</label>
                                <select name="clan_id" class="form-control" style="width:500px">
                                    <option value="">--- Select Clan ---</option>
                                    @foreach ($clans as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $subclan->clan_id ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Subclan Name:</strong>
                                <input type="text" name="subclan_name" value="{{ $subclan->subclan_name }}" class="form-control" placeholder="Enter Subclan Name" style="width:500px">
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