@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<style>
/* ==================================================
   PRODUK PAGE
================================================== */

.produk-wrapper {
    width: 100%;
    min-height: calc(100vh - 68px);
    background: #f4f5f7;
    padding: 28px 32px 40px;
}

/* ==================================================
   HEADER
================================================== */

.produk-header {
    margin-bottom: 18px;
}

.produk-header-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.produk-title {
    color: #20242c;
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 4px;
    letter-spacing: -0.4px;
}

.produk-subtitle {
    color: #8a929e;
    font-size: 12px;
}

/* ==================================================
   BUTTON TAMBAH
================================================== */

.btn-tambah {
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

.btn-tambah:hover {
    background: #10b981;
    color: #fff;
}

/* ==================================================
   SEARCH
================================================== */

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
    color: #9aa1ab;
}

.search-button {
    height: 40px;
    background: #20242c;
    color: #fff;
    border: 0;
    padding: 0 17px;
    border-radius: 0 8px 8px 0;
    font-size: 12px;
    font-weight: 600;
    transition: 0.2s;
}

.search-button:hover {
    background: #10b981;
    color: #fff;
}

/* ==================================================
   PRODUK CARD
================================================== */

.produk-card {
    width: 100%;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
}

/* ==================================================
   CARD HEADER
================================================== */

.produk-card-header {
    padding: 15px 18px;
    border-bottom: 1px solid #eef0f2;
}

.produk-card-title {
    margin: 0;
    color: #20242c;
    font-size: 14px;
    font-weight: 700;
}

/* ==================================================
   TABLE
================================================== */

.produk-table-wrapper {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.produk-table {
    width: 100%;
    min-width: 900px;
    margin: 0;
    table-layout: auto;
}

.produk-table thead th {
    background: #f8f9fa;
    color: #8a929e;
    border-bottom: 1px solid #e5e7eb;
    padding: 10px 12px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    white-space: nowrap;
}

.produk-table tbody td {
    padding: 11px 12px;
    color: #4b5563;
    border-color: #f0f1f3;
    font-size: 12px;
    vertical-align: middle;
    white-space: nowrap;
}

.produk-table tbody tr {
    transition: 0.2s;
}

.produk-table tbody tr:hover {
    background: #fafbfc;
}

/* ==================================================
   NOMOR
================================================== */

.nomor {
    color: #8a929e;
    font-size: 11px;
}

/* ==================================================
   USER
================================================== */

.user-name {
    color: #20242c;
    font-size: 12px;
    font-weight: 600;
}

.no-user {
    color: #9aa1ab;
    font-size: 11px;
}

/* ==================================================
   FOTO PRODUK
================================================== */

.product-image {
    width: 48px;
    height: 48px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}

.no-image {
    color: #9aa1ab;
    font-size: 11px;
}

/* ==================================================
   NAMA PRODUK
================================================== */

.product-name {
    color: #20242c;
    font-weight: 600;
}

/* ==================================================
   JENIS
================================================== */

.jenis-badge {
    display: inline-flex;
    align-items: center;
    padding: 4px 9px;
    background: #f3f4f6;
    color: #374151;
    border-radius: 6px;
    font-size: 10px;
    font-weight: 600;
    white-space: nowrap;
}

.no-jenis {
    color: #9aa1ab;
    font-size: 11px;
}

/* ==================================================
   HARGA
================================================== */

.harga {
    color: #4b5563;
    white-space: nowrap;
    font-size: 11px;
}

/* ==================================================
   STOK
================================================== */

.stock-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 34px;
    padding: 4px 9px;
    border-radius: 6px;
    background: #f3f4f6;
    color: #374151;
    font-size: 10px;
    font-weight: 600;
}

/* ==================================================
   ACTION
================================================== */

