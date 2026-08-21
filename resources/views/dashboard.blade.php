@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('layouts.navbar')


<style>

/* ==================================================
   DASHBOARD
================================================== */

.dashboard-wrapper {

    margin-left: 250px;

    min-height: 100vh;

    background: #F3F4F6;

    padding: 40px;

}


/* ==================================================
   HEADER
================================================== */

.dashboard-header {

    margin-bottom: 32px;

}

.dashboard-title {

    color: #20242C;

    font-size: 27px;

    font-weight: 700;

    margin-bottom: 6px;

    letter-spacing: -0.5px;

}

.dashboard-date {

    color: #8A929E;

    font-size: 13px;

}


/* ==================================================
   STATISTIK
================================================== */

.stat-card {

    position: relative;

    background: #FFFFFF;

    border: 1px solid #E5E7EB;

    border-radius: 14px;

    min-height: 130px;

    padding: 22px;

    transition: .2s ease;

}

.stat-card:hover {

    transform: translateY(-2px);

    box-shadow: 0 8px 20px rgba(0,0,0,.06);

}


.stat-label {

    color: #8A929E;

    font-size: 12px;

    margin-bottom: 9px;

}


.stat-value {

    color: #20242C;

    font-size: 21px;

    font-weight: 700;

}

.stat-value.green {

    color: #10B981;

}


/* ==================================================
   ICON STATISTIK
================================================== */

.stat-icon {

    position: absolute;

    top: 20px;

    right: 20px;

    width: 38px;

    height: 38px;

    border-radius: 10px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #F1F3F5;

    color: #59616D;

    font-size: 16px;

}


.stat-icon.green {

    background: #ECFDF5;

    color: #10B981;

}


/* ==================================================
   SECTION CARD
================================================== */

.dashboard-card {

    background: #FFFFFF;

    border: 1px solid #E5E7EB;

    border-radius: 14px;

    overflow: hidden;

    height: 100%;

}


.dashboard-card-header {

    padding: 20px 22px;

    border-bottom: 1px solid #EEF0F2;

}


.dashboard-card-title {

    margin: 0;

    color: #20242C;

    font-size: 15px;

    font-weight: 700;

}


/* ==================================================
   TABLE
================================================== */

.dashboard-table {

    margin-bottom: 0;

}


.dashboard-table thead th {

    background: #F8F9FA;

    color: #8A929E;

    border-bottom: 1px solid #E5E7EB;

    padding: 12px 20px;

    font-size: 10px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .5px;

}


.dashboard-table tbody td {

    padding: 14px 20px;

    color: #4B5563;

    border-color: #F0F1F3;

    font-size: 13px;

}


.dashboard-table tbody tr:hover {

    background: #FAFBFC;

}


.product-name {

    color: #20242C;

    font-weight: 600;

}


/* ==================================================
   BADGE STOK
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
   BADGE TERJUAL
================================================== */

.sold-badge {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    min-width: 40px;

    padding: 5px 11px;

    border-radius: 7px;

    background: #ECFDF5;

    color: #047857;

    font-size: 11px;

    font-weight: 700;

}


/* ==================================================
   EMPTY
================================================== */

.empty-state {

    padding: 35px 20px !important;

    color: #9AA1AB !important;

    text-align: center;

    font-size: 12px !important;

}


/* ==================================================
   RESPONSIVE
================================================== */

@media (max-width: 992px) {

    .dashboard-wrapper {

        margin-left: 250px;

        padding: 30px;

    }

}


@media (max-width: 768px) {

    .dashboard-wrapper {

        margin-left: 210px;

        padding: 25px 18px;

    }

    .dashboard-title {

        font-size: 23px;

    }

}

</style>


