<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function ajax()
    {
        $suppliers = supplier::all();
        return response()->json($suppliers);
    }
    public function index(): View
    {
        $suppliers = supplier::all();
        return view('page.supplier.index', compact('suppliers'));
    }

    public function create(): View
    {
        return view('page.supplier.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            supplier::create($request->all());
            return redirect()->route('supplier.index')->with('success', 'supplier created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to create supplier.');
        }
    }

    public function edit(supplier $supplier): View
    {
        return view('page.supplier.edit', compact('supplier'));
    }
    public function update(Request $request, Supplier $supplier): RedirectResponse
    {
        try {
            $supplier->update($request->all());
            return redirect()->route('supplier.index')->with('success', 'supplier update successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to update supplier.');
        }
    }
    public function destroy(supplier $supplier)
    {
        $supplier->delete();
        return to_route('supplier.index')->with('success', 'supplier Deleted successfully.');
    }
}
