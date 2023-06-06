<div class="row">
    <div class="col-12">
        <div class="col-md-6" style="float: left">
            @if($user->medias)
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Date</th>    
                            {{-- <th>Actions</th>                                     --}}
                        </tr>
                    </thead>                    
                    <tbody>
                        @foreach($user->medias as $media)
                            <tr>
                                <td> <img src="{{ asset('storage/'.$media->file_path) }}"></td>
                                <td>{{ $media->title }}</td>
                                <td>{{ $media->description }}</td>
                                <td>{{ $media->location }}</td>
                                <td>{{ $media->date }}</td>
                            </tr>                    
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
        <div class="col-md-6" style="float: right">
            @can ('edit', $user)
                <div class="pull-right" id="addmedia">
                    <a href="javascript:void(0)" class="addLink" id="add_media"><i class="fas fa-plus-circle"></i></a>
                    <div class="input-group-append">
                        <span class="mt-3 ml-2"> <small>Add Media</small></span>
                    </div>                    
                </div>
                <div id=formMedia style="display: none;">
                    <h4>Upload Media</h4>
                    {{ Form::open(['route' => ['upload-media', $user->id], 'files' => true]) }}
                        <div class="form-group">
                            {{ Form::hidden('user_id', $user->id) }}
                            {{ Form::hidden('tab', 'media-post') }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Title')]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Description'), 'cols' => 20, 'rows' =>5]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => __('Location')]) }}
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="date" placeholder="{{ __('Date') }}" id="date"/>
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('video_url', null, ['class' => 'form-control', 'placeholder' => __('Video URL'), 'cols' => 20, 'rows' =>5]) }}
                        </div>
                        <div class="form-group">
                            <label for="file_path">Upload Image</label>
                            <input type="file" class="form-control" name="file_path" id="file_path">
                        </div>
                        <span class="form-group">
                            {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'add_media_button']) }}
                            {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
                        </span>
                    {{ Form::close() }} 
                </div>
            @endcan
        </div>
    </div>
</div>