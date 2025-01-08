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
        $stoklama = Bahan::where('id', $request->id_bahan)->first()->stok;
        Bahan::where('id', $request->id_bahan)->update([
            'stok' => $stoklama - $request->jumlah
        ]);
        BahanKeluar::create([
            'id_bahan' => $request->id_bahan,
            'tanggal' => $request->tanggal,
            'id_keperluan' => $request->id_keperluan,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
        ]);
        return redirect()->route('bahankeluar.index')->with('success', 'bahankeluar created successfully.');
    }
    public function edit(BahanKeluar $bahankeluar): View
    {
        $bahans = Bahan::all();
        $keperluans = Keperluan::all();
        return view('page.bahankeluar.edit', compact('bahankeluar', 'bahans', 'keperluans'));
    }
    public function update(Request $request, BahanKeluar $bahankeluar): RedirectResponse
    {

        $stoklama = bahan::where('id', $request->id_bahan)->first()->stok;
        $editbahankeluar = BahanKeluar::where('id_bahan', $request->id_bahan)->first()->jumlah;
        $hasilstoklama = $stoklama + $editbahankeluar;
        bahan::where('id', $request->id_bahan)->update([
            'stok' => $hasilstoklama - $request->jumlah
        ]);
        $bahankeluar->update([
            'id_bahan' => $request->id_bahan,
            'tanggal' => $request->tanggal,
            'id_keperluan' => $request->id_keperluan,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
        ]);
        return redirect()->route('bahankeluar.index')->with('success', 'bahankeluar update successfully.');
    }
    public function destroy(bahankeluar $bahankeluar)
    {
        $stoklama = bahan::where('id', $bahankeluar->id_bahan)->first()->stok;
        bahan::where('id', $bahankeluar->id_bahan)->update([
            'stok' => $stoklama + $bahankeluar->jumlah
        ]);
        $bahankeluar->delete();
        return to_route('bahankeluar.index')->with('success', 'bahankeluar Deleted successfully.');
    }
}
