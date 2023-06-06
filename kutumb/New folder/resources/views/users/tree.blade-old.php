@extends('layouts.user-profile-wide')

@section('subtitle', trans('app.family_tree'))



@section('user-content')

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

<div class="container-fluid mt-2">
    <div class="row justify-content-end">
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
    </div>
    <div class="row">
        <div class="col-md-12 mt-3 mt-md-0">
            <div class="tf-tree">
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
                                                                            <li>
                                                                                <span class="tf-nc">
                                                                                    <a href="{{ route('users.tree',[$ggccP->id]) }}" title="{{ $ggccP->name.' ('.$ggccP->gender.')' }}">
                                                                                        @if($ggccP->gender_id == 1)
                                                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                                        @else
                                                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                                        @endif
                                                                                        <span class="d-tree name"> {{ $ggccP->name }} </span>
                                                                                        <span class="d-tree dob">{{ $ggccP->gender }}</span>
                                                                                    </a>
                                                                                </span>                                                                            
                                                                        @endforeach
                                                                    
                                                                @endif
                                                                <ul>
                                                                <li>
                                                                    <span class="tf-nc">
                                                                        <a href="{{ route('users.tree',[$ggcP->id]) }}" title="{{ $ggcP->name.' ('.$ggcP->gender.')' }}">
                                                                            @if($ggcP->gender_id == 1)
                                                                                <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                            @else
                                                                                <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                            @endif
                                                                            <span class="d-tree name"> {{ $ggcP->name }} </span>
                                                                            <span class="d-tree dob">{{ $ggcP->gender }}</span>
                                                                        </a>
                                                                    </span>
                                                                <!-- @if ($ggcP->wifes->isEmpty() == false)
                                    <li>
                                        <span class="tf-nc">
                                            @foreach($ggcP->wifes as $wife)
                                                <a href="{{ route('users.tree',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                    <span class="d-tree name">{{ $wife->name }}</span>
                                                    <span class="d-tree dob">{{ $wife->gender }}</span>
                                                </a>
                                            @endforeach
                                        </span>
                                    </li>
                                @endif
 -->
                                                            @endforeach
                                                       
                                                    @endif
                                                    <ul>
                                                    <li>
                                                        <span class="tf-nc">
                                                            <a href="{{ route('users.tree',[$ggP->id]) }}" title="{{ $ggP->name.' ('.$ggP->gender.')' }}">
                                                                @if($ggP->gender_id == 1)
                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                @else
                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                @endif
                                                                <span class="d-tree name"> {{ $ggP->name }} </span>
                                                                <span class="d-tree dob">{{ $ggP->gender }}</span>
                                                            </a>
                                                        </span>
                                                        <!-- @if ($ggP->wifes->isEmpty() == false)
                                    <li>
                                        <span class="tf-nc">
                                            @foreach($ggP->wifes as $wife)
                                                <a href="{{ route('users.tree',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                    <span class="d-tree name">{{ $wife->name }}</span>
                                                    <span class="d-tree dob">{{ $wife->gender }}</span>
                                                </a>
                                            @endforeach
                                        </span>
                                    </li>
                                @endif -->
                                                    
                                                @endforeach
                                            
                                        @endif
                                        <ul>
                                        <li>
                                            <span class="tf-nc">
                                                <a href="{{ route('users.tree',[$grandP->id]) }}" title="{{ $grandP->name.' ('.$grandP->gender.')' }}">
                                                    @if($grandP->gender_id == 1)
                                                        <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                    @else
                                                        <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                    @endif
                                                    <span class="d-tree name"> {{ $grandP->name }} </span>
                                                    <span class="d-tree dob">{{ $grandP->gender }}</span>
                                                </a>
                                            </span>
                                        <!-- @if ($grandP->wifes->isEmpty() == false)
                                    <li>
                                        <span class="tf-nc">
                                            @foreach($grandP->wifes as $wife)
                                                <a href="{{ route('users.tree',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                    <span class="d-tree name">{{ $wife->name }}</span>
                                                    <span class="d-tree dob">{{ $wife->gender }}</span>
                                                </a>
                                            @endforeach
                                        </span>
                                    </li>
                                @endif -->
                                    @endforeach
                                
                            @endif
                            <ul>
                            <li>
                                <span class="tf-nc">
                                    <a href="{{ route('users.tree',[$parent->id]) }}" title="{{ $parent->name.' ('.$parent->gender.')' }}">
                                        @if($parent->gender_id == 1)
                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                        @else
                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                        @endif
                                        <span class="d-tree name"> {{ $parent->name }} </span>
                                        <span class="d-tree dob">{{ $parent->gender }}</span>
                                    </a>
                                </span>
                           <!-- @if ($parent->wifes->isEmpty() == false)
                                    <li>
                                        <span class="tf-nc">
                                            @foreach($parent->wifes as $wife)
                                                <a href="{{ route('users.tree',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                    <span class="d-tree name">{{ $wife->name }}</span>
                                                    <span class="d-tree dob">{{ $wife->gender }}</span>
                                                </a>
                                            @endforeach
                                        </span>
                                    </li>
                                @endif -->
                        @endforeach
                    
                @endif
                
                        <ul>
                            <li>
                                <span class="tf-nc">
                                    <a href="{{ route('users.tree',[$user->id]) }}" title="{{ $user->name.' ('.$user->gender.')' }}">
                                        @if($user->gender_id == 1)
                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                        @else
                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                        @endif
                                        <span class="d-tree name"> {{ $user->name }} </span>
                                        <span class="d-tree dob">{{ $user->gender }}</span>
                                    </a>
                                </span>
                                @if ($childsCount = $user->childs->count())
                                    <?php $childsTotal += $childsCount ?>
                                    <ul>
                                        @foreach($user->childs as $child)
                                            <li>
                                                <span class="tf-nc">
                                                    <a href="{{ route('users.tree',[$child->id]) }}" title="{{ $child->name.' ('.$child->gender.')' }}">
                                                        @if($child->gender_id == 1)
                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                        @else
                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                        @endif
                                                        <span class="d-tree name"> {{ $child->name }}  </span>
                                                        <span class="d-tree dob">{{ $child->gender }}</span>
                                                    </a>
                                                </span>
                                                @if ($grandsCount = $child->childs->count())
                                                    <?php $grandChildsTotal += $grandsCount ?>
                                                    <ul>
                                                        @foreach($child->childs as $grand)
                                                            <li>                                                    
                                                                <span class="tf-nc">
                                                                    <a href="{{ route('users.tree',[$grand->id]) }}" title="{{ $grand->name.' ('.$grand->gender.')' }}">
                                                                        @if($grand->gender_id == 1)
                                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                        @else
                                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                        @endif
                                                                        <span class="d-tree name"> {{ $grand->name }}  </span>
                                                                        <span class="d-tree dob">{{ $grand->gender }}</span>
                                                                    </a>
                                                                </span>
                                                                @if ($ggCount = $grand->childs->count())
                                                                    <?php $ggTotal += $ggCount ?>
                                                                    <ul>
                                                                        @foreach($grand->childs as $gg)
                                                                            <li>
                                                                                <span class="tf-nc">
                                                                                    <a href="{{ route('users.tree',[$gg->id]) }}" title="{{ $gg->name.' ('.$gg->gender.')' }}">
                                                                                        @if($gg->gender_id == 1)
                                                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                                        @else
                                                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                                        @endif
                                                                                        <span class="d-tree name"> {{ $gg->name }}  </span>
                                                                                        <span class="d-tree dob">{{ $gg->gender }}</span>
                                                                                    </a>
                                                                                </span>
                                                                                @if ($ggcCount = $gg->childs->count())
                                                                                    <?php $ggcTotal += $ggcCount ?>
                                                                                    <ul>
                                                                                        @foreach($gg->childs as $ggc)
                                                                                            <li>
                                                                                                <span class="tf-nc">
                                                                                                    <a href="{{ route('users.tree',[$ggc->id]) }}" title="{{ $ggc->name.' ('.$ggc->gender.')' }}">
                                                                                                        @if($ggc->gender_id == 1)
                                                                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                                                        @else
                                                                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                                                        @endif
                                                                                                        <span class="d-tree name"> {{ $ggc->name }}  </span>
                                                                                                        <span class="d-tree dob">{{ $ggc->gender }}</span>
                                                                                                    </a>
                                                                                                </span>
                                                                                                @if ($ggccCount = $ggc->childs->count())
                                                                                                    <?php $ggccTotal += $ggccCount ?>
                                                                                                    <ul>
                                                                                                        @foreach($ggc->childs as $ggcc)
                                                                                                            <li>
                                                                                                                <span class="tf-nc">
                                                                                                                    <a href="{{ route('users.tree',[$ggcc->id]) }}" title="{{ $ggcc->name.' ('.$ggcc->gender.')' }}">
                                                                                                                        @if($ggcc->gender_id == 1)
                                                                                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                                                                        @else
                                                                                                                            <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                                                                        @endif
                                                                                                                        <span class="d-tree name"> {{ $ggcc->name }}  </span>
                                                                                                                        <span class="d-tree dob">{{ $ggcc->gender }}</span>
                                                                                                                    </a>
                                                                                                                </span>
                                                                                                            </li>
                                                                                                            @if ($ggcc->gender_id == 1)
                                                                                                                @if ($ggcc->wifes->isEmpty() == false)
                                                                                                                    <li>
                                                                                                                        <span class="tf-nc">
                                                                                                                            @foreach($ggcc->wifes as $wife)
                                                                                                                                <a href="{{ route('users.tree',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                                                                                    <span class="d-tree name">{{ $wife->name }}</span>
                                                                                                                                    <span class="d-tree dob">{{ $wife->gender }}</span>
                                                                                                                                </a>
                                                                                                                            @endforeach
                                                                                                                        </span>
                                                                                                                    </li>
                                                                                                                @endif
                                                                                                            @else
                                                                                                                @if ($ggcc->husbands->isEmpty() == false)
                                                                                                                    <li>
                                                                                                                        <span class="tf-nc">
                                                                                                                            @foreach($ggcc->husbands as $husband)
                                                                                                                                <a href="{{ route('users.tree',[$husband->id]) }}" title="{{ $husband->name.' ('.$husband->gender.')' }}">
                                                                                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                                                                                    <span class="d-tree name">{{ $husband->name }}</span>
                                                                                                                                    <span class="d-tree dob">{{ $husband->gender }}</span>
                                                                                                                                </a>
                                                                                                                            @endforeach
                                                                                                                        </span> 
                                                                                                                    </li>
                                                                                                                @endif
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                @endif
                                                                                            </li>
                                                                                            @if ($ggc->gender_id == 1)
                                                                                                @if ($ggc->wifes->isEmpty() == false)
                                                                                                    <li>
                                                                                                        <span class="tf-nc">
                                                                                                            @foreach($ggc->wifes as $wife)
                                                                                                                <a href="{{ route('users.tree',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                                                                    <span class="d-tree name">{{ $wife->name }}</span>
                                                                                                                    <span class="d-tree dob">{{ $wife->gender }}</span>
                                                                                                                </a>
                                                                                                            @endforeach
                                                                                                        </span>
                                                                                                    </li>
                                                                                                @endif
                                                                                            @else
                                                                                                @if ($ggc->husbands->isEmpty() == false)
                                                                                                    <li>
                                                                                                        <span class="tf-nc">
                                                                                                            @foreach($ggc->husbands as $husband)
                                                                                                                <a href="{{ route('users.tree',[$husband->id]) }}" title="{{ $husband->name.' ('.$husband->gender.')' }}">
                                                                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                                                                    <span class="d-tree name">{{ $husband->name }}</span>
                                                                                                                    <span class="d-tree dob">{{ $husband->gender }}</span>
                                                                                                                </a>
                                                                                                            @endforeach
                                                                                                        </span> 
                                                                                                    </li>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </li>
                                                                            @if ($gg->gender_id == 1)
                                                                                @if ($gg->wifes->isEmpty() == false)
                                                                                    <li>
                                                                                        <span class="tf-nc">
                                                                                            @foreach($gg->wifes as $wife)
                                                                                                <a href="{{ route('users.tree',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                                                    <span class="d-tree name">{{ $wife->name }}</span>
                                                                                                    <span class="d-tree dob">{{ $wife->gender }}</span>
                                                                                                </a>
                                                                                            @endforeach
                                                                                        </span>
                                                                                    </li>
                                                                                @endif
                                                                            @else
                                                                                @if ($gg->husbands->isEmpty() == false)
                                                                                    <li>
                                                                                        <span class="tf-nc">
                                                                                            @foreach($gg->husbands as $husband)
                                                                                                <a href="{{ route('users.tree',[$husband->id]) }}" title="{{ $husband->name.' ('.$husband->gender.')' }}">
                                                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                                                    <span class="d-tree name">{{ $husband->name }}</span>
                                                                                                    <span class="d-tree dob">{{ $husband->gender }}</span>
                                                                                                </a>
                                                                                            @endforeach
                                                                                        </span> 
                                                                                    </li>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                            @if ($grand->gender_id == 1)
                                                                @if ($grand->wifes->isEmpty() == false)
                                                                    <li>
                                                                        <span class="tf-nc">
                                                                            @foreach($grand->wifes as $wife)
                                                                                <a href="{{ route('users.tree',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                                    <span class="d-tree name">{{ $wife->name }}</span>
                                                                                    <span class="d-tree dob">{{ $wife->gender }}</span>
                                                                                </a>
                                                                            @endforeach
                                                                        </span>
                                                                    </li>
                                                                @endif
                                                            @else
                                                                @if ($grand->husbands->isEmpty() == false)
                                                                    <li>
                                                                        <span class="tf-nc">
                                                                            @foreach($grand->husbands as $husband)
                                                                                <a href="{{ route('users.tree',[$husband->id]) }}" title="{{ $husband->name.' ('.$husband->gender.')' }}">
                                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                                    <span class="d-tree name">{{ $husband->name }}</span>
                                                                                    <span class="d-tree dob">{{ $husband->gender }}</span>
                                                                                </a>
                                                                            @endforeach
                                                                        </span> 
                                                                    </li>
                                                                @endif
                                                            @endif
                                                        @endforeach                                                
                                                    </ul>
                                                @endif
                                            </li>
                                            @if ($child->gender_id == 1)
                                                @if ($child->wifes->isEmpty() == false)
                                                    <li>
                                                        <span class="tf-nc">                                                
                                                            @foreach($child->wifes as $wife)
                                                                <a href="{{ route('users.tree',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                                    <span class="d-tree name">{{ $wife->name }}</span>
                                                                    <span class="d-tree dob">{{ $wife->gender }}</span>
                                                                </a>
                                                            @endforeach
                                                        </span>
                                                    </li>
                                                 @endif
                                            @else
                                                @if ($child->husbands->isEmpty() == false)
                                                    <li>
                                                        <span class="tf-nc">
                                                            @foreach($child->husbands as $husband)
                                                                <a href="{{ route('users.tree',[$husband->id]) }}" title="{{ $husband->name.' ('.$husband->gender.')' }}">
                                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                                    <span class="d-tree name">{{ $husband->name }}</span>
                                                                    <span class="d-tree dob">{{ $husband->gender }}</span>
                                                                </a>
                                                            @endforeach
                                                        </span> 
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @if ($user->gender_id == 1)
                                @if ($user->wifes->isEmpty() == false)
                                    <li>
                                        <span class="tf-nc">
                                            @foreach($user->wifes as $wife)
                                                <a href="{{ route('users.tree',[$wife->id]) }}" title="{{ $wife->name.' ('.$wife->gender.')' }}">                                            
                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/female.png') }}" /></span>
                                                    <span class="d-tree name">{{ $wife->name }}</span>
                                                    <span class="d-tree dob">{{ $wife->gender }}</span>
                                                </a>
                                            @endforeach
                                        </span>
                                    </li>
                                @endif
                            @else
                                @if ($user->husbands->isEmpty() == false)
                                    <li>
                                        <span class="tf-nc">
                                            @foreach($user->husbands as $husband)
                                                <a href="{{ route('users.tree',[$husband->id]) }}" title="{{ $husband->name.' ('.$husband->gender.')' }}">
                                                    <span class="tree-list-gender d-tree"><img src="{{ asset('images/male.png') }}" /></span>
                                                    <span class="d-tree name">{{ $husband->name }}</span>
                                                    <span class="d-tree dob">{{ $husband->gender }}</span>
                                                </a>
                                            @endforeach
                                        </span> 
                                    </li>
                                @endif
                            @endif
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


<!-- </ul> -->

            </div>
        </div>
    </div>
</div>

@endsection

@section ('treeflex_css')
<link rel="stylesheet" href="{{ asset('css/treeflex.css') }}">
@endsection




