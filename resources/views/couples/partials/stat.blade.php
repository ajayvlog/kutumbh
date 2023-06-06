<div class="row">
    
        <div class="panel panel-default table-responsive hidden-xs">
            <table class="table table-condensed table-bordered">
                <tr>
                    <td class="col-xs-2 text-center">{{ trans('couple.husband') }}</td>
                    <td class="col-xs-2 text-center">{{ trans('couple.wife') }}</td>
                    <td class="col-xs-2 text-center">{{ trans('couple.childs_count') }}</td>
                    <td class="col-xs-2 text-center">{{ trans('couple.marriage_date') }}</td>
                </tr>
                <tr>
                    <td class="text-center lead" style="border-top: none;">{{ $couple->husband->profileLink() }}</td>
                    <td class="text-center lead" style="border-top: none;">{{ $couple->wife->profileLink() }}</td>
                    <td class="text-center lead" style="border-top: none;">{{ $couple->childs->count() }}</td>
                    <td class="text-center lead" style="border-top: none;">{{ $couple->marriage_date ? $couple->marriage_date : 'Date not Available' }}</td>
                </tr>
            </table>
        </div>
   
</div>