@extends('layouts.app')

@section('content')
    {!! $dataTable->table() !!}

    @push('scripts')

<script>
    $(function () {
        alert();
    })
</script>

        {!! $dataTable->scripts() !!}
    @endpush
@endsection

