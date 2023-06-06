{{-- <div class="pull-right btn-group" role="group">
    @can ('edit', $user)
    {{ link_to_route('users.edit', trans('app.edit'), [$user->id], ['class' => 'btn btn-warning']) }}
    @endcan
    {{ link_to_route('users.show', trans('app.show_profile').' '.$user->name, [$user->id], ['class' => Request::segment(3) == null ? 'btn btn-default active' : 'btn btn-default']) }}
    {{ link_to_route('users.chart', trans('app.show_family_chart'), [$user->id], ['class' => Request::segment(3) == 'chart' ? 'btn btn-default active' : 'btn btn-default']) }}
    {{ link_to_route('users.tree', trans('app.show_family_tree'), [$user->id], ['class' => Request::segment(3) == 'tree' ? 'btn btn-default active' : 'btn btn-default']) }}
    {{ link_to_route('users.marriages', trans('app.show_marriages'), [$user->id], ['class' => Request::segment(3) == 'marriages' ? 'btn btn-default active' : 'btn btn-default']) }}
</div> --}}

<div class="row">
    <div class="col-12 border border-bottom-0 border-left-0 border-right-0 mt-2">
        <div class="pt-1">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    {{-- {{ link_to_route('users.show', trans('app.show_profile').' '.$user->name, [$user->id], ['class' => Request::segment(3) == null ? 'nav-link active' : 'btn btn-default']) }} --}}
                    <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="true">Overview </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-chart-tab" data-toggle="pill" href="#pills-chart" role="tab" aria-controls="pills-chart" aria-selected="false">Family Chart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-tree-tab" data-toggle="pill" href="#pills-tree" role="tab" aria-controls="pills-tree" aria-selected="false">Family Tree</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="pills-marriages-tab" data-toggle="pill" href="#pills-marriages" role="tab" aria-controls="pills-marriages" aria-selected="false">Marriages</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" id="media-post-tab" data-toggle="pill" href="#media-post" role="tab" aria-controls="media-post" aria-selected="false">Media</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="pills-notes-tab" data-toggle="pill" href="#pills-notes" role="tab" aria-controls="pills-notes" aria-selected="false">Notes</a>
                </li>
            </ul>
        </div>
    </div>
</div>