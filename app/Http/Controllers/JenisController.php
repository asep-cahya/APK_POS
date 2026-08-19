<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::latest()->get();

        return view('jenis.index', compact('jenis'));
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Jenis::create([
            'nama_jenis' => $request->nama_jenis,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis berhasil ditambahkan.');
    }

    public function edit(Jenis $jeni)
    {
        return view('jenis.edit', compact('jeni'));
    }

    public function update(Request $request, Jenis $jeni)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $jeni->update([
            'nama_jenis' => $request->nama_jenis,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis berhasil diperbarui.');
    }

    public function destroy(Jenis $jeni)
    {
        $jeni->delete();

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis berhasil dihapus.');
    }
}
