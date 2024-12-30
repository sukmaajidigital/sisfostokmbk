    @extends('layouts.appdashboard')
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <!-- Profile Circle -->
                            <div class="me-3" style="width: 60px; height: 60px; border-radius: 50%; background-color: #ffc107; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #fff; font-weight: bold;">
                                {{ substr(Str::upper(Auth::user()->nama_user), 0, 1) }}
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Welcome to Sistem Pendataan Stok bahan Baku</h5>
                                <p class="card-text mb-0">Hello, <strong>{{ Auth::user()->nama_user }}</strong>!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Total Jenis Bahan</h5>
                            <h2 class="fw-bold">{{ $totalJenisBahan }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Total Bahan Masuk</h5>
                            <h2 class="fw-bold">{{ $totalBahanMasuk }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Total Bahan Keluar</h5>
                            <h2 class="fw-bold">{{ $totalBahanKeluar }}</h2>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Jumlah Bahan Masuk</h5>
                            <h2 class="fw-bold">{{ $jumlahBahanMasuk }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title fw-semibold mb-4">Tabel Bahan Masuk</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Nama Bahan</th>
                                        <th>Catatan</th>
                                        <th>Supplier</th>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Jumlah Bahan Keluar</h5>
                            <h2 class="fw-bold">{{ $jumlahBahanKeluar }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title fw-semibold mb-4">Tabel Bahan Keluar</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Nama Bahan</th>
                                        <th>Catatan</th>
                                        <th>Keperluan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bahankeluars as $bahankeluar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $bahankeluar->tanggal }}</td>
                                            <td>{{ $bahankeluar->jumlah }}</td>
                                            <td>{{ $bahankeluar->bahan->nama_bahan }}</td>
                                            <td>
                                                <p>{{ $bahankeluar->catatan }}</p>
                                            </td>
                                            <td>{{ $bahankeluar->keperluan->nama_keperluan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    responsive: true,
                    autoWidth: true,
                    scrollX: true,
                    searching: true,
                    lengthChange: false,
                    pageLength: 2
                });
            });
        </script>
    @endsection
