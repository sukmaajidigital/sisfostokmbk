<?php

namespace App\Http\Controllers;

use App\Models\Keperluan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KeperluanController extends Controller
{

    public function ajax()
    {
        $keperluans = Keperluan::all();
        return response()->json($keperluans);
    }
    public function index(): View
    {
        $keperluans = Keperluan::orderByDesc('created_at')->paginate(10);
        return view('page.keperluan.index', compact('keperluans'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(): View
    {
        return view('page.keperluan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            keperluan::create($request->all());
            return redirect()->route('keperluan.index')->with('success', 'keperluan created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to create keperluan.');
        }
    }

    public function edit(Keperluan $keperluan): View
    {
        return view('page.keperluan.edit', compact('keperluan'));
    }
    public function update(Request $request, Keperluan $keperluan): RedirectResponse
    {
        try {
            $keperluan->update($request->all());
            return redirect()->route('keperluan.index')->with('success', 'keperluan update successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to update keperluan.');
        }
    }
    public function destroy(Keperluan $keperluan)
    {
        $keperluan->delete();
        return to_route('keperluan.index')->with('success', 'keperluan Deleted successfully.');
    }
}
