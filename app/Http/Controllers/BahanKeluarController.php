<?php

namespace App\Http\Controllers;

use App\Exports\BahanKeluarExport;
use App\Exports\BahanMasukExport;
use App\Models\Bahan;
use App\Models\BahanKeluar;
use App\Models\Kategori;
use App\Models\Keperluan;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BahanKeluarController extends Controller
{
    public function ajax()
    {
        $bahankeluars = BahanKeluar::all();
        return response()->json($bahankeluars);
    }
    public function index(Request $request): View
    {
        $kategoriId = $request->input('kategori');
        $keperluanId = $request->input('keperluan');

        $bahankeluars = BahanKeluar::when($kategoriId, function ($query, $kategoriId) {
            return $query->whereHas('bahan.kategori', function ($query) use ($kategoriId) {
                $query->where('id', $kategoriId);
            });
        })
            ->when($keperluanId, function ($query, $keperluanId) {
                return $query->where('id_keperluan', $keperluanId);
            })
            ->get();

        $kategoris = Kategori::all();
        $keperluans = Keperluan::all();

        return view('page.bahankeluar.index', compact('bahankeluars', 'kategoris', 'keperluans'));
    }
    public function export(Request $request)
    {
        $kategoriId = $request->input('kategori');
        $supplierId = $request->input('supplier');
        $format = $request->input('format');

        $bahankeluars = BahanKeluar::when($kategoriId, function ($query, $kategoriId) {
            return $query->whereHas('bahan.kategori', function ($query) use ($kategoriId) {
                $query->where('id', $kategoriId);
            });
        })
            ->when($supplierId, function ($query, $supplierId) {
                return $query->where('supplier_id', $supplierId);
            })
            ->get();

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('page.bahankeluar.export', compact('bahankeluars'));
            return $pdf->download('bahankeluar.pdf');
        } elseif ($format === 'excel') {
            return Excel::download(new BahanKeluarExport($bahankeluars), 'bahankeluar.xlsx');
        }

        return redirect()->back();
    }
    public function create(): View
    {
        $bahans = Bahan::all();
        $keperluans = Keperluan::all();
        return view('page.bahankeluar.create', compact('bahans', 'keperluans'));
    }
    public function store(Request $request): RedirectResponse
    {
        // Ambil data stok lama
        $bahan = Bahan::where('id', $request->id_bahan)->first();

        // Cek apakah stok cukup
        if ($request->jumlah > $bahan->stok) {
            return redirect()->back()->with('error', 'Jumlah bahan keluar melebihi stok yang tersedia!');
        }

        // Kurangi stok jika cukup
        $bahan->update([
            'stok' => $bahan->stok - $request->jumlah
        ]);

        // Simpan data bahan keluar
        BahanKeluar::create([
            'id_bahan' => $request->id_bahan,
            'tanggal' => $request->tanggal,
            'id_keperluan' => $request->id_keperluan,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('bahankeluar.index')->with('success', 'Bahan keluar berhasil ditambahkan.');
    }
    public function edit(BahanKeluar $bahankeluar): View
    {
        $bahans = Bahan::all();
        $keperluans = Keperluan::all();
        return view('page.bahankeluar.edit', compact('bahankeluar', 'bahans', 'keperluans'));
    }
    public function update(Request $request, BahanKeluar $bahankeluar): RedirectResponse
    {
        return DB::transaction(function () use ($request, $bahankeluar) {
            // Ambil stok lama dari tabel bahan
            $bahan = Bahan::where('id', $bahankeluar->id_bahan)->first();

            // Kembalikan stok sebelum mengupdate
            $bahan->stok += $bahankeluar->jumlah;

            // Cek apakah stok cukup untuk perubahan
            if ($request->jumlah > $bahan->stok) {
                return redirect()->back()->with('error', 'Jumlah bahan keluar melebihi stok yang tersedia!');
            }

            // Update stok dengan jumlah baru
            $bahan->stok -= $request->jumlah;
            $bahan->save();

            // Update data bahan keluar
            $bahankeluar->update([
                'id_bahan' => $request->id_bahan,
                'tanggal' => $request->tanggal,
                'id_keperluan' => $request->id_keperluan,
                'jumlah' => $request->jumlah,
                'catatan' => $request->catatan,
            ]);

            return redirect()->route('bahankeluar.index')->with('success', 'Bahan keluar berhasil diperbarui.');
        });
    }
    public function destroy(BahanKeluar $bahankeluar)
    {
        return DB::transaction(function () use ($bahankeluar) {
            // Ambil data bahan
            $bahan = Bahan::where('id', $bahankeluar->id_bahan)->first();

            if ($bahan) {
                // Kembalikan stok sebelum menghapus data
                $bahan->stok += $bahankeluar->jumlah;
                $bahan->save();
            }

            // Hapus data bahan keluar
            $bahankeluar->delete();

            return redirect()->route('bahankeluar.index')->with('success', 'Bahan keluar berhasil dihapus.');
        });
    }
}
