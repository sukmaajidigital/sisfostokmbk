@extends('layouts.app')
@section('title', 'bahan masuk')
@section('formfilter')
    <form method="GET" action="{{ route('bahanmasuk.index') }}">
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
                <label for="supplier" class="form-label">Supplier</label>
                <select name="supplier" id="supplier" class="form-select">
                    <option value="">-- Pilih Supplier --</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ request('supplier') == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->nama_supplier }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="{{ route('bahanmasuk.export', ['format' => 'pdf'] + request()->all()) }}" class="btn btn-danger me-2">Export PDF</a>
                <a href="{{ route('bahanmasuk.export', ['format' => 'excel'] + request()->all()) }}" class="btn btn-success">Export Excel</a>
            </div>
        </div>
    </form>
@endsection
@section('content')
    @include('components.createmodalbutton', [
        'route' => route('bahanmasuk.create'),
        'label' => 'Add Bahan Masuk',
    ])
    <table id="example" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Nama Bahan</th>
                <th>Kategori Bahan</th>
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
                    <td>{{ $bahanmasuk->bahan->kategori->nama_kategori }}</td>
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
