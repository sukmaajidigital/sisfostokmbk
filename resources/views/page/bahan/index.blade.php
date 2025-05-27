@extends('layouts.app')
@section('title', 'bahan')
@section('formfilter')
    <div class="row mb-3 align-items-end">
        <div class="col-md-4">
            <label for="filter-kategori" class="fw-semibold mb-2">Filter Kategori</label>
            <select id="filter-kategori" class="form-select">
                <option value="">-- Semua --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 end">
            <a id="export-excel" href="#" class="btn btn-success">Export to Excel</a>
        </div>
    </div>
@endsection
@section('content')
    @unless (in_array(auth()->user()->role, [2, 3]))
        @include('components.createmodalbutton', [
            'route' => route('bahan.create'),
            'label' => 'Add Bahan Baru',
        ])
    @endunless
    <table id="bahan-table" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Bahan</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Kategori</th>
                @unless (auth()->user()->role == 2 || auth()->user()->role == 3)
                    <th>Action</th>
                @endunless
            </tr>
        </thead>
    </table>
    @include('components.modal', [
        'edittitle' => 'Edit Bahan',
        'createtitle' => 'Tambah Bahan',
    ])
@endsection
@include('components.script')
@push('script')
    <script>
        $(document).ready(function() {
            let table = $('#bahan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('bahan.getData') }}",
                    data: function(d) {
                        d.kategori = $('#filter-kategori').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama_bahan',
                        name: 'nama_bahan'
                    },
                    {
                        data: 'stok',
                        name: 'stok'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    @if (!in_array(auth()->user()->role, [2, 3]))
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    @endif
                ]
            });

            // Filter kategori
            $('#filter-kategori').on('change', function() {
                table.draw();
            });

            // Export ke Excel
            $('#export-excel').on('click', function(e) {
                e.preventDefault();
                let kategori = $('#filter-kategori').val();
                let exportUrl = "{{ route('bahan.exportExcel') }}?kategori=" + encodeURIComponent(kategori);

                // Mencegah klik berulang
                let $btn = $(this);
                $btn.prop('disabled', true).text('Mengunduh...');

                window.location.href = exportUrl;

                setTimeout(function() {
                    $btn.prop('disabled', false).text('Export Excel');
                }, 3000);
            });
        });
    </script>
@endpush
