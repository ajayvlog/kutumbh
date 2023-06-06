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
                        State List
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-success" href="{{ route('admin.states.create') }}"> Create New State</a>
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
                                        <th>State Name</th>
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
                                    
                                    @foreach ($states as $state)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $state->countries->country_name }}</td>
                                            {{-- <td>{{ $state->country_id }}</td> --}}
                                            <td>{{ $state->state_name }}</td>
                                            <td>
                                                <form action="{{ route('admin.states.destroy',$state->id) }}" method="POST">
                                
                                                    <a class="btn btn-info" href="{{ route('admin.states.show',$state->id) }}">Show</a>
                                    
                                                    <a class="btn btn-primary" href="{{ route('admin.states.edit',$state->id) }}">Edit</a>
                                
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
                                {!! $states->links(); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection