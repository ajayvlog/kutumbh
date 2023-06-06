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
                        Village List
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-success" href="{{ route('admin.villages.create') }}"> Create New Village</a>
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
                                        <th>Village Name</th>
                                        <th>Tehsil Name</th>
                                        <th>City Name</th>
                                        <th>State Name</th>
                                        <th>Actions</th>                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Village Name</th>
                                        <th>Tehsil Name</th>
                                        <th>City Name</th>
                                        <th>State Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($villages as $village)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $village->village_name }}</td>
                                            <td>{{ $village->tehsil->tehsil_name }}</td>
                                            <td>{{ $village->tehsil->city->city_name }}</td>
                                            <td>{{ $village->tehsil->city->states->state_name }}</td>
                                            <td>
                                                <form action="{{ route('admin.villages.destroy',$village->id) }}" method="POST">
                                
                                                    <a class="btn btn-info" href="{{ route('admin.villages.show',$village->id) }}">Show</a>
                                    
                                                    <a class="btn btn-primary" href="{{ route('admin.villages.edit',$village->id) }}">Edit</a>
                                
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
                                {!! $villages->links(); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection