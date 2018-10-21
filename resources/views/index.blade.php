@extends('layouts.app')


@section('content')
    {!! $html->table(['class' => 'table table-bordered'], true) !!}
    @push('scripts')
        
        {!! $html->scripts() !!}
        <script>
            $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();
alert();
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );

                // Toggle the visibility
                column.visible( ! column.visible() );
            } );
        </script>
    @endpush
@endsection

