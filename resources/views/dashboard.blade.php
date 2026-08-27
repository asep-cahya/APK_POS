@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
@include('layouts.navbar')

<style>
/* ==================================================
   DASHBOARD
================================================== */
.dashboard-wrapper {
    width: 100%;
    min-height: 100vh;
    background: #F3F4F6;
    padding: 30px 35px;
    box-sizing: border-box;
}
/* ==================================================
   HEADER
================================================== */
.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 24px;
}
.dashboard-title {
    color: #20242C;
    font-size: 25px;
    font-weight: 700;
    margin: 0 0 5px;
    letter-spacing: -0.5px;
}
.dashboard-date {
    color: #8A929E;
    font-size: 12px;
    margin: 0;
}
/* ==================================================
   STATISTIK
================================================== */
.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 12px;
    margin-bottom: 16px;
}
.stat-card {
    position: relative;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 12px;
    min-height: 105px;
    padding: 17px 18px;
    transition: .2s ease;
}
.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,.06);
}
.stat-label {
    color: #8A929E;
    font-size: 11px;
    margin-bottom: 7px;
    padding-right: 45px;
}
.stat-value {
    color: #20242C;
    font-size: 18px;
    font-weight: 700;
    white-space: nowrap;
}
.stat-value.green {
    color: #10B981;
}
/* ==================================================
   ICON STATISTIK
================================================== */
.stat-icon {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 33px;
    height: 33px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #F1F3F5;
    color: #59616D;
    font-size: 14px;
}
.stat-icon.green {
    background: #ECFDF5;
    color: #10B981;
}
/* ==================================================
   STOCK ROW
================================================== */
.dashboard-stock {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px;
    margin-bottom: 16px;
}
/* ==================================================
   CARD
================================================== */
.dashboard-card {
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 12px;
    overflow: hidden;
    height: 100%;
}
.dashboard-card-header {
    padding: 15px 18px;
    border-bottom: 1px solid #EEF0F2;
}
.dashboard-card-title {
    margin: 0;
    color: #20242C;
    font-size: 14px;
    font-weight: 700;
}
/* ==================================================
   TABLE
================================================== */
.dashboard-table {
    width: 100%;
    margin-bottom: 0;
    text-align: center;
}
.dashboard-table thead th {
    background: #F8F9FA;
    color: #8A929E;
    border-bottom: 1px solid #E5E7EB;
    padding: 10px 15px;
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .5px;
    white-space: nowrap;
    text-align: center;
}
.dashboard-table tbody td {
    padding: 11px 15px;
    color: #4B5563;
    border-color: #F0F1F3;
    font-size: 12px;
    vertical-align: middle;
    text-align: center;
}
.dashboard-table tbody tr:hover {
    background: #FAFBFC;
}
.product-name {
    color: #20242C;
    font-weight: 600;
    text-align: center;
}
/* ==================================================
   BADGE STOK
================================================== */
.stock-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 32px;
    padding: 4px 8px;
    border-radius: 6px;
    background: #F3F4F6;
    color: #374151;
    font-size: 10px;
    font-weight: 600;
}
/* ==================================================
   BADGE TERJUAL
================================================== */
.sold-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 35px;
    padding: 4px 9px;
    border-radius: 6px;
    background: #ECFDF5;
    color: #047857;
    font-size: 10px;
    font-weight: 700;
}
/* ==================================================
   EMPTY
================================================== */
.empty-state {
    padding: 28px 15px !important;
    color: #9AA1AB !important;
    text-align: center !important;
    font-size: 11px !important;
}
/* ==================================================
   PAGINATION
================================================== */
.dashboard-card .pagination {
    margin: 0;
    padding: 9px 15px;
}
/* ==================================================
   RESPONSIVE
================================================== */
@media (max-width: 1000px) {
    .dashboard-stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
@media (max-width: 768px) {
    .dashboard-wrapper {
        padding: 22px 16px;
    }
    .dashboard-title {
        font-size: 22px;
    }
    .dashboard-stats,
    .dashboard-stock {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="dashboard-wrapper">
    <!-- HEADER -->
    <div class="dashboard-header">
        <div>
            <h2 class="dashboard-title">Dashboard POS</h2>
            <p class="dashboard-date">{{ $tanggalHariIni->translatedFormat('l, d F Y') }}</p>
        </div>
    </div>

    <!-- STATISTIK -->
    <div class="dashboard-stats">
        <!-- Total Penjualan -->
        <div class="stat-card">
            <div class="stat-icon green">
                <i class="bi bi-cash-stack"></i>
            </div>
            <div class="stat-label">Total Penjualan</div>
            <div class="stat-value green">
                Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }}
            </div>
        </div>

        <!-- Total Transaksi -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-receipt"></i>
            </div>
            <div class="stat-label">Total Transaksi</div>
            <div class="stat-value">
                {{ $ringkasan['total_transaksi'] }}
            </div>
        </div>

        <!-- Pembayaran Cash -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-wallet2"></i>
            </div>
            <div class="stat-label">Pembayaran Cash</div>
            <div class="stat-value">
                Rp {{ number_format($ringkasan['total_cash'], 0, ',', '.') }}
            </div>
        </div>

        <!-- Pembayaran Non Tunai -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-credit-card"></i>
            </div>
            <div class="stat-label">Pembayaran Non Tunai</div>
            <div class="stat-value">
                Rp {{ number_format($ringkasan['total_non_tunai'], 0, ',', '.') }}
            </div>
        </div>
    </div>

    <!-- STOK TERENDAH DAN STOK HABIS -->
    <div class="dashboard-stock">
        <!-- Produk Stok Terendah -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h5 class="dashboard-card-title">Produk Stok Terendah</h5>
            </div>
            <div class="table-responsive">
                <table class="table dashboard-table align-middle">
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
                                <td>{{ $produkStokRendah->firstItem() + $index }}</td>
                                <td class="product-name">{{ $produk->nama }}</td>
                                <td>
                                    <span class="stock-badge">{{ $produk->stok }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty-state">
                                    Tidak ada produk dengan stok rendah.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $produkStokRendah->links() }}
        </div>

        <!-- Produk Stok Habis -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h5 class="dashboard-card-title">Produk Stok Habis</h5>
            </div>
            <div class="table-responsive">
                <table class="table dashboard-table align-middle">
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
                                <td>{{ $produkStokHabis->firstItem() + $index }}</td>
                                <td class="product-name">{{ $produk->nama }}</td>
                                <td>
                                    <span class="stock-badge">{{ $produk->stok }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty-state">
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

    <!-- PRODUK TERLARIS -->
    <div class="dashboard-card">
        <div class="dashboard-card-header">
            <h5 class="dashboard-card-title">Produk Terlaris</h5>
        </div>
        <div class="table-responsive">
            <table class="table dashboard-table align-middle">
                <thead>
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
                            <td>{{ $index + 1 }}</td>
                            <td class="product-name">{{ $produk->nama }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>
                                <span class="sold-badge">{{ $produk->total_terjual }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty-state">
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