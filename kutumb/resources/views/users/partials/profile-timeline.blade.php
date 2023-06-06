<?php
$marriages = $user->marriages()->pluck('marriage_date')->first();
?>
<div class="col-md-6 ">
    <div class="shadow p-3 mb-5 bg-white rounded">
       
        <h5> Timeline</h5>
        @if($user->dob)
            <div class="row">
                <div class="col-md-1 col-2">  <h2 class="mt-2"><i class="fas fa-baby"></i></h2> </div>
                <div class="col-md-11 col-10">
                    <div> <strong>{{ __('Born On') }} {{ $user->dob }}</strong> </div>
                    <div> {{ $user->name }} was born on {{ $user->dob }} in {{ $user->address }}.</div>
                </div>
            </div><hr>
        @endif
        @if($marriages)
            @if($user->gender_id == 1)
                <div class="row">
                    <div class="col-md-1 col-2">  <h2 class="mt-2"><i class="fas fa-heart"></i></h2> </div>
                    <div class="col-md-11 col-10">
                        <div> <strong>{{ __('Marriage ') }} {{ $marriages ? $marriages : ''  }}</strong> </div>
                        <div> {{ $user->name }} was Married to
                            @if($user->wifes->isEmpty() == false)
                                @foreach($user->wifes as $wife)
                                    {{ $wife->profileLink() }}
                                @endforeach
                            @endif
                            on {{ $marriages ? $marriages : '"Date Not Available"'  }}
                        </div>                  
                    </div>
                </div><hr>
            @else
                <div class="row">
                    <div class="col-md-1 col-2">  <h2 class="mt-2"><i class="fas fa-heart"></i></h2> </div>
                    <div class="col-md-11 col-10">
                        <div> <strong>{{ __('Marriage ') }} {{ $marriages ? $marriages : ''  }}</strong> </div>
                        <div> {{ $user->name }} was Married to
                            @if($user->husbands->isEmpty() == false)
                                @foreach($user->husbands as $husband)
                                    {{ $husband->profileLink() }}
                                @endforeach
                            @endif
                            on {{ $marriages ? $marriages : '"Date Not Available"'  }}
                        </div>                  
                    </div>
                </div> <hr>           
            @endif
        @endif
        @if( $user->childs)
            @forelse($user->childs as $child)
                <div class="row">
                    <div class="col-md-1 col-2">  <h2 class="mt-2"><i class="fas fa-child"></i></h2> </div>
                    <div class="col-md-11 col-10">
                        <div> <strong>{{ __('Having ') }} {{ $child->gender == 'F' ? __('Daughter') : __('Son') }}</strong> </div>
                        <div> {{ $user->name }} having {{ $child->gender == 'F' ? __('Daughter') : __('Son') }}
                              {{ $child->profileLink() }}
                            on {{ $child->dob ? $child->dob : '"Date Not Available"' }}
                        </div>                  
                    </div>
                </div><hr>
            @endforeach
        @endif
        @if($user->medias)
            @foreach($user->medias as $media)
            <div class="row">
                <div class="col-md-1 col-2">  <h2 class="mt-2"><i class="{{ $media->file_path ? 'fas fa-image':'fas fa-video' }}"></i></h2> </div>
                <div class="col-md-11 col-10">
                    @if($media->title)
                    <div> <strong>{{ __('Shared a Memory Moment with Title ') }}<i>{{ '"'.$media->title.'"' }}</i></strong> </div>@endif
                    <div> 
                        @if($media->file_path)
                            <img src="{{ asset('storage/'.$media->file_path) }}"><br>
                        @endif
                        @if($media->video_url)
                            {{ $media->video_url }}<br>
                        @endif
                        {{ __('Description: ') }}<i>{{ '"'.$media->description.'"' }}</i><br>
                        {{ __(' Location: ') }}<i>{{ '"'. $media->location.'"' }}</i><br>
                        {{ __(' Dated: ') }} {{ $media->date ? $media->date : '"Date Not Available"' }}
                    </div>                  
                </div>
            </div><hr>                
            @endforeach
        @endif
        @if($user->notes)
            @foreach($user->notes as $note)
            <div class="row">
                <div class="col-md-1 col-2">  <h2 class="mt-2"><i class="fas fa-file"></i></h2> </div>
                <div class="col-md-11 col-10">
                    <div> <strong>{{ $user->name }} {{ __('Shared a Notes')}} </strong> </div>
                    <div> 
                        {{ __('Note: ') }}<i>{{ '"'.$note->notes.'"' }}</i>
                    </div>                  
                </div>
            </div><hr>                
            @endforeach
        @endif
    </div>
</div>