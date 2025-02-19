<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Kategori;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BahanExport;

class BahanController extends Controller
{
    public function ajax()
    {
        $bahans = Bahan::all();
        return response()->json($bahans);
    }
    public function index(): View
    {
        $kategoris = Kategori::select('id', 'nama_kategori')->get();
        return view('page.bahan.index', compact('kategoris'));
    }

    public function getData(Request $request): JsonResponse
    {
        $bahans = Bahan::with('kategori:id,nama_kategori')
            ->select('id', 'nama_bahan', 'stok', 'satuan', 'id_kategori');

        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $bahans->where('id_kategori', $request->kategori);
        }

        return DataTables::of($bahans)
            ->addColumn('kategori', function ($row) {
                return $row->kategori->nama_kategori ?? '-';
            })
            ->addColumn('action', function ($row) {
                return view('components.action-buttons', [
                    'editRoute' => route('bahan.edit', $row->id),
                    'deleteRoute' => route('bahan.destroy', $row->id),
                    'deleteMessage' => 'yakin ingin mengapus bahan ' . $row->nama_bahan . ' ?',
                    'editLabel' => 'Edit',
                    'deleteLabel' => 'Delete',
                ])->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function exportExcel(Request $request)
    {
        $kategori = $request->kategori;
        $satuan = $request->satuan;
        return Excel::download(new BahanExport($kategori, $satuan), 'bahan.xlsx');
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
