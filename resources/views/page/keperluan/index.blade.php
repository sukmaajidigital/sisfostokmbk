@extends('layouts.app')
@section('title', 'keperluan')
@section('content')
    @include('components.createmodalbutton', [
        'route' => route('keperluan.create'),
        'label' => 'Add Keperluan Baru',
    ])
    <table id="example" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama keperluan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keperluans as $keperluan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $keperluan->nama_keperluan }}</td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        @include('components.editmodalbutton', [
                            'route' => route('keperluan.edit', $keperluan->id),
                            'label' => 'Edit Keperluan',
                        ])
                        <form action="{{ route('keperluan.destroy', $keperluan) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                        </form>
                    </td>
            @endforeach
        </tbody>
    </table>
    @include('components.modal', [
        'edittitle' => 'Edit Keperluan',
        'createtitle' => 'Tambah Keperluan',
    ])
@endsection
@include('components.script')
