@extends('layouts.app')
@section('title', 'Penjualan')
@section('content')
@include('layouts.navbar')
<style>
.penjualan-wrapper {
    min-height: calc(100vh - 70px);
    background: #F3F4F6;
    padding: 30px;
    box-sizing: border-box;
}
.penjualan-header {
    margin-bottom: 24px;
}
.penjualan-title {
    color: #20242C;
    font-size: 27px;
    font-weight: 700;
    margin: 0 0 5px;
    letter-spacing: -0.5px;
}
.penjualan-subtitle {
    color: #8A929E;
    font-size: 13px;
    margin: 0;
}
.btn-transaksi {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 10px 16px;
    background: #20242C;
    color: #FFFFFF;
    border: 1px solid #20242C;
    border-radius: 8px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    transition: all .2s ease;
    white-space: nowrap;
}
.btn-transaksi:hover {
    background: #303741;
    border-color: #303741;
    color: #FFFFFF;
    transform: translateY(-1px);
}
.penjualan-alert {
    border: none;
    border-radius: 9px;
    font-size: 12px;
}
.search-card {
    width: 100%;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 13px;
    margin-bottom: 20px;
}
.search-card-body {
    padding: 17px;
}
.search-card .input-group {
    width: 100%;
}
.search-input {
    height: 40px;
    flex: 1 1 auto;
    min-width: 0;
    border: 1px solid #E1E4E8;
    border-radius: 8px 0 0 8px;
    font-size: 12px;
    color: #374151;
    box-shadow: none !important;
}
.search-input:focus {
    border-color: #10B981;
}
.search-input::placeholder {
    color: #A8AFB9;
}
.search-button {
    height: 40px;
    min-width: 58px;
    background: #20242C;
    color: #FFFFFF;
    border: 1px solid #20242C;
    padding: 0 18px;
    border-radius: 0 8px 8px 0;
    font-size: 12px;
    font-weight: 600;
}
.search-button:hover {
    background: #303741;
    border-color: #303741;
    color: #FFFFFF;
}
.penjualan-card {
    width: 100%;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 13px;
    overflow: hidden;
}
.penjualan-card-header {
    padding: 18px 21px;
    border-bottom: 1px solid #EEF0F2;
}
.penjualan-card-title {
    margin: 0;
    color: #20242C;
    font-size: 14px;
    font-weight: 700;
}
.penjualan-card-description {
    margin: 3px 0 0;
    color: #8A929E;
    font-size: 11px;
}
.penjualan-table {
    width: 100%;
    margin-bottom: 0;
}
.penjualan-table thead th {
    background: #F8F9FA;
    color: #8A929E;
    border-bottom: 1px solid #E5E7EB;
    padding: 12px 15px;
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .5px;
    white-space: nowrap;
}
.penjualan-table tbody td {
    padding: 13px 15px;
    color: #4B5563;
    border-color: #F0F1F3;
    font-size: 12px;
    vertical-align: middle;
}
.penjualan-table tbody tr {
    transition: background .15s ease;
}
.penjualan-table tbody tr:hover {
    background: #FAFBFC;
}
.nomor {
    color: #8A929E;
    font-size: 11px;
}
.tanggal {
    color: #4B5563;
    font-size: 11px;
    white-space: nowrap;
}
.kasir {
    color: #20242C;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
}
.total {
    color: #20242C;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
}
.metode-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 4px 9px;
    background: #F3F4F6;
    color: #374151;
    border: 1px solid #E5E7EB;
    border-radius: 7px;
    font-size: 10px;
    font-weight: 600;
    white-space: nowrap;
}
.status-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 4px 9px;
    background: #ECFDF5;
    color: #047857;
    border: 1px solid #D1FAE5;
    border-radius: 7px;
    font-size: 10px;
    font-weight: 700;
    white-space: nowrap;
}
.action-buttons {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}
.action-btn {
    width: 33px;
    height: 33px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    border: 1px solid transparent;
    text-decoration: none;
    font-size: 13px;
    transition: all .2s ease;
    cursor: pointer;
}
.action-detail {
    background: #F3F4F6;
    color: #4B5563;
    border-color: #E5E7EB;
}
.action-detail:hover {
    background: #E5E7EB;
    color: #20242C;
}
.action-edit {
    background: #ECFDF5;
    color: #047857;
    border-color: #D1FAE5;
}
.action-edit:hover {
    background: #D1FAE5;
    color: #065F46;
}
.action-delete {
    background: #FEF2F2;
    color: #B91C1C;
    border-color: #FECACA;
}
.action-delete:hover {
    background: #FEE2E2;
    color: #991B1B;
}
.empty-state {
    padding: 45px 20px !important;
    color: #9AA1AB !important;
    text-align: center;
    font-size: 12px !important;
}
.penjualan-card-footer {
    padding: 14px 20px;
    background: #FFFFFF;
    border-top: 1px solid #EEF0F2;
}
.penjualan-card-footer .pagination {
    margin: 0;
}
@media (max-width: 768px) {
    .penjualan-wrapper {
        padding: 20px 15px;
    }
    .penjualan-header .d-flex {
        align-items: flex-start !important;
        gap: 15px;
    }
    .penjualan-title {
        font-size: 23px;
    }
    .btn-transaksi {
        padding: 9px 13px;
        font-size: 11px;
    }
    .penjualan-card-header {
        padding: 16px;
    }
    .penjualan-table thead th {
        padding: 11px 12px;
    }
    .penjualan-table tbody td {
        padding: 12px;
    }
}
</style>
<div class="penjualan-wrapper">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show penjualan-alert mb-4">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show penjualan-alert mb-4">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('errors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <div class="penjualan-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="penjualan-title">Manajemen Penjualan</h2>
                <p class="penjualan-subtitle">Kelola seluruh transaksi penjualan.</p>
            </div>
            <a href="{{ route('penjualan.create') }}" class="btn-transaksi">
                <i class="bi bi-plus-lg"></i>
                Buat Transaksi
            </a>
        </div>
    </div>
    <div class="search-card">
        <div class="search-card-body">
            <form action="{{ route('penjualan.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control search-input" placeholder="Cari nama kasir...">
                    <button type="submit" class="search-button">
                        <i class="bi bi-search me-1"></i>
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="penjualan-card">
        <div class="penjualan-card-header">
            <h5 class="penjualan-card-title">Daftar Penjualan</h5>
            <p class="penjualan-card-description">Data transaksi penjualan yang tersimpan dalam sistem.</p>
        </div>
        <div class="table-responsive">
            <table class="table penjualan-table align-middle">
                <thead>
                    <tr>
                        <th width="60" class="text-center">No</th>
                        <th>Tanggal</th>
                        <th>Kasir</th>
                        <th>Total</th>
                        <th class="text-center">Metode</th>
                        <th class="text-center">Status</th>
                        <th width="120" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td class="text-center nomor">
                            {{ $sales->firstItem() + $loop->index }}
                        </td>
                        <td>
                            <span class="tanggal">
                                {{ $sale->created_at->translatedFormat('d M Y H:i') }}
                            </span>
                        </td>
                        <td>
                            <span class="kasir">
                                {{ $sale->user->name }}
                            </span>
                        </td>
                        <td>
                            <span class="total">
                                Rp {{ number_format($sale->total_pembayaran,0,',','.') }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="metode-badge">
                                @if($sale->metode_pembayaran === 'QRIS')
                                    <i class="bi bi-credit-card"></i>
                                @elseif($sale->metode_pembayaran === 'CASH')
                                    <i class="bi bi-cash"></i>
                                @else
                                    <i class="bi bi-wallet2"></i>
                                @endif
                                {{ $sale->metode_pembayaran }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="status-badge">
                                <i class="bi bi-check-circle"></i>
                                {{ $sale->status }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="action-buttons">
                                <a href="{{ route('penjualan.show',$sale) }}" class="action-btn action-detail" title="Lihat Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @can('view', $sale)
                                    <a href="{{ route('penjualan.edit',$sale) }}" class="action-btn action-edit" title="Edit Transaksi">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @endcan
                                @can('delete', $sale)
                                    <form action="{{ route('penjualan.destroy',$sale) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn action-delete" title="Hapus Transaksi" onclick="return confirm('Apakah yakin ingin menghapus transaksi ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-state">
                            <i class="bi bi-receipt fs-4 d-block mb-2"></i>
                            Belum ada data penjualan.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($sales->hasPages())
            <div class="penjualan-card-footer">
                {{ $sales->links() }}
            </div>
        @endif
    </div>
</div>
@endsection