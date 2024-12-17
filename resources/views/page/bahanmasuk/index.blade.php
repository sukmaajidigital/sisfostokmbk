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
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="loadEditForm('{{ route('bahanmasuk.edit', $bahanmasuk->id) }}')">
                            <i class="fa fa-edit"></i>
                        </button>
                        <form action="{{ route('bahanmasuk.destroy', $bahanmasuk) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
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
