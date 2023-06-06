<?php 
    $father = $user->father_id ? $user->father : null;
    $mother = $user->mother_id ? $user->mother : null;

    $fatherGrandpa = $father && $father->father_id ? $father->father : null;
    $fatherGrandma = $father && $father->mother_id ? $father->mother : null;

    $motherGrandpa = $mother && $mother->father_id ? $mother->father : null;
    $motherGrandma = $mother && $mother->mother_id ? $mother->mother : null;

    $gfchilds = $fatherGrandpa ? $fatherGrandpa->childs : '';
    $fchilds = $father ? $father->childs : '' ;

    $childs = $user->childs;
    $colspan = $childs->count();
    $colspan = $colspan < 4 ? 4 : $colspan;

    $siblings = $user->siblings();
?>

            <div class="row mb-3 border border-muted shadow-lg p-3 mb-5 bg-white rounded ">
                <div class="col-6 "> <h5> Relations</h5></div>
                {{-- <div class="col-6 text-right">
                    <a href="#!" class="border pl-2 pr-2 text-dark rounded">
                        <small> <i class="fas fa-calculator"></i> Calculator</small>
                    </a>
                </div> --}}
            </div>
            <!--Grand parents-->
            @if($fatherGrandpa || $fatherGrandma)
            <div class="row ">
                <div class="col-12 mb-3">
                    <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <strong>{{ __('Grand Parents') }}</strong>
                    </a>
                    <span class="text-muted">({{ $fatherGrandpa ? '1' : '0' }})</span>
                </div>
                <div class="col-12">
                    <div class="collapse" id="collapseExample">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="row text-right">
                                    <div class="col-12"> <strong>{{ __('Grand Parents') }} </strong> </div>
                                    <div class="col-12"> <small class="text-muted"> Preffered</small> </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    @if($fatherGrandpa)
                                    <div class="col-12 p-2 border">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                {{ userPhoto($fatherGrandpa, ['class' => 'img-fluid rounded-circle border']) }}
                                            </div>
                                            <div class="col-12 col-md-9 text-center text-lg-left">
                                                <div> <span class="text-muted"> {{ trans('user.grand_father') }}</span> </div>
                                                <div> <strong>{{ $fatherGrandpa ? $fatherGrandpa->profileLink() : '?' }} </strong> </div>
                                                <div> <small class="text-muted">{{ __('Born') }} {{ $fatherGrandpa->yob ? $fatherGrandpa->yob : '"Date Not Available"' }}</small> </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <div class="col-12 p-2 border">
                                            <div class="row">
                                                <div class="col-12 col-md-3">
                                                
                                                </div>
                                                <div class="col-12 col-md-9 text-center text-lg-left">
                                                    <div> <span class="text-muted"> {{ trans('user.grand_father') }}</span> </div>
                                                    <div> <strong>No data Available </strong> </div>
                                                    <div> <small class="text-muted">{{ __('Born') }} {{ '"Date Not Available"'}}</small> </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12 p-2 ">
                                        <!-- first child starts -->
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                                    <strong><small>Show Children in Family</small></strong>
                                                </a>
                                                <span class="text-muted"> <small>({{ count($gfchilds) }})</small></span>
                                            </div>
                                        </div>
                                        @if($gfchilds)
                                            <div class="collapse" id="collapseExample2">
                                                @foreach($gfchilds->chunk(4) as $chunkedChild)
                                                
                                                    @foreach($chunkedChild as $child)
                                                    <div class="col-12 p-2 border bg-light">
                                                        <div class="row">
                                                            <div class="col-12 col-md-3">
                                                                {{ userPhoto($child, ['class' => 'img-fluid rounded-circle border']) }}
                                                            </div>
                                                            <div class="col-12 col-md-9 text-center text-lg-left">
                                                                <div> <span class="text-muted"> {{ $child->gender == 'F' ? __('Daughter') : __('Son') }}</span> </div>
                                                                <div> <strong>{{ $child->profileLink() }} ({{ $child->gender }}) </strong> </div>
                                                                <div> <small class="text-muted">{{ __('Born') }} {{ $child->yob ? $child->yob : '"Date Not Available"' }}</small> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @if (! $loop->last)
                                                    <div class="clearfix"></div>
                                                    @endif                                            
                                                @endforeach                            
                                            </div>
                                        @endif
                                        <!-- first child ends -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 p-0">
                                <div class="half-line position"> </div>
                            </div>
                            @if($fatherGrandma)
                            <div class="col-md-4 pl-md-0">
                                <div class="p-2 border">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            {{ userPhoto($fatherGrandma, ['class' => 'img-fluid rounded-circle border']) }}
                                        </div>
                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                            <div> <span class="text-muted"> {{ trans('user.grand_mother') }}</span> </div>
                                            <div> <strong>{{ $fatherGrandma ? $fatherGrandma->profileLink() : '?' }} </strong> </div>
                                            <div> <small class="text-muted">{{ __('Born') }} {{ $fatherGrandma->yob ? $fatherGrandma->yob : '"Date Not Available"' }}</small> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-4 pl-md-0">
                                <div class="p-2 border">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            
                                        </div>
                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                            <div> <span class="text-muted"> {{ trans('user.grand_mother') }}</span> </div>
                                            <div> <strong>No Data Available </strong> </div>
                                            <div> <small class="text-muted">{{ __('Born') }} {{ '"Date Not Available"' }}</small> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endif
            <!--Grand parents ends-->
           
            <!--parents-->
            @if($father || $mother)
            <div class="row border border-muted  p-3 mb-5  rounded jpbox2">
                <div class="col-12 mb-3">
                    <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                        <strong>{{ __('Parents') }}</strong>
                    </a>
                    <span class="text-muted">({{ $father ? '1' : '0' }})</span>
                </div>
                <div class="col-12">
                    <div class="collapse show" id="collapseExample1">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="row text-right">
                                    <div class="col-12"> <strong>{{ __('Parents') }} </strong> </div>
                                    <div class="col-12"> <small class="text-muted"> Preffered</small> </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row jpbox1">
                                    @if($father)
                                        <div class="col-12 p-2 border ">
                                            <div class="row ">
                                                <div class="col-12 col-md-3">
                                                    {{ userPhoto($father, ['class' => 'img-fluid rounded-circle border']) }}
                                                </div>
                                                <div class="col-12 col-md-9 text-center text-lg-left">
                                                    <div> <span class="text-muted"> {{ trans('user.father') }}</span> </div>
                                                    <div> <strong>{{ $father ? $father->profileLink() : '?' }} </strong> </div>
                                                    <div> <small class="text-muted">{{ __('Born') }} {{ $father->yob ? $father->yob : '"Date Not Available"' }}</small> </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-12 p-2 border">
                                            <div class="row">
                                                <div class="col-12 col-md-3">
                                                    
                                                </div>
                                                <div class="col-12 col-md-9 text-center text-lg-left">
                                                    <div> <span class="text-muted"> {{ trans('user.father') }}</span> </div>
                                                    <div> <strong>No Data Available</strong> </div>
                                                    <div> <small class="text-muted">{{ __('Born') }}.{{ "Date Not Available" }}</small> </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif                                    
                                    <div class="col-12 p-2 ">
                                        <!-- first child starts -->
                                        <div class="row jpbox2">
                                            <div class="col-12 mb-3">
                                                <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapsePchild" role="button" aria-expanded="false" aria-controls="collapsePchild">
                                                    <strong><small>Show Children in Family</small></strong>
                                                </a>
                                                <span class="text-muted"> <small>({{ count($fchilds) }})</small></span>
                                            </div>
                                        </div>
                                        @if($fchilds)
                                            <div class="collapse" id="collapsePchild">
                                                @foreach($fchilds->chunk(4) as $chunkedChild)
                                                
                                                    @foreach($chunkedChild as $child)
                                                    <div class="col-12 p-2 border bg-light">
                                                        <div class="row">
                                                            <div class="col-12 col-md-3">
                                                                {{ userPhoto($child, ['class' => 'img-fluid rounded-circle border']) }}
                                                            </div>
                                                            <div class="col-12 col-md-9 text-center text-lg-left">
                                                                <div> <span class="text-muted"> {{ $child->gender == 'F' ? __('Daughter') : __('Son') }}</span> </div>
                                                                <div> <strong>{{ $child->profileLink() }} ({{ $child->gender }}) </strong> </div>
                                                                <div> <small class="text-muted">{{ __('Born') }} {{ $child->yob ? $child->yob : '"Date Not Available"' }}</small> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @if (! $loop->last)
                                                    <div class="clearfix"></div>
                                                    @endif                                            
                                                @endforeach                            
                                            </div>
                                        @endif
                                        <!-- first child ends -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 p-0">
                                <div class="half-line position"> </div>
                            </div>
                            @if($mother)
                                <div class="col-md-4 pl-md-0 jpbox1">
                                    <div class="p-2 border">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                {{ userPhoto($mother, ['class' => 'img-fluid rounded-circle border']) }}
                                            </div>
                                            <div class="col-12 col-md-9 text-center text-lg-left">
                                                <div> <span class="text-muted"> {{ trans('user.mother') }}</span> </div>
                                                <div> <strong>{{ $mother ? $mother->profileLink() : '?' }} </strong> </div>
                                                <div> <small class="text-muted">{{ __('Born') }} {{ $mother->yob ? $mother->yob : '"Date Not Available"' }}</small> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 p-2 border">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            
                                        </div>
                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                            <div> <span class="text-muted"> {{ trans('user.father') }}</span> </div>
                                            <div> <strong>No Data Available</strong> </div>
                                            <div> <small class="text-muted">{{ __('Born') }}.{{ "Date Not Available" }}</small> </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endif
            <!--parents ends-->           
            <!--//spose-->
            <div class="row ">
                <div class="col-12 mb-3  jpbox1">
                    <a class="add-custom-icon text-dark jpbox1" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="true" aria-controls="collapseExample3">
                        <strong>{{ __('Spouse and Me') }}</strong>
                    </a>
                    <span class="text-muted">({{ $user ? '1' : '0' }})</span>
                </div>
                <div class="col-12 ">
                    <div class="collapse show" id="collapseExample3">
                        <div class="row jpbox1">
                            <div class="col-md-2">
                                <div class="row text-right">
                                    <div class="col-12"> <strong>{{ __('Spouse and Me') }} </strong> </div>
                                    <div class="col-12"> <small class="text-muted"> Preffered</small> </div>
                                </div>
                            </div>
                            <div class="col-md-4 jpbox1">
                                <div class="row">
                                    <div class="col-12 p-2 border">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                {{ userPhoto($user, ['class' => 'img-fluid rounded-circle border']) }}
                                            </div>
                                            <div class="col-12 col-md-9 text-center text-lg-left">
                                                <div> <span class="text-muted"> {{ __('Me') }}</span> </div>
                                                <div> <strong>{{ $user->profileLink('chart') }}</strong> </div>
                                                <div> <small class="text-muted">{{ __('Born') }} {{ $user->yob ? $user->yob : '"Date Not Available"' }}</small> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 p-2 ">
                                        <!-- efefef -->
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                                                    <strong><small>Show Children in Family in this Family</small></strong>
                                                </a>
                                                <span class="text-muted"> <small>({{ count($childs) }})</small></span>
                                            </div>
                                        </div>
                                        @if($childs)
                                            <div class="collapse" id="collapseExample4">
                                                @foreach($childs->chunk(4) as $chunkedChild)                                                
                                                    @foreach($chunkedChild as $child)
                                                    <div class="col-12 p-2 border bg-light">
                                                        <div class="row">
                                                            <div class="col-12 col-md-3">
                                                                {{ userPhoto($child, ['class' => 'img-fluid rounded-circle border']) }}
                                                            </div>
                                                            <div class="col-12 col-md-9 text-center text-lg-left">
                                                                <div> <span class="text-muted"> {{ $child->gender == 'F' ? __('Daughter') : __('Son') }}</span> </div>
                                                                <div> <strong>{{ $child->profileLink() }} ({{ $child->gender }}) </strong> </div>
                                                                <div> <small class="text-muted">{{ __('Born') }} {{ $child->yob ? $child->yob : '"Date Not Available"' }}</small> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @if (! $loop->last)
                                                    <div class="clearfix"></div>
                                                    @endif                                            
                                                @endforeach                            
                                            </div>
                                        @endif
                                        <!-- efefef -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 p-0 ">
                                <div class="half-line position"> </div>
                            </div>
                            <div class="col-md-4 pl-md-0">
                                @if($user->gender_id == 1)
                                    @if($user->wifes->isEmpty() == false)
                                        @foreach($user->wifes as $wife)
                                            <div class="p-2 border">
                                                <div class="row">
                                                    <div class="col-12 col-md-3">
                                                        {{ userPhoto($wife, ['class' => 'img-fluid rounded-circle border']) }}
                                                    </div>
                                                    <div class="col-12 col-md-9 text-center text-lg-left">
                                                        <div> <span class="text-muted"> {{ __('user.spouse') }}</span> </div>
                                                        <div> <strong>{{ $wife->profileLink() }} </strong> </div>
                                                        <div> <small class="text-muted">{{ __('Born') }} {{ $wife->yob ? $wife->yob : '"Date Not Available"' }}</small> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="p-2 border jpbox1">
                                            <div class="row jpbox1">
                                                <div class="col-12 col-md-3">
                                                    
                                                </div>
                                                <div class="col-12 col-md-9 text-center text-lg-left">
                                                    <div> <span class="text-muted"> {{ __('user.spouse') }}</span> </div>
                                                    <div> <strong>{{ __('No Data Available') }} </strong> </div>
                                                    <div> <small class="text-muted">{{ __('Born') }} {{ __('Date Not Available') }}</small> </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @elseif($user->husbands->isEmpty() == false)
                                    @foreach($user->husbands as $husband)
                                        <div class="p-2 border">
                                            <div class="row">
                                                <div class="col-12 col-md-3">
                                                    {{ userPhoto($husband, ['class' => 'img-fluid rounded-circle border']) }}
                                                </div>
                                                <div class="col-12 col-md-9 text-center text-lg-left">
                                                    <div> <span class="text-muted"> {{ __('user.spouse') }}</span> </div>
                                                    <div> <strong>{{ $husband->profileLink() }} </strong> </div>
                                                    <div> <small class="text-muted">{{ __('Born') }} {{ $husband->yob ? $husband->yob : '"Date Not Available"' }}</small> </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="p-2 border">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                
                                            </div>
                                            <div class="col-12 col-md-9 text-center text-lg-left">
                                                <div> <span class="text-muted"> {{ __('user.spouse') }}</span> </div>
                                                <div> <strong>{{ __('No Data Available') }} </strong> </div>
                                                <div> <small class="text-muted">{{ __('Born') }} {{ __('Date Not Available') }}</small> </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--//spose ends-->

            @if($siblings)
                <hr>
                <!--//Siblings-->
                <div class="row">
                    <div class="col-12 mb-3">
                        <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="true" aria-controls="collapseExample5">
                            <strong>{{ trans('user.siblings') }}</strong>
                        </a>
                        <span class="text-muted">({{ count($siblings) }})</span>
                    </div>
                    <div class="col-12">
                        <div class="collapse" id="collapseExample5">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="row text-right">
                                        <div class="col-12"> <strong>{{ trans('user.siblings') }} </strong> </div>
                                        <div class="col-12"> <small class="text-muted"> Preffered</small> </div>
                                    </div>
                                </div>
                                @foreach ($siblings->chunk(3) as $chunkedSiblings)
                                    @foreach ($chunkedSiblings as $key => $sibling)                                    
                                    @if($key!=0 && ($key%2)==0 )
                                        <div class="col-md-2" style="margin-left: 0.1em;"></div>
                                    @endif
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-12 p-2 border">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3">
                                                            {{ userPhoto($sibling, ['class' => 'img-fluid rounded-circle border']) }}
                                                        </div>
                                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                                            <div> <span class="text-muted"> {{ trans('user.siblings') }}</span> </div>
                                                            <div> <strong>{{ $sibling->profileLink() }} ({{ $sibling->gender }})</strong> </div>
                                                            <div> <small class="text-muted">{{ __('Born') }} {{ $sibling->yob ? $sibling->yob : '"Date Not Available"' }}</small> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 p-2 ">
                                                    <!-- efefef -->
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample6">
                                                                <strong><small>Show Children in Family in this Family</small></strong>
                                                            </a>
                                                            <span class="text-muted"> <small>({{ count($sibling->childs) }})</small></span>
                                                        </div>
                                                    </div>

                                                    @if($sibling->childs)
                                                        <div class="collapse show" id="collapseExample6" style="margin-left: 1em;">
                                                            @foreach($sibling->childs as $child)
                                                                <div class="col-12 p-2 border bg-light" >
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-3">
                                                                            {{ userPhoto($child, ['class' => 'img-fluid rounded-circle border']) }}
                                                                        </div>
                                                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                                                            <div> <span class="text-muted"> {{ $child->gender == 'F' ? __('Daughter') : __('Son') }}</span> </div>
                                                                            <div> <strong>{{ $child->profileLink() }} ({{ $child->gender }}) </strong> </div>
                                                                            <div> <small class="text-muted">{{ __('Born') }} {{ $child->yob ? $child->yob : '"Date Not Available"' }}</small> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if (! $loop->last)
                                                                <div class="clearfix"></div>
                                                                @endif
                                                                @if($child->childs)
                                                                    <div class="col-12 p-2 ">
                                                                        <!-- efefef -->
                                                                        <div class="row">
                                                                            <div class="col-12 mb-3">
                                                                                <a class="add-custom-icon text-dark" data-toggle="collapse" href="#collapseExample7" role="button" aria-expanded="false" aria-controls="collapseExample7">
                                                                                    <strong><small>Show Children in Family in this Family</small></strong>
                                                                                </a>
                                                                                <span class="text-muted"> <small>({{ count($child->childs) }})</small></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="collapse show" id="collapseExample7">
                                                                            @foreach($child->childs as $grand)
                                                                                <div class="col-12 p-2 border bg-light" style="margin-left: 1em;">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-3">
                                                                                            {{ userPhoto($grand, ['class' => 'img-fluid rounded-circle border']) }}
                                                                                        </div>
                                                                                        <div class="col-12 col-md-9 text-center text-lg-left">
                                                                                            <div> <span class="text-muted"> {{ $grand->gender == 'F' ? __('Daughter') : __('Son') }}</span> </div>
                                                                                            <div> <strong>{{ $grand->profileLink() }} ({{ $grand->gender }}) </strong> </div>
                                                                                            <div> <small class="text-muted">{{ __('Born') }} {{ $grand->yob ? $grand->yob : '"Date Not Available"' }}</small> </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                 @if (! $loop->last)
                                                                                <div class="clearfix"></div>
                                                                                @endif                                           
                                                                            @endforeach                            
                                                                        </div>
                                                                        <!-- efefef -->
                                                                    </div><hr>
                                                                @endif
                                                            @endforeach                            
                                                        </div>
                                                    @endif
                                                    <!-- efefef -->
                                                </div>                                                
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!--//siblings ends-->
            @endif