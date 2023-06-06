@extends('layouts.user-profile')

@section('subtitle', trans('user.profile'))

@section('user-content')
    <div class="row">
        @include('users.partials.profile')
    </div>
    {{-- <div class="col-md-8">
            @include('users.partials.parent-spouse')
            @include('users.partials.childs')
            @include('users.partials.siblings')
        </div> --}}
    
@endsection

@section ('ext_css')
<link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/plugins/jquery.datetimepicker.css') }}">
@endsection

@section ('ext_js')
<script src="{{ asset('js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery.datetimepicker.js') }}"></script>
@endsection

@section ('script')
<script>
(function () {
    $('select').select2();
    $('input[name=marriage_date]').datetimepicker({
        timepicker:false,
        format:'Y-m-d',
        closeOnDateSelect: true,
        scrollInput: false
    });
})();

(function() {
        $('#date').datetimepicker({
            timepicker:false,
            format:'Y-m-d',
            closeOnDateSelect: true,
            scrollInput: false
        });
    })();
</script>
<script>
    // $("#add_media").click(function(){
    // $("p").hide();
    // });

    $("#add_media").click(function(){
    $("#formMedia").show();
    $("#addmedia").hide();
    });

    $("#add_notes").click(function(){
    $("#formNotes").show();
    $("#addnotes").hide();
    });

    //redirect to specific tab
    // $(document).ready(function () {
    //     $('#pills-tab a[href="#{{ old('tab') }}"]').tab('show')
    // });
    // $(document).ready(function () {
    //     $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
    //         localStorage.setItem('activeTab', $(e.target).attr('href'));
    //     });
    //     var activeTab = localStorage.getItem('activeTab');
    //     if(activeTab){
    //         $('#pills-tab a[href="' + activeTab + '"]').tab('show');
    //     }
    // });
</script>
@endsection
