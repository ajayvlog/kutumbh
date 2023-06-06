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
                        Cast List
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-success" href="{{ route('admin.casts.create') }}"> Create New Cast</a>
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
                                        <th>Cast Name</th>
                                        <th>Religion Name</th>
                                        <th>Actions</th>                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Cast Name</th>
                                        <th>Religion Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($casts as $cast)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $cast->cast_name }}</td>
                                            <td>{{ $cast->religions->relgn_name }}</td>
                                            <td>
                                                <form action="{{ route('admin.casts.destroy',$cast->id) }}" method="POST">
                                
                                                    <a class="btn btn-info" href="{{ route('admin.casts.show',$cast->id) }}">Show</a>
                                    
                                                    <a class="btn btn-primary" href="{{ route('admin.casts.edit',$cast->id) }}">Edit</a>
                                
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
                                {!! $casts->links(); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection