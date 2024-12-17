<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\BahanKeluar;
use App\Models\Keperluan;
use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BahanKeluarController extends Controller
{
    public function ajax()
    {
        $bahankeluars = BahanKeluar::all();
        return response()->json($bahankeluars);
    }
    public function index(): View
    {
        $bahankeluars = BahanKeluar::all();
        return view('page.bahankeluar.index', compact('bahankeluars'));
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
