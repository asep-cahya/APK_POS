@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

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
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold text-primary">
                🧾 Manajemen Penjualan
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh transaksi penjualan.
            </p>
        </div>

        <a href="{{ route('penjualan.create') }}"
            class="btn btn-primary shadow-sm">

            + Buat Transaksi

        </a>

    </div>

    <!-- Search -->
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <form action="{{ route('penjualan.index') }}" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari nama kasir...">

                    <button class="btn btn-primary">
                        🔍 Search
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Table -->

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Daftar Penjualan
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr class="text-center">

                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kasir</th>
                            <th>Total</th>
                            <th>Metode</th>
                            <th>Status</th>
                            <th width="240">Aksi</th>

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
                                👤 {{ $sale->user->name }}
                            </td>

                            <td class="fw-bold text-success">
                                Rp {{ number_format($sale->total_pembayaran,0,',','.') }}
                            </td>

                            <td class="text-center">

                                @if($sale->metode_pembayaran == 'CASH')
                                <span class="badge bg-success">
                                    CASH
                                </span>
                                @else
                                <span class="badge bg-info">
                                    {{ $sale->metode_pembayaran }}
                                </span>
                                @endif

                            </td>

                            <td class="text-center">

                                @if($sale->status == 'COMPLETED')

                                <span class="badge bg-success">
                                    COMPLETED
                                </span>

                                @else

                                <span class="badge bg-warning text-dark">
                                    OPEN
                                </span>

                                @endif

                            </td>

                            <td class="text-nowrap">

                                <a href="{{ route('penjualan.show',$sale) }}"
                                    class="btn btn-info btn-sm">

                                    Detail

                                </a>

                                @can('view', $sale)

                                <a href="{{ route('penjualan.edit',$sale) }}"
                                    class="btn btn-warning btn-sm">

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
                                        class="btn btn-danger btn-sm"
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
                                class="text-center py-4 text-muted">

                                Belum ada data penjualan.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white">

            {{ $sales->links() }}

        </div>

    </div>

</div>

@endsection