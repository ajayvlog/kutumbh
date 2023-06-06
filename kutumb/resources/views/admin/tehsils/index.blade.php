@extends('admin.layouts.adminapp')

@section('title', 'Tehsil Managment')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h3 class="mt-4">Tehsil Managment</h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tehsil</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Tehsil List
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-success" href="{{ route('admin.tehsils.create') }}"> Create New Tehsil</a>
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
                                        <th>Tehsil Name</th>
                                        <th>City Name</th>
                                        <th>State Name</th>
                                        <th>Actions</th>                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tehsil Name</th>
                                        <th>City Name</th>
                                        <th>State Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($tehsils as $tehsil)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $tehsil->tehsil_name }}</td>
                                            <td>{{ $tehsil->city->city_name }}</td>
                                            <td>{{ $tehsil->state->state_name }}</td>
                                            <td>
                                                <form action="{{ route('admin.tehsils.destroy',$tehsil->id) }}" method="POST">
                                
                                                    <a class="btn btn-info" href="{{ route('admin.tehsils.show',$tehsil->id) }}">Show</a>
                                    
                                                    <a class="btn btn-primary" href="{{ route('admin.tehsils.edit',$tehsil->id) }}">Edit</a>
                                
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
                                {!! $tehsils->links(); !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection