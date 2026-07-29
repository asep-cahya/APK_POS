@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    <div class="text-center mb-4">
        <h1>
            Ringkasan Hari Ini
            <small class="text-muted">
                ({{ $tanggalHariIni->translatedFormat('l, d F Y') }})
            </small>
        </h1>
    </div>

    @can('viewAny', App\Models\User::class)

    <div class="row mb-4">
        <div class="col-md-12">
            <h3>Today's Sales</h3>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    Total Nilai Penjualan Hari Ini
                </div>
                <div class="card-body">
                    <h4>Rp {{ number_format($ringkasan['total_penjualan']) }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    Jumlah Transaksi Hari Ini
                </div>
                <div class="card-body">
                    <h4>{{ $ringkasan['total_transaksi'] }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <h3>Cash & Payment Status</h3>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    Total Pembayaran Tunai
                </div>
                <div class="card-body">
                    <h4>Rp {{ number_format($ringkasan['total_cash']) }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    Total Pembayaran Non Tunai
                </div>
                <div class="card-body">
                    <h4>Rp {{ number_format($ringkasan['total_non_tunai']) }}</h4>
                </div>
            </div>
        </div>
    </div>

    @endcan

    <div class="row mb-5">

        <div class="col-md-6">
            <h4>Daftar Produk Stok Rendah</h4>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($produkStokRendah as $index => $produk)
                    <tr>
                        <td>{{ $produkStokRendah->firstItem() + $index }}</td>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->stok }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Seluruh produk berada dalam kondisi stok aman.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $produkStokRendah->links() }}

        </div>

        <div class="col-md-6">

            <h4>Produk Habis Stok</h4>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($produkStokHabis as $index => $produk)
                    <tr>
                        <td>{{ $produkStokHabis->firstItem() + $index }}</td>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->stok }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Tidak ada produk yang habis.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $produkStokHabis->links() }}

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <h3>Best Seller Products</h3>

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Unit Terjual</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($produkTerlaris as $index => $produk)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td>{{ $produk->total_terjual }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Belum ada data penjualan.
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection