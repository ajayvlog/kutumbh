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
                        Subclan View
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-primary" href="{{ route('admin.subclans.index') }}"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Subclan Name:</th>
                                        <th>Clan Name:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $subclan->subclan_name }}</td>
                                        <td>{{ $subclan->clans->clan_name }}</td>
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