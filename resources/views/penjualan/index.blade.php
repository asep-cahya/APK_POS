@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')


<style>

/* ==================================================
   PENJUALAN
================================================== */

.penjualan-wrapper {

    margin-left: 250px;

    min-height: 100vh;

    background: #F3F4F6;

    padding: 40px;

}


/* ==================================================
   HEADER
================================================== */

.penjualan-header {

    margin-bottom: 32px;

}


.penjualan-title {

    color: #20242C;

    font-size: 27px;

    font-weight: 700;

    margin-bottom: 6px;

    letter-spacing: -0.5px;

}


.penjualan-subtitle {

    color: #8A929E;

    font-size: 13px;

}


/* ==================================================
   BUTTON TRANSAKSI
================================================== */

.btn-transaksi {

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


.btn-transaksi:hover {

    background: #303741;

    color: #FFFFFF;

    transform: translateY(-1px);

}


/* ==================================================
   ALERT
================================================== */

.penjualan-alert {

    border: none;

    border-radius: 10px;

    font-size: 13px;

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

.penjualan-card {

    background: #FFFFFF;

    border: 1px solid #E5E7EB;

    border-radius: 14px;

    overflow: hidden;

}


.penjualan-card-header {

    padding: 20px 22px;

    border-bottom: 1px solid #EEF0F2;

}


.penjualan-card-title {

    margin: 0;

    color: #20242C;

    font-size: 15px;

    font-weight: 700;

}


/* ==================================================
   TABLE
================================================== */

.penjualan-table {

    margin-bottom: 0;

}


.penjualan-table thead th {

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


.penjualan-table tbody td {

    padding: 14px 16px;

    color: #4B5563;

    border-color: #F0F1F3;

    font-size: 13px;

    vertical-align: middle;

}


.penjualan-table tbody tr {

    transition: background .2s ease;

}


.penjualan-table tbody tr:hover {

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
   TANGGAL
================================================== */

.tanggal {

    color: #4B5563;

    font-size: 12px;

    white-space: nowrap;

}


/* ==================================================
   KASIR
================================================== */

.kasir {

    color: #20242C;

    font-weight: 600;

}


/* ==================================================
   TOTAL
================================================== */

.total {

    color: #20242C;

    font-weight: 700;

    white-space: nowrap;

}


/* ==================================================
   METODE
================================================== */

.metode-badge {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 5px 10px;

    background: #F3F4F6;

    color: #374151;

    border: 1px solid #E5E7EB;

    border-radius: 7px;

    font-size: 11px;

    font-weight: 600;

    white-space: nowrap;

}


/* ==================================================
   STATUS
================================================== */

.status-badge {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 5px 10px;

    background: #ECFDF5;

    color: #047857;

    border: 1px solid #D1FAE5;

    border-radius: 7px;

    font-size: 11px;

    font-weight: 700;

    white-space: nowrap;

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

.penjualan-card-footer {

    padding: 15px 20px;

    background: #FFFFFF;

    border-top: 1px solid #EEF0F2;

}


/* ==================================================
   RESPONSIVE
================================================== */

@media (max-width: 992px) {

    .penjualan-wrapper {

        margin-left: 250px;

        padding: 30px;

    }

}


@media (max-width: 768px) {

    .penjualan-wrapper {

        margin-left: 220px;

        padding: 25px 18px;

    }

    .penjualan-title {

        font-size: 23px;

    }

}

</style>


<div class="penjualan-wrapper">


    <!-- ==================================================
         ALERT
    ================================================== -->

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show penjualan-alert mb-4">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    @if(session('errors'))

        <div class="alert alert-danger alert-dismissible fade show penjualan-alert mb-4">

            <i class="bi bi-exclamation-circle me-2"></i>

            {{ session('errors') }}

            <button
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif



    <!-- ==================================================
         HEADER
    ================================================== -->

    <div class="penjualan-header">

        <div class="d-flex justify-content-between align-items-center">

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



    <!-- ==================================================
         SEARCH
    ================================================== -->

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



    <!-- ==================================================
         TABLE
    ================================================== -->

    <div class="penjualan-card">


        <!-- Header -->

        <div class="penjualan-card-header">

            <h5 class="penjualan-card-title">

                Daftar Penjualan

            </h5>

        </div>



        <!-- Table -->

        <div class="table-responsive">

            <table class="table penjualan-table align-middle">

                <thead>

                    <tr>

                        <th
                            width="60"
                            class="text-center">

                            No

                        </th>

                        <th>

                            Tanggal

                        </th>

                        <th>

                            Kasir

                        </th>

                        <th>

                            Total

                        </th>

                        <th class="text-center">

                            Metode

                        </th>

                        <th class="text-center">

                            Status

                        </th>

                        <th
                            width="140"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody>


                @forelse($sales as $sale)


                <tr>


                    <!-- No -->

                    <td class="text-center nomor">

                        {{ $sales->firstItem() + $loop->index }}

                    </td>



                    <!-- Tanggal -->

                    <td>

                        <span class="tanggal">

                            {{ $sale->created_at->translatedFormat('d M Y H:i') }}

                        </span>

                    </td>



                    <!-- Kasir -->

                    <td>

                        <span class="kasir">

                            {{ $sale->user->name }}

                        </span>

                    </td>



                    <!-- Total -->

                    <td>

                        <span class="total">

                            Rp {{ number_format($sale->total_pembayaran,0,',','.') }}

                        </span>

                    </td>



                    <!-- Metode -->

                    <td class="text-center">

                        <span class="metode-badge">

                            {{ $sale->metode_pembayaran }}

                        </span>

                    </td>



                    <!-- Status -->

                    <td class="text-center">

                        <span class="status-badge">

                            {{ $sale->status }}

                        </span>

                    </td>



                    <!-- Aksi -->

                    <td class="text-center">

                        <div class="action-buttons">


                            <!-- Detail -->

                            <a
                                href="{{ route('penjualan.show',$sale) }}"
                                class="action-btn action-detail"
                                title="Lihat Detail">

                                <i class="bi bi-eye"></i>

                            </a>



                            <!-- Edit -->

                            @can('view', $sale)

                                <a
                                    href="{{ route('penjualan.edit',$sale) }}"
                                    class="action-btn action-edit"
                                    title="Edit Transaksi">

                                    <i class="bi bi-pencil"></i>

                                </a>

                            @endcan



                            <!-- Hapus -->

                            @can('delete', $sale)

                                <form
                                    action="{{ route('penjualan.destroy',$sale) }}"
                                    method="POST"
                                    class="d-inline">

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



        <!-- Pagination -->

        <div class="penjualan-card-footer">

            {{ $sales->links() }}

        </div>


    </div>


</div>


@endsection
