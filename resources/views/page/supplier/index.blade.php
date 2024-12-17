@extends('layouts.app')
@section('title', 'supplier')
@section('content')
    @include('components.createmodalbutton', [
        'route' => route('supplier.create'),
        'label' => 'Add Supplier Baru',
    ])
    <table id="example" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama supplier</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->nomor }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        @include('components.editmodalbutton', [
                            'route' => route('supplier.edit', $supplier->id),
                            'label' => 'Edit Supplier',
                        ])
                        @include('components.deletebutton', [
                            'route' => route('supplier.destroy', $supplier->id),
                            'confirmationMessage' => 'Are you sure you want to delete this item?',
                            'label' => 'Delete',
                        ])
                    </td>
            @endforeach
        </tbody>
    </table>
    @include('components.modal', [
        'edittitle' => 'Edit Supplier',
        'createtitle' => 'Tambah Supplier',
    ])
@endsection
@include('components.script')
