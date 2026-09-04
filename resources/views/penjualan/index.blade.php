@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

<style>
.penjualan-wrapper {
    width: 100%;
    min-height: calc(100vh - 68px);
    background: #f4f5f7;
    padding: 28px 32px 40px;
}

.penjualan-header {
    margin-bottom: 18px;
}

.penjualan-header-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.penjualan-title {
    color: #20242c;
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 4px;
    letter-spacing: -0.4px;
}

.penjualan-subtitle {
    color: #8a929e;
    font-size: 12px;
}

/* BUTTON */

.btn-transaksi {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 9px 15px;
    background: #20242c;
    color: #fff;
    border: 0;
    border-radius: 8px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    transition: 0.2s;
}

.btn-transaksi:hover {
    background: #10b981;
    color: #fff;
}

/* ALERT */

.alert-custom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 12px 15px;
    margin-bottom: 18px;
    border-radius: 9px;
    font-size: 12px;
}

.alert-success-custom {
    background: #ecfdf5;
    color: #047857;
    border: 1px solid #d1fae5;
}

.alert-danger-custom {
    background: #fef2f2;
    color: #b91c1c;
    border: 1px solid #fecaca;
}

.alert-custom > div {
    display: flex;
    align-items: center;
    gap: 8px;
}

/* SEARCH */

.search-card {
    width: 100%;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    margin-bottom: 18px;
}

.search-card-body {
    padding: 14px;
}

.search-input {
    height: 40px;
    border: 1px solid #e1e4e8;
    border-radius: 8px 0 0 8px;
    font-size: 12px;
    color: #374151;
    box-shadow: none !important;
}

.search-input:focus {
    border-color: #10b981;
}

.search-input::placeholder {
    color: #a8afb9;
}

.search-button {
    height: 40px;
    background: #20242c;
    color: #fff;
    border: 1px solid #20242c;
    padding: 0 17px;
    border-radius: 0 8px 8px 0;
    font-size: 12px;
    font-weight: 600;
}

.search-button:hover {
    background: #10b981;
    border-color: #10b981;
    color: #fff;
}

/* CARD */

.penjualan-card {
    width: 100%;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
}

.penjualan-card-header {
    padding: 15px 18px;
    border-bottom: 1px solid #eef0f2;
}

.penjualan-card-title {
    margin: 0;
    color: #20242c;
    font-size: 14px;
    font-weight: 700;
}

.penjualan-card-description {
    margin: 4px 0 0;
    color: #8a929e;
    font-size: 11px;
}

/* TABLE */

.penjualan-table-wrapper {
    width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
}

.penjualan-table {
    width: 100%;
    min-width: 850px;
    margin: 0;
    table-layout: auto;
    white-space: nowrap;
}

.penjualan-table thead th {
    background: #f8f9fa;
    color: #8a929e;
    border-bottom: 1px solid #e5e7eb;
    padding: 10px 12px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    white-space: nowrap;
    vertical-align: middle;
    text-align: center;
}

.penjualan-table tbody td {
    padding: 11px 12px;
    color: #4b5563;
    border-color: #f0f1f3;
    font-size: 12px;
    vertical-align: middle;
    white-space: nowrap;
    height: 58px;
    text-align: center;
}

.penjualan-table tbody tr {
    transition: 0.2s;
    white-space: nowrap;
}

.penjualan-table tbody tr:hover {
    background: #fafbfc;
}

/* NOMOR */

.nomor {
    width: 60px;
    color: #8a929e;
    font-size: 11px;
    white-space: nowrap;
    text-align: center;
}

/* TANGGAL */

.tanggal {
    display: inline-block;
    color: #4b5563;
    font-size: 11px;
    white-space: nowrap;
    text-align: center;
}

/* KASIR */

.kasir {
    display: inline-block;
    color: #20242c;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    text-align: center;
}

/* TOTAL */

.total {
    display: inline-block;
    color: #20242c;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
    text-align: center;
}

/* METODE */

.metode-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 4px 9px;
    background: #f3f4f6;
    color: #374151;
    border: 1px solid #e5e7eb;
    border-radius: 7px;
    font-size: 10px;
    font-weight: 600;
    white-space: nowrap;
}

/* STATUS */

.status-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 4px 9px;
    background: #ecfdf5;
    color: #047857;
    border: 1px solid #d1fae5;
    border-radius: 7px;
    font-size: 10px;
    font-weight: 700;
    white-space: nowrap;
}

/* ACTION */

.action-buttons {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    white-space: nowrap;
}

.action-buttons form {
    display: inline-flex;
    margin: 0;
}

.action-btn {
    width: 32px;
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 7px;
    border: 1px solid transparent;
    text-decoration: none;
    font-size: 13px;
    transition: 0.2s;
    cursor: pointer;
}

/* DETAIL */

.action-detail {
    background: #f3f4f6;
    color: #4b5563;
    border-color: #e5e7eb;
}

.action-detail:hover {
    background: #e5e7eb;
    color: #20242c;
}

/* EDIT */

.action-edit {
    background: #ecfdf5;
    color: #047857;
    border-color: #d1fae5;
}

.action-edit:hover {
    background: #d1fae5;
    color: #065f46;
}

/* DELETE */

