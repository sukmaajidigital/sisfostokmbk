<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bahan;
use App\Models\BahanMasuk;
use App\Models\BahanKeluar;
use App\Models\Supplier;
use App\Models\Keperluan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $totalJenisBahan = Bahan::count();
        $totalBahanMasuk = BahanMasuk::count();
        $totalBahanKeluar = BahanKeluar::count();
        $jumlahBahanMasuk = BahanMasuk::sum('jumlah');
        $jumlahBahanKeluar = BahanKeluar::sum('jumlah');
        $totalSupplier = Supplier::count();

        $bahanmasuks = BahanMasuk::all();
        $bahankeluars = BahanKeluar::all();
        return view('page.dashboard', compact('user', 'totalJenisBahan', 'totalBahanMasuk', 'totalBahanKeluar', 'totalSupplier', 'jumlahBahanMasuk', 'jumlahBahanKeluar', 'bahanmasuks', 'bahankeluars'));
    }
    public function sample()
    {
        return view('page.sample');
    }
}
