<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        $user = Auth::user();
        $keyword = $request->input('search');

        $sales = Penjualan::query()
            // Filter berdasarkan role
            ->when($user->role->name === 'kasir', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })

            // Search nama user
            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'like', '%' . $keyword . '%');
                });
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('penjualan.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SearchRequest $request)
    {
        // Kasir/admin hanya memiliki satu transaksi OPEN aktif
        $sale = Penjualan::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status'  => 'OPEN',
            ],
            [
                'total_pembayaran' => 0,
                'metode_pembayaran' => 'CASH',
            ]
        );

        $keyword = $request->input('search');

        // Ambil produk berdasarkan pencarian
        $products = Produk::when($keyword, function ($query) use ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%');
        })
            ->orderBy('nama')
            ->get();

        $mode = 'create';

        return view('penjualan.pos', compact(
            'sale',
            'products',
            'mode'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        // Load item penjualan dan produk terkait
        $penjualan->load(
            'itemPenjualan.produk',
            'user'
        );

        return view('penjualan.show', compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        // Hanya user yang memiliki izin update yang boleh masuk
        // Sesuai Policy: hanya admin + status OPEN
        $this->authorize('update', $penjualan);

        $sale = $penjualan;

        $sale->load('itemPenjualan');

        $products = Produk::orderBy('nama')->get();

        $mode = 'edit';

        return view('penjualan.pos', compact(
            'sale',
            'products',
            'mode'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        // Proteksi utama:
        // hanya admin dan transaksi OPEN yang boleh di-update
        $this->authorize('update', $penjualan);

        $request->validate([
            'payment_method' => 'required|in:CASH,QRIS',
            'paid_amount' => 'required_if:payment_method,CASH|numeric|min:0',
        ]);

        // Pastikan transaksi masih OPEN
        if ($penjualan->status !== 'OPEN') {
            return back()->with(
                'error',
                'Transaksi sudah diproses.'
            );
        }

        // Pastikan keranjang tidak kosong
        if ($penjualan->itemPenjualan()->count() === 0) {
            return back()->with(
                'error',
                'Keranjang masih kosong.'
            );
        }

        DB::transaction(function () use ($penjualan, $request) {

            // Hitung ulang total dari database
            // untuk mencegah manipulasi total pembayaran
            $total = $penjualan->itemPenjualan()->sum('subtotal');

            // Jika CASH, gunakan nominal uang yang dibayar
            // Jika QRIS, paid_amount tidak digunakan
            $paidAmount = $request->payment_method === 'CASH'
                ? $request->paid_amount
                : null;

            // Pastikan uang tunai mencukupi
            if ($request->payment_method === 'CASH' && $paidAmount < $total) {
                throw ValidationException::withMessages([
                    'paid_amount' => 'Uang tunai yang dibayarkan kurang dari total pembayaran.',
                ]);
            }

            $penjualan->update([
                'metode_pembayaran' => $request->payment_method,
                'total_pembayaran'  => $total,
                'paid_amount'       => $paidAmount,
                'status'            => 'COMPLETED',
            ]);
        });

        return redirect()
            ->route('penjualan.index')
            ->with(
                'success',
                'Transaksi berhasil diselesaikan.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        // Policy:
        // hanya admin + status OPEN yang boleh menghapus
        $this->authorize('delete', $penjualan);

        DB::transaction(function () use ($penjualan) {

            // Hapus semua item penjualan terlebih dahulu
            $penjualan->itemPenjualan()->delete();

            // Kemudian hapus penjualan
            $penjualan->delete();
        });

        return redirect()
            ->route('penjualan.index')
            ->with(
                'success',
                'Penjualan berhasil dihapus.'
            );
    }
}