.action-delete {
    background: #fef2f2;
    color: #b91c1c;
    border-color: #fecaca;
}

.action-delete:hover {
    background: #fee2e2;
    color: #991b1b;
}

/* EMPTY */

.empty-state {
    padding: 35px 20px !important;
    color: #9aa1ab !important;
    text-align: center !important;
    font-size: 12px !important;
    white-space: normal !important;
}

/* FOOTER */

.penjualan-card-footer {
    padding: 12px 18px;
    background: #fff;
    border-top: 1px solid #eef0f2;
}

.penjualan-card-footer .pagination {
    margin: 0;
}

/* RESPONSIVE */

@media (max-width: 768px) {

    .penjualan-wrapper {
        padding: 22px 16px 35px;
    }

    .penjualan-header-inner {
        align-items: flex-start;
        gap: 12px;
    }

    .penjualan-title {
        font-size: 21px;
    }

    .btn-transaksi {
        padding: 9px 13px;
    }

    .penjualan-card-header {
        padding: 15px 16px;
    }

    .penjualan-table {
        min-width: 850px;
    }
}

@media (max-width: 550px) {

    .penjualan-header-inner {
        flex-direction: column;
    }

    .btn-transaksi {
        width: 100%;
    }

    .search-card-body {
        padding: 12px;
    }
}
</style>

<div class="penjualan-wrapper">

    @if(session('success'))
        <div class="alert-custom alert-success-custom">
            <div>
                <i class="bi bi-check-circle-fill"></i>
                <span>{{ session('success') }}</span>
            </div>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if(session('errors'))
        <div class="alert-custom alert-danger-custom">
            <div>
                <i class="bi bi-exclamation-circle-fill"></i>
                <span>{{ session('errors') }}</span>
            </div>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <!-- HEADER -->

    <div class="penjualan-header">

        <div class="penjualan-header-inner">

            <div>
                <h2 class="penjualan-title">
                    Manajemen Penjualan
                </h2>

                <p class="penjualan-subtitle mb-0">
                    Kelola seluruh transaksi penjualan.
                </p>
            </div>

            <a
                href="{{ route('penjualan.create') }}"
                class="btn-transaksi">

                <i class="bi bi-plus-lg"></i>
                Buat Transaksi

            </a>

        </div>

    </div>

    <!-- SEARCH -->

    <div class="search-card">

        <div class="search-card-body">

            <form
                action="{{ route('penjualan.index') }}"
                method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control search-input"
                        placeholder="Cari nama kasir...">

                    <button
                        type="submit"
                        class="search-button">

                        <i class="bi bi-search me-1"></i>
                        Cari

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- TABLE CARD -->

    <div class="penjualan-card">

        <div class="penjualan-card-header">

            <h5 class="penjualan-card-title">
                Daftar Penjualan
            </h5>

            <p class="penjualan-card-description">
                Data transaksi penjualan yang tersimpan dalam sistem.
            </p>

        </div>

        <div class="penjualan-table-wrapper">

            <table class="table penjualan-table align-middle">

                <thead>

                    <tr>

                        <th
                            width="60"
                            class="text-center">
                            No
                        </th>

                        <th class="text-center">
                            Tanggal
                        </th>

                        <th class="text-center">
                            Kasir
                        </th>

                        <th class="text-center">
                            Total
                        </th>

                        <th
                            width="130"
                            class="text-center">
                            Metode
                        </th>

                        <th
                            width="130"
                            class="text-center">
                            Status
                        </th>

                        <th
                            width="120"
                            class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($sales as $sale)

                        <tr>

                            <!-- NO -->

                            <td class="text-center nomor">
                                {{ $sales->firstItem() + $loop->index }}
                            </td>

                            <!-- TANGGAL -->

                            <td class="text-center">

                                <span class="tanggal">
                                    {{ $sale->created_at->translatedFormat('d M Y H:i') }}
                                </span>

                            </td>

                            <!-- KASIR -->

                            <td class="text-center">

                                <span class="kasir">
                                    {{ $sale->user->name }}
                                </span>

                            </td>

                            <!-- TOTAL -->

                            <td class="text-center">

                                <span class="total">
                                    Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                                </span>

                            </td>

                            <!-- METODE -->

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

                            <!-- STATUS -->

                            <td class="text-center">

                                <span class="status-badge">

                                    <i class="bi bi-check-circle"></i>

                                    {{ $sale->status }}

                                </span>

                            </td>

                            <!-- AKSI -->

                            <td class="text-center">

                                <div class="action-buttons">

                                    <!-- DETAIL -->

                                    <a
                                        href="{{ route('penjualan.show', $sale) }}"
                                        class="action-btn action-detail"
                                        title="Lihat Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                    <!-- EDIT -->

                                    @can('update', $sale)

                                        <a
                                            href="{{ route('penjualan.edit', $sale) }}"
                                            class="action-btn action-edit"
                                            title="Edit Transaksi">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                    @endcan

                                    <!-- HAPUS -->

                                    @can('delete', $sale)

                                        <form
                                            action="{{ route('penjualan.destroy', $sale) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn action-delete"
                                                title="Hapus Transaksi"
                                                onclick="return confirm('Apakah yakin ingin menghapus transaksi ini?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    @endcan

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="empty-state">

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

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

@endsection
