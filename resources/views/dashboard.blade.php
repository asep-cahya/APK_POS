
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('layouts.navbar')


<div class="container py-5">


    <!-- Header -->

    <div class="mb-5">

        <h2 class="fw-bold mb-2"
            style="color:#111827;">

            Dashboard POS

        </h2>


        <p class="text-muted mb-0">

            {{ $tanggalHariIni->translatedFormat('l, d F Y') }}

        </p>


    </div>




    <!-- Statistik -->

    <div class="row g-4 mb-5">



        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">


                    <p class="text-muted mb-2">

                        Total Penjualan

                    </p>


                    <h3 class="fw-bold mb-0"
                        style="color:#10B981;">

                        Rp {{ number_format($ringkasan['total_penjualan'],0,',','.') }}

                    </h3>


                </div>

            </div>

        </div>





        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">


                    <p class="text-muted mb-2">

                        Total Transaksi

                    </p>


                    <h3 class="fw-bold mb-0"
                        style="color:#111827;">

                        {{ $ringkasan['total_transaksi'] }}

                    </h3>


                </div>

            </div>

        </div>





        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">


                    <p class="text-muted mb-2">

                        Pembayaran Cash

                    </p>


                    <h3 class="fw-bold mb-0"
                        style="color:#111827;">

                        Rp {{ number_format($ringkasan['total_cash'],0,',','.') }}

                    </h3>


                </div>

            </div>

        </div>





        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">


                    <p class="text-muted mb-2">

                        Pembayaran Non Tunai

                    </p>


                    <h3 class="fw-bold mb-0"
                        style="color:#111827;">

                        Rp {{ number_format($ringkasan['total_non_tunai'],0,',','.') }}

                    </h3>


                </div>

            </div>

        </div>



    </div>





    <!-- Produk -->

    <div class="row g-4 mb-5">



        <!-- Stok Rendah -->

        <div class="col-lg-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <h5 class="fw-bold mb-4">

                        Produk Stok Rendah

                    </h5>



                    <div class="table-responsive">


                        <table class="table align-middle">


                            <thead class="table-light">


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


                                <td class="fw-medium">
                                    {{ $produk->nama }}
                                </td>


                                <td class="text-center">


                                    <span class="badge rounded-pill px-3"
                                        style="background:#111827;">

                                        {{ $produk->stok }}

                                    </span>


                                </td>


                            </tr>


                            @empty


                            <tr>

                                <td colspan="3"
                                    class="text-center text-muted py-4">

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


        </div>






        <!-- Produk Habis -->


        <div class="col-lg-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <h5 class="fw-bold mb-4">

                        Produk Habis

                    </h5>



                    <div class="table-responsive">


                        <table class="table align-middle">


                            <thead class="table-light">


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


                                <td class="fw-medium">
                                    {{ $produk->nama }}
                                </td>


                                <td class="text-center">


                                    <span class="badge rounded-pill px-3"
                                        style="background:#111827;">

                                        {{ $produk->stok }}

                                    </span>


                                </td>


                            </tr>


                            @empty


                            <tr>

                                <td colspan="3"
                                    class="text-center text-muted py-4">

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


    <div class="card border-0 shadow-sm rounded-4">


        <div class="card-body p-4">


            <h5 class="fw-bold mb-4">

                Produk Terlaris

            </h5>



            <div class="table-responsive">


                <table class="table align-middle">


                    <thead class="table-light">


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


                        <td class="fw-medium">

                            {{ $produk->nama }}

                        </td>


                        <td class="text-center">

                            {{ $produk->stok }}

                        </td>



                        <td class="text-center">


                            <span class="badge rounded-pill px-3"
                                style="background:#10B981;">


                                {{ $produk->total_terjual }}


                            </span>


                        </td>



                    </tr>


                    @empty


                    <tr>

                        <td colspan="4"
                            class="text-center text-muted py-4">

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

