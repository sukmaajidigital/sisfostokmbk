@extends('layouts.app')
@section('title', 'Kategori')
@section('content')
    @include('components.createmodalbutton', [
        'route' => route('kategori.create'),
        'label' => 'Add Kategori Baru',
    ])
    <table id="example" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        @include('components.editmodalbutton', [
                            'route' => route('kategori.edit', $kategori->id),
                            'label' => 'Edit',
                        ])
                        @include('components.deletebutton', [
                            'route' => route('kategori.destroy', $kategori->id),
                            'confirmationMessage' => 'Are you sure you want to delete this item?',
                            'label' => 'Delete',
                        ])
                    </td>
            @endforeach
        </tbody>
    </table>
    @include('components.modal', [
        'edittitle' => 'Edit Kategori',
        'createtitle' => 'Tambah Kategori',
    ])
@endsection
@include('components.script')
