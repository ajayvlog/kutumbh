<div class="row" >
    <div class="col-12">
        <div class="col-md-6" style="float: right">        
            @can ('edit', $user)
                <div class="pull-right" id="addnotes">
                    <a href="javascript:void(0)" class="addLink" id="add_notes"><i class="fas fa-plus-circle"></i></a>
                    <div class="input-group-append">
                        <span class="mt-3 ml-2"> <small>Add Notes</small></span>
                    </div>
                </div>
                <div id=formNotes style="display: none;">
                    <h4>Create Note</h4>
                    {{ Form::open(['route' => ['create-notes',$user->id ]]) }}
                        
                        <div class="form-group">
                            {{ Form::hidden('user_id', $user->id) }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => __('Enter Note Text Here'), 'cols' => 20, 'rows' =>5]) }}
                        </div>
                        <span class="form-group">
                                {{ Form::submit(__('app.update'), ['class' => 'btn btn-info btn-sm', 'id' => 'add_notes_button']) }}
                                {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
                            </span>
                        
                    {{ Form::close() }} 
                </div>
            @endcan
        </div>
    </div>
</div>