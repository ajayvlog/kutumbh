{{-- @extends('layouts.user-profile-wide')

@section('subtitle', trans('app.family_tree'))



@section('user-content') --}}

<?php
$childsTotal = 0;
$grandChildsTotal = 0;
$ggTotal = 0;
$ggcTotal = 0;
$ggccTotal = 0;

$parentsTotal = 0;
$grandParentsTotal = 0;
$ggPTotal = 0;
$ggPcTotal = 0;
$ggccPTotal = 0;

?>

<div class="container-fluid mt-2 ">
    {{-- <div class="row justify-content-end">
        <div class="col-md-3 order-sm-12 mt-3">
            <div class="row no-gutters">
                <div class="col">
                    <input class="form-control border-secondary border-right-0 rounded-0" type="search" placeholder="Find someone on this tree" id="example-search-input4">
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-right order-sm-2 mt-3">
            <button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add a relative</button>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12 mt-2">
            <div class="my-custom-scrollbar my-custom-scrollbar-primary">
                <div class="tree">
                    @if ($parentsCount = $user->parents->count())
                        <?php $parentsTotal += $parentsCount ?>
                        @foreach($user->parents as $parent)
                           @if ($grandsPCount = $parent->parents->count())
                                <?php $grandParentsTotal += $grandsPCount ?>
                                @foreach($parent->parents as $grandP)
                                    @if ($ggPCount = $grandP->parents->count())
                                        <?php $ggPTotal += $ggPCount ?>
                                        @foreach($grandP->parents as $ggP)
                                            @if ($ggPcCount = $ggP->parents->count())
                                                <?php $ggPcTotal += $ggPcCount ?>
                                                @foreach($ggP->parents as $ggcP)
                                                    @if ($ggccPCount = $ggcP->parents->count())
                                                        <?php $ggccPTotal += $ggccPCount ?>
                                                        @foreach($ggcP->parents as $ggccP)
                                                        <ul>
                                                            <li>
                                                                <div>
                                                                    <span class="male">
                                                                        <a href="{{ route('users.show',[$ggccP->id]) }}" title="{{ $ggccP->name.' ('.$ggccP->gender.')' }}">
                                                                            <span class="img-gender">{{ userPhoto($ggccP, ['class' => '']) }}</span>
                                                                            <span class="name"> {{ $ggccP->name }} </span>
                                                                            <span class="gender">{{ $ggccP->gender }}</span>
                                                                        </a>
                                                                    </span>
                                                                    @if ($ggccP->gender_id == 1)
                                                                        @if ($ggccP->wifes->isEmpty() == false)
                                                                            @foreach($ggccP->wifes as $wife)
                                                                                <span class="female">
                                                                                    <a href="{{ route('users.show',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                        <span class="img-gender">{{ userPhoto($wife, ['class' => '']) }}</span>
                                                                                        <span class="name">{{ $wife->name }}</span>
                                                                                        <span class="gender">{{ $wife->gender }}</span>
                                                                                    </a>
                                                                                </span>
                                                                                @endforeach
                                                                        @endif
                                                                    @else
                                                                        @if ($ggccP->husbands->isEmpty() == false)
                                                                            @foreach($ggccP->husbands as $husband)
                                                                                <span class="female">
                                                                                    <a href="{{ route('users.show',[$husband->id]) }}" title="{{ $husband->name.' ('.$husband->gender.')' }}">
                                                                                        <span class="img-gender">{{ userPhoto($husband, ['class' => '']) }}</span>
                                                                                        <span class="name">{{ $husband->name }}</span>
                                                                                        <span class="gender">{{ $husband->gender }}</span>
                                                                                    </a>
                                                                                </span>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                        @endforeach
                                                    @endif
                                                    <ul>
                                                        <li>
                                                            <div>
                                                                <span class="male">
                                                                    <a href="{{ route('users.show',[$ggcP->id]) }}" title="{{'Great Great Grand Father->'. $ggcP->name.' ('.$ggcP->gender.')' }}">
                                                                        <span class="img-gender">{{ userPhoto($ggcP, ['class' => '']) }}</span>
                                                                        <span class="name"> {{ $ggcP->name }} </span>
                                                                        <span class="gender">{{ $ggcP->gender }}</span>
                                                                    </a>
                                                                </span>
                                                                @if ($ggcP->gender_id == 1)
                                                                    @if ($ggcP->wifes->isEmpty() == false)
                                                                        @foreach($ggcP->wifes as $wife)
                                                                            <span class="female">
                                                                                <a href="{{ route('users.show',[$wife->id]) }}" title="{{'Great Great Grand Mother->'.  $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                    <span class="img-gender">{{ userPhoto($wife, ['class' => '']) }}</span>
                                                                                    <span class="name">{{ $wife->name }}</span>
                                                                                    <span class="gender">{{ $wife->gender }}</span>
                                                                                </a>
                                                                            </span>
                                                                        @endforeach
                                                                    @endif
                                                                @else
                                                                    @if ($ggcP->husbands->isEmpty() == false)
                                                                        @foreach($ggcP->husbands as $husband)
                                                                            <span class="female">
                                                                                <a href="{{ route('users.show',[$husband->id]) }}" title="{{'Great Great Grand Other->'.  $husband->name.' ('.$husband->gender.')' }}">
                                                                                    <span class="img-gender">{{ userPhoto($husband, ['class' => '']) }}</span>
                                                                                    <span class="name">{{ $husband->name }}</span>
                                                                                    <span class="gender">{{ $husband->gender }}</span>
                                                                                </a>
                                                                            </span>
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            </div>
                                                    @endforeach
                                                @endif
                                                
                                            
                                                <ul>
                                                    <li>
                                                        <div>
                                                            <span class="male">
                                                                <a href="{{ route('users.show',[$ggP->id]) }}" title="{{'Great Grand Father->'. $ggP->name.' ('.$ggP->gender.')' }}">
                                                                    <span class="img-gender">{{ userPhoto($ggP, ['class' => '']) }}</span>
                                                                    <span class="name"> {{ $ggP->name }} </span>
                                                                    <span class="gender">{{ $ggP->gender }}</span>
                                                                </a>
                                                            </span>
                                                            @if ($ggP->gender_id == 1)
                                                                @if ($ggP->wifes->isEmpty() == false)
                                                                    @foreach($ggP->wifes as $wife)
                                                                        <span class="female">
                                                                            <a href="{{ route('users.show',[$wife->id]) }}" title="{{'Great Grand Mother->'. $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                <span class="img-gender">{{ userPhoto($wife, ['class' => '']) }}</span>
                                                                                <span class="name">{{ $wife->name }}</span>
                                                                                <span class="gender">{{ $wife->gender }}</span>
                                                                            </a>
                                                                        </span>
                                                                    @endforeach
                                                                @endif
                                                            @else
                                                                @if ($ggP->husbands->isEmpty() == false)
                                                                    @foreach($ggP->husbands as $husband)
                                                                        <span class="female">
                                                                            <a href="{{ route('users.show',[$husband->id]) }}" title="{{'Grand other->'. $husband->name.' ('.$husband->gender.')' }}">
                                                                                <span class="img-gender">{{ userPhoto($husband, ['class' => '']) }}</span>
                                                                                <span class="name">{{ $husband->name }}</span>
                                                                                <span class="gender">{{ $husband->gender }}</span>
                                                                            </a>
                                                                        </span>
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        </div>
                                                @endforeach
                                            @endif
                                            <ul>
                                                <li>
                                                    <div>
                                                        <span class="male">
                                                            <a href="{{ route('users.show',[$grandP->id]) }}" title="{{'Grand Father ->'. $grandP->name.' ('.$grandP->gender.')' }}">
                                                                <span class="img-gender">{{ userPhoto($grandP, ['class' => '']) }}</span>
                                                                <span class="name"> {{ $grandP->name }} </span>
                                                                <span class="gender">{{ $grandP->gender }}</span>
                                                            </a>
                                                        </span>
                                                        @if ($grandP->gender_id == 1)
                                                            @if ($grandP->wifes->isEmpty() == false)
                                                                @foreach($grandP->wifes as $wife)
                                                                    <span class="female">
                                                                        <a href="{{ route('users.show',[$wife->id]) }}" title="{{'Grand Mother->'. $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                            <span class="img-gender">{{ userPhoto($wife, ['class' => '']) }}</span>
                                                                            <span class="name">{{ $wife->name }}</span>
                                                                            <span class="gender">{{ $wife->gender }}</span>
                                                                        </a>
                                                                    </span>
                                                                @endforeach
                                                            @endif
                                                        @else
                                                            @if ($grandP->husbands->isEmpty() == false)
                                                                @foreach($grandP->husbands as $husband)
                                                                    <span class="female">
                                                                        <a href="{{ route('users.show',[$husband->id]) }}" title="{{'Other->'. $husband->name.' ('.$husband->gender.')' }}">
                                                                            <span class="img-gender">{{ userPhoto($husband, ['class' => '']) }}</span>
                                                                            <span class="name">{{ $husband->name }}</span>
                                                                            <span class="gender">{{ $husband->gender }}</span>
                                                                        </a>
                                                                    </span>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </div>
                                            @endforeach
                                        @endif
                                        <ul>
                                            <li>
                                                <div>
                                                    <span class="male">
                                                        <a href="{{ route('users.show',[$parent->id]) }}" title="{{'Father '. $parent->name.' ('.$parent->gender.')' }}">
                                                            <span class="img-gender">{{ userPhoto($parent, ['class' => '']) }}</span>
                                                            <span class="name"> {{ $parent->name }} </span>
                                                            <span class="gender">{{ $parent->gender }}</span>
                                                        </a>
                                                    </span> 
                                                    @if ($parent->gender_id == 1)
                                                        @if ($parent->wifes->isEmpty() == false)
                                                            @foreach($parent->wifes as $wife)
                                                                <span class="female">
                                                                    <a href="{{ route('users.show',[$wife->id]) }}" title="{{'Mother '. $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                        <span class="img-gender">{{ userPhoto($wife, ['class' => '']) }}</span>
                                                                        <span class="name">{{ $wife->name }}</span>
                                                                        <span class="gender">{{ $wife->gender }}</span>
                                                                    </a>
                                                                </span>
                                                            @endforeach
                                                        @endif
                                                    @else
                                                        @if ($parent->husbands->isEmpty() == false)
                                                            @foreach($parent->husbands as $husband)
                                                                <span class="female">
                                                                    <a href="{{ route('users.show',[$husband->id]) }}" title="{{'Other Parent '. $husband->name.' ('.$husband->gender.')' }}">
                                                                        <span class="img-gender">{{ userPhoto($husband, ['class' => '']) }}</span>
                                                                        <span class="name">{{ $husband->name }}</span>
                                                                        <span class="gender">{{ $husband->gender }}</span>
                                                                    </a>
                                                                </span>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </div>
 
                                            <!-- For in laws -->

                                            <?php 
                                            $f='';
                                            $m='';
                                            $g='';

                                            if(Auth::check())
                                            {
                                            $g = \App\Helpers\Common::getSpouseParents(Auth::user()->id,Auth::user()->gender_id) ;  
 
                                            if($g) {
                                                $f=\App\Helpers\Common::getUserName($g->father_id);
                                                $m=\App\Helpers\Common::getUserName($g->mother_id);

                                               }
                                            }
                                            ?> 
                                                <div>

                                                 @if($f)
                                                    <span class="male">
                                                        <a href="{{ route('users.show',[$f->id]) }}" title="{{'Father in Law '. $parent->name.' ('.$parent->gender.')' }}">
                                                            <span class="img-gender">{{ userPhoto($parent, ['class' => '']) }}</span>
                                                            <span class="name"> {{ $f->name??'' }} </span>
                                                            <span class="gender">{{ $f->gender??'' }}</span>
                                                        </a>
                                                    </span> 
                                                 @endif 
                                                  
                                                 @if($m)
                                                    <span class="female">
                                                                    <a href="{{ route('users.show',[$m->id]) }}" title="{{'Mother in Law '. $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                        <span class="img-gender">{{ userPhoto($wife, ['class' => '']) }}</span>
                                                                        <span class="name">{{ $m->name }}</span>
                                                                        <span class="gender">{{ $m->gender }}</span>
                                                                    </a>
                                                    </span>
                                                 @endif

                                                </div>
                                                
                                        @endforeach
                                    @endif
                                    
                                    <ul>
                                        <li>
                                            <div>
											<?php 
                                            $a=[];
                                            if(Auth::check())
                                            {
                                            if(Auth::user()->parent_id)
                                            {
                                                $bo=(Auth::user()->birth_order)?Auth::user()->birth_order:0;
                                                 
                                            $a = \App\Helpers\Common::getparents(Auth::user()->parent_id,$bo,1) ;   
                                            }
                                            }
                                            ?>
                                            
                                            @if(count($a))
                                            @foreach($a as $l)
                                            <span class="{{($l->gender_id==2)?'female':'male'}}">
                                                    <a href="https://kutumb.profsys.in/users/{{$l->id}}" title="{{($l->gender_id==2)?'Sister':'Brother'}} {{$l->name}} ({{($l->gender_id==2)?'F':'M'}})">
                                                        <span class="img-gender"><img src="https://kutumb.profsys.in/images/icon_user_new_{{($l->gender_id==2)?'2':'1'}}.png"></span>
                                                        <span class="name"> {{$l->name}} </span>
                                                        <span class="gender">{{($l->gender_id==2)?'F':'M'}}</span>
                                                    </a>
                                                </span>
                                            @endforeach   
                                            @endif    

												
												
                                                 <span class="male">
                                                    <a href="{{ route('users.show',[$user->id]) }}" title="{{'Self '. $user->name.' ('.$user->gender.')' }}">
                                                        <span class="img-gender">{{ userPhoto($user, []) }}</span>
                                                        <span class="name"> {{ $user->name }} </span>
                                                        <span class="gender">{{ $user->gender }}</span>
                                                    </a>
                                                </span>
                                                @if ($user->gender_id == 1)
                                                    @if ($user->wifes->isEmpty() == false)
                                                        @foreach($user->wifes as $wife)
                                                            <span class="female">
                                                                <a href="{{ route('users.show',[$wife->id]) }}" title="{{'Wife '. $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                    <span class="img-gender">{{ userPhoto($wife, []) }}</span>
                                                                    <span class="name">{{ $wife->name }}</span>
                                                                    <span class="gender">{{ $wife->gender }}</span>
                                                                </a>
                                                            </span>
                                                        @endforeach
                                                    @endif
                                                @else
                                                    @if ($user->husbands->isEmpty() == false)
                                                        @foreach($user->husbands as $husband)
                                                            <span class="female">
                                                                <a href="{{ route('users.show',[$husband->id]) }}" title="{{'Husband '. $husband->name.' ('.$husband->gender.')' }}">
                                                                    <span class="img-gender">{{ userPhoto($husband, []) }}</span>
                                                                    <span class="name">{{ $husband->name }}</span>
                                                                    <span class="gender">{{ $husband->gender }}</span>
                                                                </a>
                                                            </span>
                                                        @endforeach
                                                    @endif
                                                @endif
                                                <?php 
                                                 $a=[];
                                                 if(Auth::check())
                                                 {
                                                 if(Auth::user()->parent_id)
                                                 {
                                                    $bo=(Auth::user()->birth_order)?Auth::user()->birth_order:0;
                                                $a = \App\Helpers\Common::getparents(Auth::user()->parent_id,$bo,2) ; 
                                                 }
                                                }
                                                ?>
                                            
                                            
                                            @if(count($a))
                                            @foreach($a as $l)
                                            <span class="{{($l->gender_id==2)?'female':'male'}}">
                                                    <a href="https://kutumb.profsys.in/users/{{$l->id}}" title="{{($l->gender_id==2)?'Sister':'Brother'}} {{$l->name}} ({{($l->gender_id==2)?'F':'M'}})">
                                                        <span class="img-gender"><img src="https://kutumb.profsys.in/images/icon_user_new_{{($l->gender_id==2)?'2':'1'}}.png"></span>
                                                        <span class="name"> {{$l->name}} </span>
                                                        <span class="gender">{{($l->gender_id==2)?'F':'M'}}</span>
                                                    </a>
                                                </span>
                                            
                                            <!-- brother spouse -->
                                           <?php 
                                            $f='';
                                            $m='';
                                            $g='';

                                            if(Auth::check())
                                            {
                                            $g = \App\Helpers\Common::getSiblingsSpouse($l->id,$l->gender_id) ;  
 
                                            if($g) {
                                                $f=\App\Helpers\Common::getUserName($g->id);
                                                $m=\App\Helpers\Common::getUserName($g->id);

                                               }
                                            }
                                            ?> 
                                                <div>

                                               {{--  @if($f)
                                                    <span class="male">
                                                        <a href="{{ route('users.show',[$f->id]) }}" title="{{'Sister in law'. $parent->name.' ('.$parent->gender.')' }}">
                                                            <span class="img-gender">{{ userPhoto($parent, ['class' => '']) }}</span>
                                                            <span class="name"> {{ $f->name??'' }} </span>
                                                            <span class="gender">{{ $f->gender??'' }}</span>
                                                        </a>
                                                    </span> 
                                                 @endif 
                                                  
                                                 @if($m)
                                                    <span class="female">
                                                                    <a href="{{ route('users.show',[$m->id]) }}" title="{{'Bhabhi'. $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                        <span class="img-gender">{{ userPhoto($wife, ['class' => '']) }}</span>
                                                                        <span class="name">{{ $m->name }}</span>
                                                                        <span class="gender">{{ $m->gender }}</span>
                                                                    </a>
                                                    </span>
                                                 @endif
                                                 --}}
                                                
                                                
                                            @endforeach   
                                            @endif    
                                            </div>
                                            @if ($childsCount = $user->childs->count())
                                                <?php $childsTotal += $childsCount ?>
                                                <ul>
                                                @foreach($user->childs as $child)
                                                    <li>
                                                        <div>
                                                             <span class="male">
                                                                <a href="{{ route('users.show',[$child->id]) }}" title=" {{($child->gender_id==1) ? 'Son' : 'Daughter'}} {{ $child->name.' ('.$child->gender.')' }}">
                                                                    <span class="img-gender">{{ userPhoto($child, []) }}</span>
                                                                    <span class="name"> {{ $child->name }} </span>
                                                                    <span class="gender">{{ $child->gender }}</span>
                                                                </a>
                                                            </span>
                                                            @if ($child->gender_id == 1)
                                                                @if ($child->wifes->isEmpty() == false)
                                                                    @foreach($child->wifes as $wife)
                                                                        <span class="female">
                                                                            <a href="{{ route('users.show',[$wife->id]) }}" title="{{'Daughter In Law '. $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                <span class="img-gender">{{ userPhoto($wife, []) }}</span>
                                                                                <span class="name">{{ $wife->name }}</span>
                                                                                <span class="gender">{{ $wife->gender }}</span>
                                                                            </a>
                                                                        </span>
                                                                    @endforeach
                                                                @endif
                                                            @else
                                                                @if ($child->husbands->isEmpty() == false)
                                                                    @foreach($child->husbands as $husband)
                                                                        <span class="female">
                                                                            <a href="{{ route('users.show',[$husband->id]) }}" title="{{'Son In Law '. $husband->name.' ('.$husband->gender.')' }}">
                                                                                <span class="img-gender">{{ userPhoto($husband, []) }}</span>
                                                                                <span class="name">{{ $husband->name }}</span>
                                                                                <span class="gender">{{ $husband->gender }}</span>
                                                                            </a>
                                                                        </span>
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        </div>
                                                        @if ($grandsCount = $child->childs->count())
                                                            <?php $grandChildsTotal += $grandsCount ?>
                                                            <ul>
                                                                @foreach($child->childs as $grand)
                                                                    <li> 
                                                                        <div>
                                                                            <span class="male">
                                                                                <a href="{{ route('users.show',[$grand->id]) }}" title="{{($grand->gender_id==1) ? 'Grand Son' : 'Grand Daughter'}} {{ $grand->name.' ('.$grand->gender.')' }}">
                                                                                    <span class="img-gender">{{ userPhoto($grand, []) }}</span>
                                                                                    <span class="name"> {{ $grand->name }} </span>
                                                                                    <span class="gender">{{ $grand->gender }}</span>
                                                                                </a>
                                                                            </span>
                                                                            @if ($grand->gender_id == 1)
                                                                                @if ($grand->wifes->isEmpty() == false)
                                                                                    @foreach($grand->wifes as $wife)
                                                                                        <span class="female">
                                                                                            <a href="{{ route('users.show',[$wife->id]) }}" title="Grand Daughters-in-law {{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                                <span class="img-gender">{{ userPhoto($wife, []) }}</span>
                                                                                                <span class="name">{{ $wife->name }}</span>
                                                                                                <span class="gender">{{ $wife->gender }}</span>
                                                                                            </a>
                                                                                        </span>
                                                                                    @endforeach
                                                                                @endif
                                                                            @else
                                                                                @if ($grand->husbands->isEmpty() == false)
                                                                                    @foreach($grand->husbands as $husband)
                                                                                        <span class="female">
                                                                                            <a href="{{ route('users.show',[$husband->id]) }}" title="Grand Sons-in-law {{ $husband->name.' ('.$husband->gender.')' }}">
                                                                                                <span class="img-gender">{{ userPhoto($husband, []) }}</span>
                                                                                                <span class="name">{{ $husband->name }}</span>
                                                                                                <span class="gender">{{ $husband->gender }}</span>
                                                                                            </a>
                                                                                        </span>
                                                                                    @endforeach
                                                                                @endif
                                                                            @endif
                                                                        </div> 
                                                                        @if ($ggCount = $grand->childs->count())
                                                                            <?php $ggTotal += $ggCount ?>
                                                                            <ul>
                                                                                @foreach($grand->childs as $gg)
                                                                                    <li>
                                                                                        <div>
                                                                                            <span class="male">
                                                                                                <a href="{{ route('users.show',[$gg->id]) }}" title="{{($gg->gender_id==1) ? 'Great Grand Son ' : 'Great Grand Daughter ' }} {{ $gg->name.' ('.$gg->gender.')' }}">
                                                                                                    <span class="img-gender">{{ userPhoto($gg, []) }}</span>
                                                                                                    <span class="name"> {{ $gg->name }} </span>
                                                                                                    <span class="gender">{{ $gg->gender }}</span>
                                                                                                </a>
                                                                                            </span>
                                                                                            @if ($gg->gender_id == 1)
                                                                                                @if ($gg->wifes->isEmpty() == false)
                                                                                                    @foreach($gg->wifes as $wife)
                                                                                                        <span class="female">
                                                                                                            <a href="{{ route('users.show',[$wife->id]) }}" title="Great Granddaughters-in-law {{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                                                <span class="img-gender">{{ userPhoto($wife, []) }}</span>
                                                                                                                <span class="name">{{ $wife->name }}</span>
                                                                                                                <span class="gender">{{ $wife->gender }}</span>
                                                                                                            </a>
                                                                                                        </span>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            @else
                                                                                                @if ($gg->husbands->isEmpty() == false)
                                                                                                    @foreach($gg->husbands as $husband)
                                                                                                        <span class="female">
                                                                                                            <a href="{{ route('users.show',[$husband->id]) }}" title="Great Grandsons-in-law {{ $husband->name.' ('.$husband->gender.')' }}">
                                                                                                                <span class="img-gender">{{ userPhoto($husband, []) }}</span>
                                                                                                                <span class="name">{{ $husband->name }}</span>
                                                                                                                <span class="gender">{{ $husband->gender }}</span>
                                                                                                            </a>
                                                                                                        </span>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            @endif
                                                                                        </div>
                                                                                        @if ($ggcCount = $gg->childs->count())
                                                                                            <?php $ggcTotal += $ggcCount ?>
                                                                                            <ul>
                                                                                                @foreach($gg->childs as $ggc)
                                                                                                    <li>
                                                                                                        <div>
                                                                                                            <span class="male">
                                                                                                                <a href="{{ route('users.show',[$ggc->id]) }}" title="{{ $ggc->name.' ('.$ggc->gender.')' }}">
                                                                                                                    <span class="img-gender">{{ userPhoto($ggc, []) }}</span>
                                                                                                                    <span class="name"> {{ $ggc->name }} </span>
                                                                                                                    <span class="gender">{{ $ggc->gender }}</span>
                                                                                                                </a>
                                                                                                            </span>
                                                                                                            @if ($ggc->gender_id == 1)
                                                                                                                @if ($ggc->wifes->isEmpty() == false)
                                                                                                                    @foreach($ggc->wifes as $wife)
                                                                                                                        <span class="female">
                                                                                                                            <a href="{{ route('users.show',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                                                                <span class="img-gender">{{ userPhoto($wife, []) }}</span>
                                                                                                                                <span class="name">{{ $wife->name }}</span>
                                                                                                                                <span class="gender">{{ $wife->gender }}</span>
                                                                                                                            </a>
                                                                                                                        </span>
                                                                                                                    @endforeach
                                                                                                                @endif
                                                                                                            @else
                                                                                                                @if ($ggc->husbands->isEmpty() == false)
                                                                                                                    @foreach($ggc->husbands as $husband)
                                                                                                                        <span class="female">
                                                                                                                            <a href="{{ route('users.show',[$husband->id]) }}" title="{{ $husband->name.' ('.$husband->gender.')' }}">
                                                                                                                                <span class="img-gender">{{ userPhoto($husband, []) }}</span>
                                                                                                                                <span class="name">{{ $husband->name }}</span>
                                                                                                                                <span class="gender">{{ $husband->gender }}</span>
                                                                                                                            </a>
                                                                                                                        </span>
                                                                                                                    @endforeach
                                                                                                                @endif
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        @endif
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
</li>
</ul>



                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}

@section ('treeflex_css')
<link rel="stylesheet" href="{{ asset('css/treeflex2.css') }}">
@endsection




