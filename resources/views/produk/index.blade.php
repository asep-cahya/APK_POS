@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')


<style>

/* ==================================================
   PRODUK
================================================== */

.produk-wrapper {

    margin-left: 250px;

    min-height: 100vh;

    background: #F3F4F6;

    padding: 40px;

}


/* ==================================================
   HEADER
================================================== */

.produk-header {

    margin-bottom: 32px;

}


.produk-title {

    color: #20242C;

    font-size: 27px;

    font-weight: 700;

    margin-bottom: 6px;

    letter-spacing: -0.5px;

}


.produk-subtitle {

    color: #8A929E;

    font-size: 13px;

}


/* ==================================================
   BUTTON TAMBAH
================================================== */

.btn-tambah {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 10px 18px;

    background: #20242C;

    color: #FFFFFF;

    border: none;

    border-radius: 9px;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    transition: all .2s ease;

}


.btn-tambah:hover {

    background: #303741;

    color: #FFFFFF;

    transform: translateY(-1px);

}


/* ==================================================
   SEARCH
================================================== */

.search-card {

    background: #FFFFFF;

    border: 1px solid #E5E7EB;

    border-radius: 14px;

    margin-bottom: 20px;

}


.search-card-body {

    padding: 18px;

}


.search-input {

    height: 42px;

    border: 1px solid #E1E4E8;

    border-radius: 8px 0 0 8px;

    font-size: 13px;

    color: #374151;

    box-shadow: none !important;

}


.search-input:focus {

    border-color: #10B981;

}


.search-button {

    height: 42px;

    background: #20242C;

    color: #FFFFFF;

    border: none;

    padding: 0 20px;

    border-radius: 0 8px 8px 0;

    font-size: 13px;

    font-weight: 600;

}


.search-button:hover {

    background: #303741;

    color: #FFFFFF;

}


/* ==================================================
   TABLE CARD
================================================== */

.produk-card {

    background: #FFFFFF;

    border: 1px solid #E5E7EB;

    border-radius: 14px;

    overflow: hidden;

}


.produk-card-header {

    padding: 20px 22px;

    border-bottom: 1px solid #EEF0F2;

}


.produk-card-title {

    margin: 0;

    color: #20242C;

    font-size: 15px;

    font-weight: 700;

}


/* ==================================================
   TABLE
================================================== */

.produk-table {

    margin-bottom: 0;

}


.produk-table thead th {

    background: #F8F9FA;

    color: #8A929E;

    border-bottom: 1px solid #E5E7EB;

    padding: 13px 16px;

    font-size: 10px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .5px;

    white-space: nowrap;

}


.produk-table tbody td {

    padding: 14px 16px;

    color: #4B5563;

    border-color: #F0F1F3;

    font-size: 13px;

    vertical-align: middle;

}


.produk-table tbody tr {

    transition: background .2s ease;

}


.produk-table tbody tr:hover {

    background: #FAFBFC;

}


/* ==================================================
   NOMOR
================================================== */

.nomor {

    color: #8A929E;

    font-size: 12px;

}


/* ==================================================
   USER
================================================== */

.user-name {

    color: #20242C;

    font-weight: 600;

    font-size: 12px;

}


/* ==================================================
   FOTO
================================================== */

.product-image {

    width: 55px;

    height: 55px;

    object-fit: cover;

    border-radius: 9px;

    border: 1px solid #E5E7EB;

}


.no-image {

    color: #9AA1AB;

    font-size: 11px;

}


/* ==================================================
   NAMA PRODUK
================================================== */

.product-name {

    color: #20242C;

    font-weight: 600;

}


/* ==================================================
   JENIS
================================================== */

.jenis-badge {

    display: inline-flex;

    align-items: center;

    padding: 5px 10px;

    background: #F3F4F6;

    color: #374151;

    border-radius: 7px;

    font-size: 11px;

    font-weight: 600;

    white-space: nowrap;

}


.no-jenis {

    color: #9AA1AB;

    font-size: 11px;

}


/* ==================================================
   HARGA
================================================== */

.harga {

    color: #4B5563;

    white-space: nowrap;

    font-size: 12px;

}


/* ==================================================
   STOK
================================================== */

.stock-badge {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    min-width: 38px;

    padding: 5px 10px;

    border-radius: 7px;

    background: #F3F4F6;

    color: #374151;

    font-size: 11px;

    font-weight: 600;

}


/* ==================================================
   ACTION BUTTON
================================================== */

