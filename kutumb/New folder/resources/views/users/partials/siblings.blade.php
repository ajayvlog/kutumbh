{{-- <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">{{ trans('user.siblings') }}</h3></div>
    <table class="table">
        <tbody>
            @foreach($user->siblings() as $sibling)
            <tr>
                <td>
                    {{ $sibling->profileLink() }} ({{ $sibling->gender }})
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

    <div class="row">
        <div class="col-12 mb-3">
            <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseSiblings" role="button" aria-expanded="false" aria-controls="collapseSiblings">
                <strong>{{ trans('user.siblings') }}</strong>
            </a>
            <span class="text-muted">({{ $user->siblings()->count() }})</span>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="collapse show" id="collapseSiblings">
                <div class="row">
                    @foreach($user->siblings() as $sibling)
                        <div class="col-12">
                            <div class="input-group">
                                <div class="col-12 col-md-3">
                                    {{ userPhoto($sibling, ['class' => 'img-fluid rounded-circle border']) }}
                                </div>

                                <div class="col-12 col-md-9 text-center text-lg-left">
                                    <div> <span class="text-muted"> {{ $sibling->gender == 'F' ? __('Sister') : __('Brother') }}</span> </div>
                                    <div> <strong>{{ $sibling->profileLink() }} ({{ $sibling->gender }})</strong> </div>
                                    @if($sibling->yob)
                                        <div> <small class="text-muted">{{ trans('user.dob') }} {{ $sibling->yob }}</small> </div>
                                    @endif
                                </div>                                 
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>