<div class="dashboard-wrapper">


    <!-- Header -->

    <div class="dashboard-header">

        <h2 class="dashboard-title">

            Dashboard POS

        </h2>

        <p class="dashboard-date">

            {{ $tanggalHariIni->translatedFormat('l, d F Y') }}

        </p>

    </div>



    <!-- Statistik -->

    <div class="row g-4 mb-5">


        <!-- Total Penjualan -->

        <div class="col-lg-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon green">

                    <i class="bi bi-cash-stack"></i>

                </div>

                <div class="stat-label">

                    Total Penjualan

                </div>

                <div class="stat-value green">

                    Rp {{ number_format($ringkasan['total_penjualan'],0,',','.') }}

                </div>

            </div>

        </div>


        <!-- Total Transaksi -->

        <div class="col-lg-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon">

                    <i class="bi bi-receipt"></i>

                </div>

                <div class="stat-label">

                    Total Transaksi

                </div>

                <div class="stat-value">

                    {{ $ringkasan['total_transaksi'] }}

                </div>

            </div>

        </div>


        <!-- Cash -->

        <div class="col-lg-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon">

                    <i class="bi bi-wallet2"></i>

                </div>

                <div class="stat-label">

                    Pembayaran Cash

                </div>

                <div class="stat-value">

                    Rp {{ number_format($ringkasan['total_cash'],0,',','.') }}

                </div>

            </div>

        </div>


        <!-- Non Tunai -->

        <div class="col-lg-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon">

                    <i class="bi bi-credit-card"></i>

                </div>

                <div class="stat-label">

                    Pembayaran Non Tunai

                </div>

                <div class="stat-value">

                    Rp {{ number_format($ringkasan['total_non_tunai'],0,',','.') }}

                </div>

            </div>

        </div>


    </div>



    <!-- Produk -->

    <div class="row g-4 mb-4">


        <!-- Stok Rendah -->

        <div class="col-lg-6">

            <div class="dashboard-card">


                <div class="dashboard-card-header">

                    <h5 class="dashboard-card-title">

                        Produk Stok Rendah

                    </h5>

                </div>


                <div class="table-responsive">

                    <table class="table dashboard-table align-middle">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Produk</th>

                                <th class="text-center">
                                    Stok
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                        @forelse($produkStokRendah as $index => $produk)


                        <tr>

                            <td>

                                {{ $produkStokRendah->firstItem()+$index }}

                            </td>


                            <td class="product-name">

                                {{ $produk->nama }}

                            </td>


                            <td class="text-center">

                                <span class="stock-badge">

                                    {{ $produk->stok }}

                                </span>

                            </td>

                        </tr>


                        @empty


                        <tr>

                            <td colspan="3"
                                class="empty-state">

                                Tidak ada produk dengan stok rendah.

                            </td>

                        </tr>


                        @endforelse


                        </tbody>

                    </table>

                </div>


                {{ $produkStokRendah->links() }}


            </div>

        </div>



        <!-- Produk Habis -->

        <div class="col-lg-6">

            <div class="dashboard-card">


                <div class="dashboard-card-header">

                    <h5 class="dashboard-card-title">

                        Produk Habis

                    </h5>

                </div>


                <div class="table-responsive">

                    <table class="table dashboard-table align-middle">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Produk</th>

                                <th class="text-center">
                                    Stok
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                        @forelse($produkStokHabis as $index => $produk)


                        <tr>

                            <td>

                                {{ $produkStokHabis->firstItem()+$index }}

                            </td>


                            <td class="product-name">

                                {{ $produk->nama }}

                            </td>


                            <td class="text-center">

                                <span class="stock-badge">

                                    {{ $produk->stok }}

                                </span>

                            </td>

                        </tr>


                        @empty


                        <tr>

                            <td colspan="3"
                                class="empty-state">

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



    <!-- Produk Terlaris -->

    <div class="dashboard-card">


        <div class="dashboard-card-header">

            <h5 class="dashboard-card-title">

                Produk Terlaris

            </h5>

        </div>


        <div class="table-responsive">

            <table class="table dashboard-table align-middle">


                <thead>

                    <tr>

                        <th>No</th>

                        <th>Produk</th>

                        <th class="text-center">
                            Stok
                        </th>

                        <th class="text-center">
                            Terjual
                        </th>

                    </tr>

                </thead>


                <tbody>


                @forelse($produkTerlaris as $index => $produk)


                <tr>

                    <td>

                        {{ $index+1 }}

                    </td>


                    <td class="product-name">

                        {{ $produk->nama }}

                    </td>


                    <td class="text-center">

                        {{ $produk->stok }}

                    </td>


                    <td class="text-center">

                        <span class="sold-badge">

                            {{ $produk->total_terjual }}

                        </span>

                    </td>

                </tr>


                @empty


                <tr>

                    <td colspan="4"
                        class="empty-state">

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
