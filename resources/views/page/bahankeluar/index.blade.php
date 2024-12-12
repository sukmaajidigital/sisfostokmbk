@extends('layouts.app')
@section('title', 'bahankeluar')
@section('content')
    <button type="button" class="mb-2 btn btn-primary" onclick="window.location='{{ Route('bahankeluar.create') }}'">
        <i class="fa fa-plus"></i> Add data
    </button>
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
                        <a href="{{ route('bahankeluar.edit', $bahankeluar->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('bahankeluar.destroy', $bahankeluar) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                        </form>
                    </td>
            @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                autoWidth: true,
            });
        });
    </script>
    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data yang di hapus tidak dapat dikembalikan!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + userId).submit();
                }
            })
        }
    </script>
@endsection
