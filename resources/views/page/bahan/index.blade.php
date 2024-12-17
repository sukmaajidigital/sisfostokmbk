@extends('layouts.app')
@section('title', 'bahan')
@section('content')
    @include('components.createmodalbutton', [
        'route' => route('bahan.create'),
        'label' => 'Add Bahan Baru',
    ])
    <table id="example" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama bahan</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bahans as $bahan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bahan->nama_bahan }}</td>
                    <td>{{ $bahan->satuan }}</td>
                    <td>{{ $bahan->stok }}</td>
                    <td>{{ $bahan->kategori->nama_kategori }}</td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <a href="{{ route('bahan.edit', $bahan->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('bahan.destroy', $bahan) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                        </form>
                    </td>
            @endforeach
        </tbody>
    </table>
    @include('components.modal', [
        'edittitle' => 'Edit Bahan',
        'createtitle' => 'Tambah Bahan',
    ])
@endsection
@include('components.script')
