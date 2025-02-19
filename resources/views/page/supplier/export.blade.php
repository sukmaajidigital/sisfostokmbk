<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bahan Keluar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body style="font-family: Arial, sans-serif; color: #856404;">

    <div class="container mt-5">
        <!-- Kop Surat -->
        <div class="text-center mb-4" style="border-bottom: 2px solid #ffc107; padding-bottom: 15px;">
            <img src="assets/images/logos/mbklong.png" alt="Logo Perusahaan" style="max-width: 200px; margin-bottom: 10px;">
            <div style="color: #856404;">
                <p style="margin: 0; font-size: 0.9rem;">Jl. Raya Nomor 123, Jakarta, Indonesia</p>
                <p style="margin: 0; font-size: 0.9rem;">Email: info@majukita.com | Telp: (021) 1234567</p>
            </div>
        </div>

        <!-- Header Section -->
        <div class="text-center mb-4">
            <h2 style="font-size: 1.5rem; color: #856404; margin: 0;">Laporan Bahan Keluar</h2>
            <p style="margin: 0; font-size: 0.9rem; color: #856404;">Periode: {{ Carbon\Carbon::now()->format('d-m-Y') }}</p>
        </div>

        <!-- Table Section -->
        <table class="table table-bordered table-hover" style="background-color: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); font-size: 0.85rem;">
            <thead>
                <tr>
                    <th style="background-color: #ffc107; color: black;">No.</th>
                    <th style="background-color: #ffc107; color: black;">Nama Supplier</th>
                    <th style="background-color: #ffc107; color: black;">Nomor Telepon</th>
                    <th style="background-color: #ffc107; color: black;">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $index => $suppliers)
                    <tr>
                        <td style="text-align: left;">{{ $index + 1 }}</td>
                        <td style="text-align: left;">{{ $suppliers->nama_supplier }}</td>
                        <td style="text-align: left;">{{ $suppliers->nomor }}</td>
                        <td style="text-align: left;">{{ $suppliers->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer Section -->
        <div class="text-center mt-4" style="font-size: 0.9rem; color: #856404;">
            <p style="margin: 0;">Generated on: {{ date('d-m-Y H:i') }}</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