.action-buttons {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.action-buttons form {
    margin: 0;
}

.action-btn {
    width: 32px;
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
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

/* ==================================================
   EMPTY STATE
================================================== */

.empty-state {
    padding: 35px 20px !important;
    color: #9aa1ab !important;
    text-align: center;
    font-size: 12px !important;
}

/* ==================================================
   PAGINATION
================================================== */

.produk-card-footer {
    padding: 12px 18px;
    background: #fff;
    border-top: 1px solid #eef0f2;
}

.produk-card-footer .pagination {
    margin: 0;
}

/* ==================================================
   RESPONSIVE
================================================== */

@media (max-width: 768px) {

    .produk-wrapper {
        padding: 22px 16px 35px;
    }

    .produk-header-inner {
        align-items: flex-start;
        gap: 12px;
    }

    .produk-title {
        font-size: 21px;
    }

    .btn-tambah {
        padding: 9px 13px;
    }
}

@media (max-width: 550px) {

    .produk-header-inner {
        flex-direction: column;
    }

    .btn-tambah {
        width: 100%;
    }

    .search-card-body {
        padding: 12px;
    }
}
</style>

<div class="produk-wrapper">

    <!-- HEADER -->
    <div class="produk-header">

        <div class="produk-header-inner">

            <div>

                <h2 class="produk-title">
                    Manajemen Produk
                </h2>

                <p class="produk-subtitle mb-0">
                    Kelola seluruh data produk.
                </p>

            </div>

            <!-- TOMBOL TETAP DI KANAN -->
            <a
                href="{{ route('produk.create') }}"
                class="btn-tambah">

                <i class="bi bi-plus-lg"></i>

                Tambah Produk

            </a>

        </div>

    </div>


    <!-- SEARCH -->
    <div class="search-card">

        <div class="search-card-body">

            <form
                action="{{ route('produk.index') }}"
                method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control search-input"
                        placeholder="Cari nama produk...">

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
    <div class="produk-card">

        <!-- CARD HEADER -->
        <div class="produk-card-header">

            <h5 class="produk-card-title">
                Daftar Produk
            </h5>

        </div>


        <!-- TABLE -->
        <div class="produk-table-wrapper">

            <table class="table produk-table align-middle">

                <thead>

                    <tr>

                        <th
                            width="60"
                            class="text-center">

                            No

                        </th>

                        <th>
                            User
                        </th>

                        <th
                            class="text-center">

                            Foto

                        </th>

                        <th>
                            Nama Produk
                        </th>

                        <th>
                            Jenis
                        </th>

                        <th>
                            Harga Beli
                        </th>

                        <th>
                            Harga Jual
                        </th>

                        <th
                            class="text-center">

                            Stok

                        </th>

                        <th
                            width="130"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($products as $product)

                        <tr>

                            <!-- NO -->
                            <td
                                class="text-center nomor">

                                {{ $products->firstItem() + $loop->index }}

                            </td>


                            <!-- USER -->
                            <td>

                                @if($product->user)

                                    <span class="user-name">
                                        {{ $product->user->name }}
                                    </span>

                                @else

                                    <span class="no-user">
                                        Tidak diketahui
                                    </span>

                                @endif

                            </td>


                            <!-- FOTO -->
                            <td class="text-center">

                                @if($product->foto)

                                    <img
                                        src="{{ asset('storage/' . $product->foto) }}"
                                        class="product-image"
                                        alt="{{ $product->nama }}">

                                @else

                                    <span class="no-image">
                                        Tidak ada foto
                                    </span>

                                @endif

                            </td>


                            <!-- NAMA PRODUK -->
                            <td>

                                <span class="product-name">
                                    {{ $product->nama }}
                                </span>

                            </td>


                            <!-- JENIS -->
                            <td>

                                @if($product->jenis)

                                    <span class="jenis-badge">
                                        {{ $product->jenis->nama_jenis }}
                                    </span>

                                @else

                                    <span class="no-jenis">
                                        Belum ada jenis
                                    </span>

                                @endif

                            </td>


                            <!-- HARGA BELI -->
                            <td>

                                <span class="harga">

                                    Rp {{ number_format(
                                        $product->harga_beli,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            </td>


                            <!-- HARGA JUAL -->
                            <td>

                                <span class="harga">

                                    Rp {{ number_format(
                                        $product->harga_jual,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            </td>


                            <!-- STOK -->
                            <td class="text-center">

                                <span class="stock-badge">
                                    {{ $product->stok }}
                                </span>

                            </td>


                            <!-- AKSI -->
                            <td class="text-center">

                                <div class="action-buttons">

                                    <!-- DETAIL -->
                                    <a
                                        href="{{ route('produk.show', $product) }}"
                                        class="action-btn action-detail"
                                        title="Lihat Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    <!-- EDIT -->
                                    <a
                                        href="{{ route('produk.edit', $product) }}"
                                        class="action-btn action-edit"
                                        title="Edit Produk">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    <!-- HAPUS -->
                                    <form
                                        action="{{ route('produk.destroy', $product) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn action-delete"
                                            title="Hapus Produk"
                                            onclick="return confirm('Apakah yakin ingin menghapus produk ini?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="9"
                                class="empty-state">

                                Belum ada data produk.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- PAGINATION -->
        <div class="produk-card-footer">

            {{ $products->links() }}

        </div>

    </div>

</div>


<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

@endsection