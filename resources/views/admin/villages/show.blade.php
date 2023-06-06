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
                        Village View
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-primary" href="{{ route('admin.villages.index') }}"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Village Name:</th>
                                        <th>Tehsil Name:</th>
                                        <th>City Name:</th>
                                        <th>State Name:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $village->village_name }}</td>
                                        <td>{{ $village->tehsil->tehsil_name }}</td>
                                        <td>{{ $village->tehsil->city->city_name }}</td>
                                        <td>{{ $village->tehsil->city->states->state_name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div>                
            </div>
        </main>
    </div>
@endsection