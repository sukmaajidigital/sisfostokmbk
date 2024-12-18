@extends('layouts.app')
@section('title', 'bahan')
@section('content')
    @include('components.createmodalbutton', [
        'route' => route('bahan.create'),
        'label' => 'Add Bahan Baru',
    ])
    <table id="bahan-table" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Bahan</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Kategori</th>
                <th>Action</th>
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
        $('#bahan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('bahan.getData') }}",
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
                }, // Kolom kategori ditambahkan
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    </script>
@endpush
