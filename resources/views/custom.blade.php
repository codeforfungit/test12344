@extends('layouts.app')


@section('content')
<style>
    table.dataTable thead .sorting::after,
    table.dataTable thead .sorting_asc::after {
        display:none;
    }

    table.dataTable thead .sorting_desc::after {
        display:none;
    }

    table.dataTable thead .sorting {
        background-image: url(https://datatables.net/media/images/sort_both.png);
        background-repeat: no-repeat;
        background-position: center right;
    }

    table.dataTable thead .sorting_asc {
        background-image: url(https://datatables.net/media/images/sort_asc.png);
        background-repeat: no-repeat;
        background-position: center right;
    }

    table.dataTable thead .sorting_desc {
        background-image: url(https://datatables.net/media/images/sort_desc.png);
        background-repeat: no-repeat;
        background-position: center right;
    }



</style>
        <div class="col-12">
            <input type="hidden" name="custom_value" id="custom_value" value="{{isset($customValue)?json_encode($customValue):''}}">
            {!! $html->table(['class' => 'table table-bordered'], true) !!}
        </div>


    @push('scripts')
        
        {!! $html->scripts() !!}

    @endpush
@endsection

