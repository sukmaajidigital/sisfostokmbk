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
        $bahanmasuks = bahanmasuk::all();
        return view('page.bahanmasuk.index', compact('bahanmasuks'));
    }

    public function create(): View
    {
        $suppliers = Supplier::all();
        $bahans = Bahan::all();
        return view('page.bahanmasuk.create', compact('suppliers', 'bahans'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            bahanmasuk::create($request->all());
            return redirect()->route('bahanmasuk.index')->with('success', 'bahanmasuk created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to create bahanmasuk.');
        }
    }

    public function edit(BahanMasuk $bahanmasuk): View
    {
        $suppliers = Supplier::all();
        $bahans = Bahan::all();
        return view('page.bahanmasuk.edit', compact('bahanmasuk', 'suppliers', 'bahans'));
    }
    public function update(Request $request, BahanMasuk $bahanmasuk): RedirectResponse
    {
        try {
            $bahanmasuk->update($request->all());
            return redirect()->route('bahanmasuk.index')->with('success', 'bahanmasuk update successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to update bahanmasuk.');
        }
    }
    public function destroy(bahanmasuk $bahanmasuk)
    {
        $bahanmasuk->delete();
        return to_route('bahanmasuk.index')->with('success', 'bahanmasuk Deleted successfully.');
    }
}
