@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        <div class="mb-2  text-dark col-12 border pt-2">
            @yield('user-content')
            @include('users.partials.action-buttons', ['user' => $user])
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                        <div class="row">
                            @include('users.partials.profile-timeline')
                            
                            @include('users.partials.parent-spouse')
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-chart" role="tabpanel" aria-labelledby="pills-chart-tab">
                        <div class="mb-2  text-dark col-12 border pt-2">
                            @include('users.partials.tabchart')
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-tree" role="tabpanel" aria-labelledby="pills-tree-tab">
                        <div class="mb-2  text-dark col-12 border pt-2">
                            @include('users.partials.tabtree')
                         </div>
                    </div>
                    <div class="tab-pane fade" id="pills-marriages" role="tabpanel" aria-labelledby="pills-marriages-tab">
                        <div class="mb-2  text-dark col-12 border pt-2">
                            @include('users.partials.tabmarriages')
                         </div>    
                    </div>
                    <div class="tab-pane fade" id="media-post" role="tabpanel" aria-labelledby="media-post-tab">
                        <div class="mb-2  text-dark col-12 border pt-2">
                            @include('users.partials.mediapost')
                         </div>    
                    </div>
                    <div class="tab-pane fade" id="pills-notes" role="tabpanel" aria-labelledby="pills-notes-tab">
                        <div class="mb-2  text-dark col-12 border pt-2">
                            @include('users.partials.notes')
                         </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
