@extends('admin.layouts.adminapp')

@section('title', 'Dynasty Managment')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h3 class="mt-4">Dynasty Managment</h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dynasty</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Dynasty List
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-success" href="{{ route('admin.dynasties.create') }}"> Create New Dynasty</a>
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
                                        <th>Dynasty Name</th>
                                        <th>Actions</th>                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Dynasty Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($dynasties as $dynastie)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $dynastie->dynasty_name }}</td>
                                            <td>
                                                <form action="{{ route('admin.dynasties.destroy',$dynastie->id) }}" method="POST">
                                
                                                    <a class="btn btn-info" href="{{ route('admin.dynasties.show',$dynastie->id) }}">Show</a>
                                    
                                                    <a class="btn btn-primary" href="{{ route('admin.dynasties.edit',$dynastie->id) }}">Edit</a>
                                
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
                                {!! $dynasties->links(); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection