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
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                        </form>
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
