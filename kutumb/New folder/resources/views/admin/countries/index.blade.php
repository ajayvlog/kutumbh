@extends('admin.layouts.adminapp')

@section('title', 'Country Managment')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h3 class="mt-4">Country Managment</h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">State</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Country List
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-success" href="{{ route('admin.countries.create') }}"> Create New Country</a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Country Name</th>
                                        <th>Actions</th>                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Country Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $country->country_name }}</td>
                                            <td>
                                                <form action="{{ route('admin.countries.destroy',$country->id) }}" method="POST">
                                
                                                    <a class="btn btn-info" href="{{ route('admin.countries.show',$country->id) }}">Show</a>
                                    
                                                    <a class="btn btn-primary" href="{{ route('admin.countries.edit',$country->id) }}">Edit</a>
                                
                                                    @csrf
                                                    @method('DELETE')
                                    
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach                                                                    
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!! $countries->links(); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection