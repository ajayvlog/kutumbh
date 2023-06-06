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

<div id="wrapper">
    @if ($parentsCount = $user->parents->count())
    <?php //echo count($user->parents); die();
    //echo "<pre>";print_r($user->parents); echo "</pre>". die();

    // for ($i = count($a) - 1; $i >= 0; --$i) {
    //     echo $a[$i];
    // }


    $parentsTotal += $parentsCount 

    ?>
    <div class="tree">
    <div class="branch lv1">
            @foreach($user->parents as $parent)
            <div class="entry {{ $parentsCount == 1 ? 'sole' : '' }}">
                <span class="label">{{ link_to_route('users.tree', $parent->name.' ('.$parent->gender.')', [$parent->id], ['title' => $parent->name.' ('.$parent->gender.')']) }}</span>
                @if ($grandsPCount = $parent->parents->count())
                <?php $grandParentsTotal += $grandsPCount ?>
                <div class="branch lv2">
                    @foreach($parent->parents as $grandP)
                    <div class="entry {{ $grandsPCount == 1 ? 'sole' : '' }}">
                        <span class="label">{{ link_to_route('users.tree', $grandP->name.' ('.$grandP->gender.')', [$grandP->id], ['title' => $grandP->name.' ('.$grandP->gender.')']) }}</span>
                        @if ($ggPCount = $grandP->parents->count())
                        <?php $ggPTotal += $ggPCount ?>
                        <div class="branch lv3">
                            @foreach($grandP->parents as $ggP)
                            <div class="entry {{ $ggPCount == 1 ? 'sole' : '' }}">
                                <span class="label">{{ link_to_route('users.tree', $ggP->name.' ('.$ggP->gender.')', [$ggP->id], ['title' => $ggP->name.' ('.$ggP->gender.')']) }}</span>
                                @if ($ggPcCount = $ggP->parents->count())
                                <?php $ggPcTotal += $ggPcCount ?>
                                <div class="branch lv4">
                                    @foreach($ggP->parents as $ggcP)
                                    <div class="entry {{ $ggPcCount == 1 ? 'sole' : '' }}">
                                        <span class="label">{{ link_to_route('users.tree', $ggcP->name.' ('.$ggcP->gender.')', [$ggcP->id], ['title' => $ggcP->name.' ('.$ggcP->gender.')']) }}</span>
                                        @if ($ggccPCount = $ggcP->parents->count())
                                        <?php $ggccPTotal += $ggccPCount ?>
                                        <div class="branch lv5">
                                            @foreach($ggcP->parents as $ggccP)
                                            <div class="entry {{ $ggccPCount == 1 ? 'sole' : '' }}">
                                                <span class="label">{{ link_to_route('users.tree', $ggccP->name.' ('.$ggccP->gender.')', [$ggccP->id], ['title' => $ggccP->name.' ('.$ggccP->gender.')']) }}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif

    <span class="label">{{ link_to_route('users.tree', $user->name.' ('.$user->gender.')', [$user->id], ['title' => $user->name.' ('.$user->gender.')']) }}</span>

    <!-- @if ($user->gender_id == 1)
        @if ($user->wifes->isEmpty() == false)
            @foreach($user->wifes as $wife)
                <span class="label">{{ link_to_route('users.tree', $wife->name.' ('.$wife->gender.')', [$wife->id], ['title' => $wife->name.' ('.$wife->gender.')']) }}</span>
            @endforeach
        @endif
    @else
        @if ($user->husbands->isEmpty() == false)
            @foreach($user->husbands as $husband)
                <span class="label">{{ link_to_route('users.tree', $husband->name.' ('.$husband->gender.')', [$husband->id], ['title' => $husband->name.' ('.$husband->gender.')']) }}</span>
            @endforeach
        @endif
    @endif -->

        @if ($childsCount = $user->childs->count())
        <?php //echo $user->parents->count();
        //echo "<pre>";print_r($user->parents); echo "</pre>". die();

        $childsTotal += $childsCount ?>
        <div class="branch lv1">
            @foreach($user->childs as $child)
            <div class="entry {{ $childsCount == 1 ? 'sole' : '' }}">
                <span class="label">{{ link_to_route('users.tree', $child->name.' ('.$child->gender.')', [$child->id], ['title' => $child->name.' ('.$child->gender.')']) }}</span>
                @if ($grandsCount = $child->childs->count())
                <?php $grandChildsTotal += $grandsCount ?>
                <div class="branch lv2">
                    @foreach($child->childs as $grand)
                    <div class="entry {{ $grandsCount == 1 ? 'sole' : '' }}">
                        <span class="label">{{ link_to_route('users.tree', $grand->name.' ('.$grand->gender.')', [$grand->id], ['title' => $grand->name.' ('.$grand->gender.')']) }}</span>
                        @if ($ggCount = $grand->childs->count())
                        <?php $ggTotal += $ggCount ?>
                        <div class="branch lv3">
                            @foreach($grand->childs as $gg)
                            <div class="entry {{ $ggCount == 1 ? 'sole' : '' }}">
                                <span class="label">{{ link_to_route('users.tree', $gg->name.' ('.$gg->gender.')', [$gg->id], ['title' => $gg->name.' ('.$gg->gender.')']) }}</span>
                                @if ($ggcCount = $gg->childs->count())
                                <?php $ggcTotal += $ggcCount ?>
                                <div class="branch lv4">
                                    @foreach($gg->childs as $ggc)
                                    <div class="entry {{ $ggcCount == 1 ? 'sole' : '' }}">
                                        <span class="label">{{ link_to_route('users.tree', $ggc->name.' ('.$ggc->gender.')', [$ggc->id], ['title' => $ggc->name.' ('.$ggc->gender.')']) }}</span>
                                        @if ($ggccCount = $ggc->childs->count())
                                        <?php $ggccTotal += $ggccCount ?>
                                        <div class="branch lv5">
                                            @foreach($ggc->childs as $ggcc)
                                            <div class="entry {{ $ggccCount == 1 ? 'sole' : '' }}">
                                                <span class="label">{{ link_to_route('users.tree', $ggcc->name.' ('.$ggcc->gender.')', [$ggcc->id], ['title' => $ggcc->name.' ('.$ggcc->gender.')']) }}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
<div class="container">
<hr>
<div class="row">
    <div class="col-md-1">&nbsp;</div>
    @if ($childsTotal)
    <div class="col-md-1 text-right">{{ trans('app.child_count') }}</div>
    <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $childsTotal }}</strong></div>
    @endif
    @if ($grandChildsTotal)
    <div class="col-md-1 text-right">{{ trans('app.grand_child_count') }}</div>
    <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $grandChildsTotal }}</strong></div>
    @endif
    @if ($ggTotal)
    <div class="col-md-1 text-right">{{ trans('app.great_grand_child_count') }}</div>
    <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggTotal }}</strong></div>
    @endif  
    @if ($ggcTotal)
    <div class="col-md-1 text-right">{{ trans('app.great_great_grand_child_count') }}</div>
    <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggcTotal }}</strong></div>
    @endif
    @if ($ggccTotal)
    <div class="col-md-1 text-right">{{ trans('app.great_great_great_grand_child_count') }}</div>
    <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggccTotal }}</strong></div>
    @endif
    <div class="col-md-1">&nbsp;</div>
</div>
</div>
@endsection

@section ('treeflex_css')
<link rel="stylesheet" href="{{ asset('css/tree.css') }}">
@endsection
