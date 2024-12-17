@extends('layouts.app')
@section('title', 'bahanmasuk')
@section('content')

    <!-- Button Add Data -->
    @include('components.createmodalbutton', [
        'route' => route('bahanmasuk.create'),
        'label' => 'Add Bahan Masuk',
    ])
    <!-- Table -->
    <table id="example" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Nama Bahan</th>
                <th>Catatan</th>
                <th>Supplier</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bahanmasuks as $bahanmasuk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bahanmasuk->tanggal }}</td>
                    <td>{{ $bahanmasuk->jumlah }}</td>
                    <td>{{ $bahanmasuk->bahan->nama_bahan }}</td>
                    <td>
                        <p>{{ $bahanmasuk->catatan }}</p>
                    </td>
                    <td>{{ $bahanmasuk->supplier->nama_supplier }}</td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        @include('components.editmodalbutton', [
                            'route' => route('bahanmasuk.edit', $bahanmasuk->id),
                            'label' => 'Edit Bahan Masuk',
                        ])
                        @include('components.deletebutton', [
                            'route' => route('bahanmasuk.destroy', $bahanmasuk->id),
                            'confirmationMessage' => 'Are you sure you want to delete this item?',
                            'label' => 'Delete',
                        ])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('components.modal', [
        'edittitle' => 'Edit Bahan Masuk',
        'createtitle' => 'Tambah Bahan Masuk',
    ])
@endsection
@include('components.script')
