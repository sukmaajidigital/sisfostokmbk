<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Kategori;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\DataTables;

class BahanController extends Controller
{
    public function ajax()
    {
        $bahans = Bahan::all();
        return response()->json($bahans);
    }
    // public function index(): View
    // {
    //     $bahans = Bahan::all();
    //     return view('page.bahan.index', compact('bahans'));
    // }
    public function index(): View
    {
        return view('page.bahan.index');
    }
    public function getData(): JsonResponse
    {
        $bahans = Bahan::with('kategori:id,nama_kategori') // Eager load relasi kategori
            ->select('id', 'nama_bahan', 'stok', 'satuan', 'id_kategori'); // Pilih kolom yang diperlukan

        return DataTables::of($bahans)
            ->addColumn('kategori', function ($row) {
                return $row->kategori->nama_kategori ?? '-'; // Tampilkan nama kategori atau tanda jika null
            })
            ->addColumn('action', function ($row) {
                return view('components.action-buttons', [
                    'editRoute' => route('bahan.edit', $row->id),
                    'deleteRoute' => route('bahan.destroy', $row->id),
                    'deleteMessage' => 'Are you sure you want to delete this item?',
                ])->render();
            })
            ->rawColumns(['action']) // Jika kolom action mengandung HTML
            ->make(true);
    }

    public function create(): View
    {
        $kategoris = Kategori::all();
        return view('page.bahan.create', compact('kategoris'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            Bahan::create($request->all());
            return redirect()->route('bahan.index')->with('success', 'bahan created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to create bahan.');
        }
    }

    public function edit(Bahan $bahan): View
    {
        $kategoris = Kategori::all();
        return view('page.bahan.edit', compact('bahan', 'kategoris'));
    }
    public function update(Request $request, Bahan $bahan): RedirectResponse
    {
        try {
            $bahan->update($request->all());
            return redirect()->route('bahan.index')->with('success', 'bahan update successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to update bahan.');
        }
    }
    public function destroy(Bahan $bahan)
    {
        $bahan->delete();
        return to_route('bahan.index')->with('success', 'bahan Deleted successfully.');
    }
}
