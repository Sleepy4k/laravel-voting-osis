@once
    @push('addon-css')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/fc-4.2.1/fh-3.3.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
    @endpush
@endonce

{{ $dataTable->table() }}

@once
    @push('addon-script')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/fc-4.2.1/fh-3.3.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.js"></script>
        <script type="text/javascript" src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="{{ asset('assets/js/customs/swal.js') }}"></script>

        {!! $dataTable->scripts() !!}
    @endpush
@endonce