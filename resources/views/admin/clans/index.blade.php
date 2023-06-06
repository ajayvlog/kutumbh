@extends('admin.layouts.adminapp')

@section('title', 'Clan Managment')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h3 class="mt-4">Clan Managment</h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Clan</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Clan List
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-success" href="{{ route('admin.clans.create') }}"> Create New Clan</a>
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
                                        <th>Clan Name</th>
                                        <th>Actions</th>                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Clan Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($clans as $clan)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $clan->clan_name }}</td>
                                            <td>
                                                <form action="{{ route('admin.clans.destroy',$clan->id) }}" method="POST">
                                
                                                    <a class="btn btn-info" href="{{ route('admin.clans.show',$clan->id) }}">Show</a>
                                    
                                                    <a class="btn btn-primary" href="{{ route('admin.clans.edit',$clan->id) }}">Edit</a>
                                
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
                                {!! $clans->links(); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection