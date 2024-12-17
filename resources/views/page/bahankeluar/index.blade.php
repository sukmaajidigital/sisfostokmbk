@extends('layouts.app')
@section('title', 'bahankeluar')
@section('content')
    <!-- Button Add Data -->
    @include('components.createmodalbutton', [
        'route' => route('bahankeluar.create'),
        'label' => 'Add Bahan Keluar',
    ])
    <table id="example" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Keperluan</th>
                <th>tanggal</th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Nama Bahan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bahankeluars as $bahankeluar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bahankeluar->keperluan->nama_keperluan }}</td>
                    <td>{{ $bahankeluar->tanggal }}</td>
                    <td>{{ $bahankeluar->jumlah }}</td>
                    <td>{{ $bahankeluar->catatan }}</td>
                    <td>{{ $bahankeluar->bahan->nama_bahan }}</td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        @include('components.editmodalbutton', [
                            'route' => route('bahankeluar.edit', $bahankeluar->id),
                            'label' => 'Edit Bahan Keluar',
                        ])
                        <form action="{{ route('bahankeluar.destroy', $bahankeluar->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                        </form>
                    </td>
            @endforeach
        </tbody>
    </table>
    @include('components.modal', [
        'edittitle' => 'Edit Bahan Keluar',
        'createtitle' => 'Tambah Bahan Keluar',
    ])
@endsection
@include('components.script')
