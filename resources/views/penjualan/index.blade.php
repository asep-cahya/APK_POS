
@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

<div class="container py-5">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('errors'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('errors') }}
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>
            <h2 class="fw-bold mb-1">
                Manajemen Penjualan
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh transaksi penjualan.
            </p>
        </div>

        <a href="{{ route('penjualan.create') }}"
            class="btn btn-dark rounded-3 px-4">

            Buat Transaksi

        </a>

    </div>

    <!-- Search -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form action="{{ route('penjualan.index') }}" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari nama kasir">

                    <button class="btn btn-dark">
                        Cari
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h5 class="fw-bold mb-4">
                Daftar Penjualan
            </h5>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60" class="text-center">No</th>
                            <th>Tanggal</th>
                            <th>Kasir</th>
                            <th>Total</th>
                            <th class="text-center">Metode</th>
                            <th class="text-center">Status</th>
                            <th width="220" class="text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($sales as $sale)

                        <tr>

                            <td class="text-center">
                                {{ $sales->firstItem() + $loop->index }}
                            </td>

                            <td>
                                {{ $sale->created_at->translatedFormat('d M Y H:i') }}
                            </td>

                            <td>
                                {{ $sale->user->name }}
                            </td>

                            <td class="fw-semibold">
                                Rp {{ number_format($sale->total_pembayaran,0,',','.') }}
                            </td>

                            <td class="text-center">

                                <span class="badge border border-dark text-dark rounded-pill px-3">
                                    {{ $sale->metode_pembayaran }}
                                </span>

                            </td>

                            <td class="text-center">

                                <span class="badge bg-dark rounded-pill px-3">
                                    {{ $sale->status }}
                                </span>

                            </td>

                            <td class="text-center">

                                <a href="{{ route('penjualan.show',$sale) }}"
                                    class="btn btn-outline-dark btn-sm">
                                    Detail
                                </a>

                                @can('view', $sale)

                                <a href="{{ route('penjualan.edit',$sale) }}"
                                    class="btn btn-outline-dark btn-sm">
                                    Edit
                                </a>

                                @endcan

                                @can('delete', $sale)

                                <form
                                    action="{{ route('penjualan.destroy',$sale) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-dark btn-sm"
                                        onclick="return confirm('Apakah yakin ingin menghapus transaksi ini?')">

                                        Hapus

                                    </button>

                                </form>

                                @endcan

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7"
                                class="text-center text-muted py-5">

                                Belum ada data penjualan.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white border-0">

            {{ $sales->links() }}

        </div>

    </div>

</div>

@endsection

