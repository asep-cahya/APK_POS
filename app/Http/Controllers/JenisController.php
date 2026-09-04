<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Jenis::class);

        $jenis = Jenis::with('creator')
            ->latest()
            ->get();

        return view('jenis.index', compact('jenis'));
    }

    public function create()
    {
        $this->authorize('create', Jenis::class);

        return view('jenis.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Jenis::class);

        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Jenis::create([
            'nama_jenis' => $request->nama_jenis,
            'keterangan' => $request->keterangan,
            'created_by' => Auth::id(),
        ]);

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis berhasil ditambahkan.');
    }

    public function edit(Jenis $jeni)
    {
        $this->authorize('update', $jeni);

        return view('jenis.edit', compact('jeni'));
    }

    public function update(Request $request, Jenis $jeni)
    {
        $this->authorize('update', $jeni);

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
        $this->authorize('delete', $jeni);

        $jeni->delete();

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis berhasil dihapus.');
    }
}
