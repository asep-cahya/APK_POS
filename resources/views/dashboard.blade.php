@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('layouts.navbar')

<div class="container py-4">

    <!-- Header -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">
            📊 Dashboard POS
        </h2>

        <p class="text-muted mb-0">
            {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
        </p>
    </div>

    <!-- Statistik -->
    <div class="row g-4 mb-5">

        <div class="col-md-3">
            <div class="card shadow border-0 bg-primary text-white h-100">
                <div class="card-body text-center">
                    <h1>💰</h1>
                    <h6>Total Penjualan</h6>
                    <h3>Rp {{ number_format($ringkasan['total_penjualan'],0,',','.') }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 bg-success text-white h-100">
                <div class="card-body text-center">
                    <h1>🛒</h1>
                    <h6>Total Transaksi</h6>
                    <h3>{{ $ringkasan['total_transaksi'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 bg-warning text-dark h-100">
                <div class="card-body text-center">
                    <h1>💵</h1>
                    <h6>Pembayaran Cash</h6>
                    <h3>Rp {{ number_format($ringkasan['total_cash'],0,',','.') }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 bg-info text-white h-100">
                <div class="card-body text-center">
                    <h1>💳</h1>
                    <h6>Non Tunai</h6>
                    <h3>Rp {{ number_format($ringkasan['total_non_tunai'],0,',','.') }}</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Stok -->
    <div class="row">

        <div class="col-lg-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">
                        ⚠ Produk Stok Rendah
                    </h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($produkStokRendah as $index => $produk)

                                <tr>
                                    <td>{{ $produkStokRendah->firstItem()+$index }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            {{ $produk->stok }}
                                        </span>
                                    </td>
                                </tr>

                                @empty

                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        Semua stok aman
                                    </td>
                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    {{ $produkStokRendah->links() }}

                </div>

            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">
                        ❌ Produk Habis
                    </h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($produkStokHabis as $index => $produk)

                                <tr>

                                    <td>{{ $produkStokHabis->firstItem()+$index }}</td>

                                    <td>{{ $produk->nama }}</td>

                                    <td>
                                        <span class="badge bg-danger">
                                            {{ $produk->stok }}
                                        </span>
                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="3" class="text-center text-muted">
                                        Tidak ada produk habis.
                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    {{ $produkStokHabis->links() }}

                </div>

            </div>

        </div>

    </div>

    <!-- Best Seller -->

    <div class="card shadow border-0">

        <div class="card-header bg-success text-white">

            <h5 class="mb-0">
                🏆 Best Seller Products
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-striped table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Stok</th>
                            <th>Terjual</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($produkTerlaris as $index => $produk)

                        <tr>

                            <td>{{ $index+1 }}</td>

                            <td class="fw-semibold">
                                {{ $produk->nama }}
                            </td>

                            <td>{{ $produk->stok }}</td>

                            <td>
                                <span class="badge bg-success">
                                    {{ $produk->total_terjual }}
                                </span>
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center text-muted">
                                Belum ada data penjualan.
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection