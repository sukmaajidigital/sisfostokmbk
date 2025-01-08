<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bahan;
use App\Models\BahanMasuk;
use App\Models\BahanKeluar;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Keperluan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = User::where('id', Auth::user()->id)->first();
        $totalJenisBahan = Bahan::count();
        $totalBahanMasuk = BahanMasuk::count();
        $totalBahanKeluar = BahanKeluar::count();
        $jumlahBahanMasuk = BahanMasuk::sum('jumlah');
        $jumlahBahanKeluar = BahanKeluar::sum('jumlah');
        $totalSupplier = Supplier::count();
        $suppliers = Supplier::all();
        $kategoris = Kategori::all();

        // View Data Filter Export Bahan Masuk
        $kategorimasukId = $request->input('kategorimasuk');
        $supplierId = $request->input('supplier');

        $bahanmasuks = BahanMasuk::when($kategorimasukId, function ($query, $kategorimasukId) {
            return $query->whereHas('bahan.kategori', function ($query) use ($kategorimasukId) {
                $query->where('id', $kategorimasukId);
            });
        })
            ->when($supplierId, function ($query, $supplierId) {
                return $query->where('id_supplier', $supplierId);
            })
            ->get();

        $suppliers = Supplier::all();
        //  View data filter export bahan keluar
        $kategorikeluarId = $request->input('kategorikeluar');
        $keperluanId = $request->input('keperluan');

        $bahankeluars = BahanKeluar::when($kategorikeluarId, function ($query, $kategorikeluarId) {
            return $query->whereHas('bahan.kategori', function ($query) use ($kategorikeluarId) {
                $query->where('id', $kategorikeluarId);
            });
        })
            ->when($keperluanId, function ($query, $keperluanId) {
                return $query->where('id_keperluan', $keperluanId);
            })
            ->get();

        $kategoris = Kategori::all();
        $keperluans = Keperluan::all();
        return view('page.dashboard', compact('user', 'totalJenisBahan', 'totalBahanMasuk', 'totalBahanKeluar', 'totalSupplier', 'jumlahBahanMasuk', 'jumlahBahanKeluar', 'bahanmasuks', 'bahankeluars', 'suppliers', 'kategoris', 'keperluans'));
    }
    public function sample()
    {
        return view('page.sample');
    }
}
