
<div title='User Photo' class="col-3 col-md-1 border border-muted p-3 mb-5 rounded jpbox2 bg-white tooltipLink" data-tooltip="hover tooltip" >
    {{ userPhoto($user, ['class' => 'img-fluid rounded-circle border']) }}
</div>
<div class="col-md-6 col-6 ">
    <span> <strong title='User'>{{ $user->name }}</strong> </span> <span>@can ('edit', $user) <a class="text-dark" href="{{ route('users.edit',[$user->id]) }}"><i class="fas fa-pen"></i> </a> @endcan</span>

   <div> <small>@if($user->yob){{ trans('user.dob') }} {{ $user->yob }}, @endif {!! nl2br($user->address) !!}</small> </div>
   <div class="dropdown">
       <a href="#!" class="border dropdown-toggle pl-2 pr-2 text-dark rounded" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <small> View on tree</small>
       </a>
       <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            {{ link_to_route('users.tree', trans('app.show_family_tree'), [$user->id], ['class' => 'dropdown-item p-0 pl-2']) }}
            <a href="{{ route('users.pedigreetree', [$user->id] ) }}" class="dropdown-item p-0 pl-2">{{ __('Padigree View') }}</a>
        </div>
    </div>
</div>
<div class="col-md-5 col-3 text-md-right">
    @if($user->yob)
        <strong>
            {{ $user->yob }}-{{ $user->yod ? 'Expired':'Living' }}
        </strong>
    @endif
</div>
