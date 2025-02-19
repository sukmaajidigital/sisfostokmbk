@extends('layouts.app')
@section('title', 'bahan keluar')
@section('formfilter')
    <form method="GET" action="{{ route('bahankeluar.index') }}">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="kategori" class="form-label">Kategori Bahan</label>
                <select name="kategori" id="kategori" class="form-select">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="keperluan" class="form-label">Keperluan</label>
                <select name="keperluan" id="keperluan" class="form-select">
                    <option value="">-- Pilih Keperluan --</option>
                    @foreach ($keperluans as $keperluan)
                        <option value="{{ $keperluan->id }}" {{ request('keperluan') == $keperluan->id ? 'selected' : '' }}>
                            {{ $keperluan->nama_keperluan }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="{{ route('bahankeluar.export', ['format' => 'pdf'] + request()->all()) }}" class="btn btn-danger me-2">Export PDF</a>
                <a href="{{ route('bahankeluar.export', ['format' => 'excel'] + request()->all()) }}" class="btn btn-success">Export Excel</a>
            </div>
        </div>
    </form>
@endsection
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
                <th>Tanggal</th>
                <th>Nama Bahan</th>
                <th>Kategori Bahan</th>
                <th>Jumlah</th>
                <th>Keperluan</th>
                <th>Catatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bahankeluars as $bahankeluar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bahankeluar->tanggal }}</td>
                    <td>{{ $bahankeluar->bahan->nama_bahan }}</td>
                    <td>{{ $bahankeluar->bahan->kategori->nama_kategori }}</td>
                    <td>{{ $bahankeluar->jumlah }}</td>
                    <td>{{ $bahankeluar->keperluan->nama_keperluan }}</td>
                    <td>{{ $bahankeluar->catatan }}</td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        @include('components.editmodalbutton', [
                            'route' => route('bahankeluar.edit', $bahankeluar->id),
                            'label' => 'Edit',
                        ])
                        @include('components.deletebutton', [
                            'route' => route('bahankeluar.destroy', $bahankeluar->id),
                            'confirmationMessage' => 'Are you sure you want to delete this item?',
                            'label' => 'Delete',
                        ])
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
