<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\BahanMasuk;
use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BahanMasukController extends Controller
{
    public function ajax()
    {
        $bahanmasuks = bahanmasuk::all();
        return response()->json($bahanmasuks);
    }
    public function index(): View
    {
        $bahans = Bahan::all();
        $suppliers = Supplier::all();
        $bahanmasuks = bahanmasuk::all();
        return view('page.bahanmasuk.index', compact('bahanmasuks', 'bahans', 'suppliers'));
    }
    public function create(): View
    {
        $suppliers = Supplier::all();
        $bahans = Bahan::all();
        return view('page.bahanmasuk.create', compact('suppliers', 'bahans'));
    }
    public function store(Request $request): RedirectResponse
    {
        $stoklama = Bahan::where('id', $request->id_bahan)->first()->stok;
        Bahan::where('id', $request->id_bahan)->update([
            'stok' => $stoklama + $request->jumlah
        ]);
        BahanMasuk::create($request->all());
        return redirect()->route('bahanmasuk.index')->with('success', 'bahanmasuk created successfully.');
    }
    public function edit(BahanMasuk $bahanmasuk): View
    {
        $suppliers = Supplier::all();
        $bahans = Bahan::all();
        return view('page.bahanmasuk.edit', compact('bahanmasuk', 'suppliers', 'bahans'));
    }
    public function update(Request $request, BahanMasuk $bahanmasuk): RedirectResponse
    {
        $stoklama = bahan::where('id', $request->id_bahan)->first()->stok;
        $editbahanmasuk = BahanMasuk::where('id_bahan', $request->id_bahan)->first()->jumlah;
        $hasilstoklama = $stoklama - $editbahanmasuk;
        bahan::where('id', $request->id_bahan)->update([
            'stok' => $hasilstoklama + $request->jumlah
        ]);
        $bahanmasuk->update($request->all());
        return redirect()->route('bahanmasuk.index')->with('success', 'bahanmasuk update successfully.');
    }
    public function destroy(bahanmasuk $bahanmasuk)
    {
        $stoklama = bahan::where('id', $bahanmasuk->id_bahan)->first()->stok;
        bahan::where('id', $bahanmasuk->id_bahan)->update([
            'stok' => $stoklama - $bahanmasuk->jumlah
        ]);
        $bahanmasuk->delete();
        return to_route('bahanmasuk.index')->with('success', 'bahanmasuk Deleted successfully.');
    }
}