.action-buttons {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 6px;

}


.action-btn {

    width: 34px;

    height: 34px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    border-radius: 8px;

    border: 1px solid transparent;

    text-decoration: none;

    font-size: 14px;

    transition: all .2s ease;

    cursor: pointer;

}


/* Detail */

.action-detail {

    background: #F3F4F6;

    color: #4B5563;

    border-color: #E5E7EB;

}


.action-detail:hover {

    background: #E5E7EB;

    color: #20242C;

}


/* Edit */

.action-edit {

    background: #ECFDF5;

    color: #047857;

    border-color: #D1FAE5;

}


.action-edit:hover {

    background: #D1FAE5;

    color: #065F46;

}


/* Hapus */

.action-delete {

    background: #FEF2F2;

    color: #B91C1C;

    border-color: #FECACA;

}


.action-delete:hover {

    background: #FEE2E2;

    color: #991B1B;

}


/* ==================================================
   EMPTY
================================================== */

.empty-state {

    padding: 45px 20px !important;

    color: #9AA1AB !important;

    text-align: center;

    font-size: 12px !important;

}


/* ==================================================
   PAGINATION
================================================== */

.produk-card-footer {

    padding: 15px 20px;

    background: #FFFFFF;

    border-top: 1px solid #EEF0F2;

}


/* ==================================================
   RESPONSIVE
================================================== */

@media (max-width: 992px) {

    .produk-wrapper {

        margin-left: 250px;

        padding: 30px;

    }

}


@media (max-width: 768px) {

    .produk-wrapper {

        margin-left: 220px;

        padding: 25px 18px;

    }

    .produk-title {

        font-size: 23px;

    }

}

</style>


<div class="produk-wrapper">


    <!-- ==================================================
         HEADER
    ================================================== -->

    <div class="produk-header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h2 class="produk-title">

                    Manajemen Produk

                </h2>

                <p class="produk-subtitle mb-0">

                    Kelola seluruh data produk.

                </p>

            </div>


            <a href="{{ route('produk.create') }}"
               class="btn-tambah">

                <i class="bi bi-plus-lg"></i>

                Tambah Produk

            </a>

        </div>

    </div>



    <!-- ==================================================
         SEARCH
    ================================================== -->

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



    <!-- ==================================================
         TABLE
    ================================================== -->

    <div class="produk-card">


        <!-- Header -->

        <div class="produk-card-header">

            <h5 class="produk-card-title">

                Daftar Produk

            </h5>

        </div>



        <!-- Table -->

        <div class="table-responsive">

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
                            width="140"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>



                <tbody>


                @forelse($products as $product)


                <tr>


                    <!-- No -->

                    <td class="text-center nomor">

                        {{ $products->firstItem() + $loop->index }}

                    </td>



                    <!-- User -->

                    <td>

                        @if($product->user)

                            <span class="user-name">

                                {{ $product->user->name }}

                            </span>

                        @else

                            <span class="no-image">

                                Tidak diketahui

                            </span>

                        @endif

                    </td>



                    <!-- Foto -->

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



                    <!-- Nama Produk -->

                    <td>

                        <span class="product-name">

                            {{ $product->nama }}

                        </span>

                    </td>



                    <!-- Jenis -->

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



                    <!-- Harga Beli -->

                    <td>

                        <span class="harga">

                            Rp {{ number_format($product->harga_beli, 0, ',', '.') }}

                        </span>

                    </td>



                    <!-- Harga Jual -->

                    <td>

                        <span class="harga">

                            Rp {{ number_format($product->harga_jual, 0, ',', '.') }}

                        </span>

                    </td>



                    <!-- Stok -->

                    <td class="text-center">

                        <span class="stock-badge">

                            {{ $product->stok }}

                        </span>

                    </td>



                    <!-- Aksi -->

                    <td class="text-center">

                        <div class="action-buttons">


                            <!-- Detail -->

                            <a
                                href="{{ route('produk.show', $product) }}"
                                class="action-btn action-detail"
                                title="Lihat Detail">

                                <i class="bi bi-eye"></i>

                            </a>



                            <!-- Edit -->

                            <a
                                href="{{ route('produk.edit', $product) }}"
                                class="action-btn action-edit"
                                title="Edit Produk">

                                <i class="bi bi-pencil"></i>

                            </a>



                            <!-- Hapus -->

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



        <!-- Pagination -->

        <div class="produk-card-footer">

            {{ $products->links() }}

        </div>


    </div>


</div>


@endsection
