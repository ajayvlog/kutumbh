<?php
$marriages = $user->marriages()->with('husband', 'wife')
            ->withCount('childs')->get();
?>
{{-- <div class="row"> --}}
    <div class="p-3 mt-3">
        <h5>{{ __('Marriage Details') }}</h5>
        @if ($marriages->isEmpty())
            <i>{{ __('Marriage were not recorded') }}</i>
        @else
            @foreach ($marriages as $marriage)
                <div class="row">
                    <div class="col-md-1 col-2"></div>
                    <div class="col-md-11 col-10">
                        <div> <strong>{{ __('Hunband') }} </strong> </div>
                        <div> {{ $marriage->husband->profileLink() }}</div><hr>

                        <div> <strong>{{ trans('couple.wife') }} </strong> </div>
                        <div> {{ $marriage->wife->profileLink() }}</div><hr>

                        <div> <strong>{{ trans('couple.marriage_date') }}</strong> </div>
                        <div> {{ $marriage->marriage_date ? $marriage->marriage_date : 'Date Not Available' }}</div><hr>

                        @if ($marriage->divorce_date)
                            <div> <strong>{{ trans('couple.divorce_date') }}</strong> </div>
                            <div> {{ $marriage->divorce_date }}</div><hr>
                        @endif

                        <div> <strong>{{ trans('couple.childs_count') }}</strong> </div>
                        <div> {{ $marriage->childs_count }}</div>
                    </div>
                </div>
                <div class="panel-footer" style="margin-left: 29em;">
                    {{ link_to_route('couples.show', trans('couple.show'), [$marriage->id], ['class' => 'btn btn-primary btn-xs']) }}
                </div>
            @endforeach
        @endif
    </div>
{{-- </div> --}}