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
        try {
            $stoklama = bahan::where('id', $request->id_bahan)->first()->stok;
            bahan::where('id', $request->id_bahan)->update([
                'stok' => $stoklama - $request->jumlah
            ]);
            BahanKeluar::create($request->all());
            return redirect()->route('bahankeluar.index')->with('success', 'bahankeluar created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to create bahankeluar.');
        }
    }

    public function edit(bahankeluar $bahankeluar): View
    {
        $bahans = Bahan::all();
        $keperluans = Keperluan::all();
        return view('page.bahankeluar.edit', compact('bahankeluar', 'bahans', 'keperluans'));
    }
    public function update(Request $request, bahankeluar $bahankeluar): RedirectResponse
    {
        try {
            $stoklama = bahan::where('id', $request->id_bahan)->first()->stok;
            $editbahankeluar = BahanKeluar::where('id_bahan', $request->id_bahan)->first()->jumlah;
            $hasilstoklama = $stoklama + $editbahankeluar;
            bahan::where('id', $request->id_bahan)->update([
                'stok' => $hasilstoklama - $request->jumlah
            ]);
            $bahankeluar->update($request->all());
            return redirect()->route('bahankeluar.index')->with('success', 'bahankeluar update successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to update bahankeluar.');
        }
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
