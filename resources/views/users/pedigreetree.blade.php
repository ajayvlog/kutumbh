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
    
    <span class="label">{{ link_to_route('users.tree', $user->name.' ('.$user->gender.')', [$user->id], ['title' => $user->name.' ('.$user->gender.')']) }}</span>

    @if ($parentsCount = $user->parents->count())
        <?php //echo $user->parents->count();
        //echo "<pre>";print_r($user->parents); echo "</pre>". die();

        $parentsTotal += $parentsCount ?>
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
                                            @if ($ggccP->gender_id == 1)
                                                @if ($ggccP->wifes->isEmpty() == false)
                                                    @foreach($ggccP->wifes as $wife)
                                                        <div class="entry sole">
                                                        <span class="label">{{ link_to_route('users.tree', $wife->name.' ('.$wife->gender.')', [$wife->id], ['title' => $wife->name.' ('.$wife->gender.')']) }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @else
                                                @if ($ggccP->husbands->isEmpty() == false)
                                                    @foreach($ggccP->husbands as $husband)
                                                        <span class="label">{{ link_to_route('users.tree', $husband->name.' ('.$husband->gender.')', [$husband->id], ['title' => $husband->name.' ('.$husband->gender.')']) }}</span>
                                                    @endforeach
                                                @endif
                                            @endif
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    @if ($ggcP->gender_id == 1)
                                        @if ($ggcP->wifes->isEmpty() == false)
                                            @foreach($ggcP->wifes as $wife)
                                                <div class="entry sole">
                                                <span class="label">{{ link_to_route('users.tree', $wife->name.' ('.$wife->gender.')', [$wife->id], ['title' => $wife->name.' ('.$wife->gender.')']) }}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    @else
                                        @if ($ggcP->husbands->isEmpty() == false)
                                            @foreach($ggcP->husbands as $husband)
                                                <span class="label">{{ link_to_route('users.tree', $husband->name.' ('.$husband->gender.')', [$husband->id], ['title' => $husband->name.' ('.$husband->gender.')']) }}</span>
                                            @endforeach
                                        @endif
                                    @endif
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @if ($ggP->gender_id == 1)
                                @if ($ggP->wifes->isEmpty() == false)
                                    @foreach($ggP->wifes as $wife)
                                        <div class="entry sole">
                                        <span class="label">{{ link_to_route('users.tree', $wife->name.' ('.$wife->gender.')', [$wife->id], ['title' => $wife->name.' ('.$wife->gender.')']) }}</span>
                                        </div>
                                    @endforeach
                                @endif
                            @else
                                @if ($ggP->husbands->isEmpty() == false)
                                    @foreach($ggP->husbands as $husband)
                                        <span class="label">{{ link_to_route('users.tree', $husband->name.' ('.$husband->gender.')', [$husband->id], ['title' => $husband->name.' ('.$husband->gender.')']) }}</span>
                                    @endforeach
                                @endif
                            @endif
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @if ($grandP->gender_id == 1)
                        @if ($grandP->wifes->isEmpty() == false)
                            @foreach($grandP->wifes as $wife)
                                <div class="entry sole">
                                <span class="label">{{ link_to_route('users.tree', $wife->name.' ('.$wife->gender.')', [$wife->id], ['title' => $wife->name.' ('.$wife->gender.')']) }}</span>
                                </div>
                            @endforeach
                        @endif
                    @else
                        @if ($grandP->husbands->isEmpty() == false)
                            @foreach($grandP->husbands as $husband)
                                <span class="label">{{ link_to_route('users.tree', $husband->name.' ('.$husband->gender.')', [$husband->id], ['title' => $husband->name.' ('.$husband->gender.')']) }}</span>
                            @endforeach
                        @endif
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
            @if ($parent->gender_id == 1)
                    @if ($parent->wifes->isEmpty() == false)
                        @foreach($parent->wifes as $wife)
                            <div class="entry sole">
                            <span class="label">{{ link_to_route('users.tree', $wife->name.' ('.$wife->gender.')', [$wife->id], ['title' => $wife->name.' ('.$wife->gender.')']) }}</span>
                            </div>
                        @endforeach
                    @endif
                @else
                    @if ($parent->husbands->isEmpty() == false)
                        @foreach($parent->husbands as $husband)
                            <span class="label">{{ link_to_route('users.tree', $husband->name.' ('.$husband->gender.')', [$husband->id], ['title' => $husband->name.' ('.$husband->gender.')']) }}</span>
                        @endforeach
                    @endif
                @endif
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
