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
            bahankeluar::create($request->all());
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
        $bahankeluar->delete();
        return to_route('bahankeluar.index')->with('success', 'bahankeluar Deleted successfully.');
    }
}