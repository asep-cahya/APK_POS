
@extends('layouts.app')

@section('title', 'POS')

@section('content')

<div class="container py-5">


    @if(session('errors'))

    <div class="alert border shadow-sm">
        {{ session('errors') }}
    </div>

    @endif



    <!-- Header -->

    <div class="mb-5">

        <h2 class="fw-bold mb-1">
            Point Of Sale (POS)
        </h2>

        <p class="text-muted mb-0">
            Tambahkan produk ke keranjang dan lakukan transaksi penjualan.
        </p>

    </div>



    <div class="row g-4">



        <!-- ================= DAFTAR PRODUK ================= -->

        <div class="col-lg-6">


            <div class="card border-0 shadow-sm rounded-4">


                <div class="card-body">


                    <h5 class="fw-bold mb-4">
                        Daftar Produk
                    </h5>



                    <form method="GET"
                        action="{{ route('penjualan.create') }}"
                        class="mb-4">


                        <div class="input-group">


                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control"
                                placeholder="Cari produk..."
                                onkeyup="this.form.submit()">



                            <button class="btn btn-dark">

                                Cari

                            </button>


                        </div>


                    </form>





                    <div style="max-height:70vh;overflow:auto;">



                    @foreach($products as $product)



                    <form method="POST"
                        action="{{ route('itempenjualan.store') }}"
                        class="mb-3">


                        @csrf



                        <input type="hidden"
                            name="product_id"
                            value="{{ $product->id }}">





                        <div class="border rounded-4 p-3">


                            <div class="row align-items-center">



                                <div class="col-2">


                                    @if($product->foto)

                                    <img
                                        src="{{ asset('storage/'.$product->foto) }}"
                                        class="rounded-3 border"
                                        style="width:55px;height:55px;object-fit:cover;">

                                    @endif


                                </div>




                                <div class="col-5">


                                    <h6 class="fw-semibold mb-1">
                                        {{ $product->nama }}
                                    </h6>


                                    <small>
                                        Rp {{ number_format($product->harga_jual) }}
                                    </small>


                                </div>





                                <div class="col-3">


                                    <input
                                        type="number"
                                        name="quantity"
                                        value="1"
                                        min="1"
                                        class="form-control {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}">


                                </div>





                                <div class="col-2">


                                    <button
                                        class="btn btn-dark w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">


                                        +

                                    </button>


                                </div>



                            </div>



                        </div>



                    </form>




                    @endforeach



                    </div>



                </div>


            </div>



        </div>





        <!-- ================= KERANJANG ================= -->

        <div class="col-lg-6">



            <div class="card border-0 shadow-sm rounded-4">



                <div class="card-body">



                    <h5 class="fw-bold mb-4">
                        Keranjang Belanja
                    </h5>




                    <div class="table-responsive">


                        <table class="table align-middle">



                            <thead class="table-light">


                                <tr>

                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>

                                </tr>


                            </thead>





                            <tbody>




                            @forelse($sale->itemPenjualan as $item)



                            <tr>



                                <td>
                                    {{ $item->produk->nama }}
                                </td>



                                <td>
                                    Rp {{ number_format($item->produk->harga_jual) }}
                                </td>



                                <td width="90">


                                    <form method="POST"
                                        action="{{ route('itempenjualan.update',$item->id) }}">


                                        @csrf
                                        @method('PUT')


                                        <input
                                            type="number"
                                            name="quantity"
                                            value="{{ $item->kuantitas }}"
                                            class="form-control form-control-sm">


                                    </form>


                                </td>




                                <td>
                                    Rp {{ number_format($item->subtotal) }}
                                </td>



                                <td>


                                @can('delete',$item)


                                    <form
                                        method="POST"
                                        action="{{ route('itempenjualan.destroy',$item->id) }}">


                                        @csrf
                                        @method('DELETE')


                                        <button
                                            class="btn btn-dark btn-sm">

                                            Hapus

                                        </button>


                                    </form>



                                @endcan



                                </td>



                            </tr>



                            @empty



                            <tr>


                                <td colspan="5"
                                    class="text-center text-muted py-4">

                                    Belum ada item di keranjang.

                                </td>


                            </tr>



                            @endforelse




                            </tbody>



                        </table>



                    </div>





                </div>






                <div class="card-footer bg-white border-0 p-4">



                    <div class="d-flex justify-content-between mb-4">


                        <h5 class="fw-bold">
                            Total
                        </h5>



                        <h5 class="fw-bold">

                            Rp {{ number_format($sale->total_pembayaran) }}

                        </h5>



                    </div>





                    <form
                        method="POST"
                        action="{{ route('penjualan.update',$sale->id) }}"
                        onsubmit="return confirm('Yakin ingin checkout?')">


                        @csrf
                        @method('PUT')




                        <select
                            name="payment_method"
                            class="form-select mb-3">


                            <option value="">
                                Pilih Metode Pembayaran
                            </option>


                            <option value="CASH">
                                Cash
                            </option>


                            <option value="QRIS">
                                QRIS
                            </option>


                        </select>





                        <button
                            class="btn btn-dark w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">


                            Checkout


                        </button>



                    </form>





                    @can('delete',$sale)



                    <form
                        method="POST"
                        action="{{ route('penjualan.destroy',$sale->id) }}"
                        onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">


                        @csrf
                        @method('DELETE')



                        <button
                            class="btn btn-outline-dark w-100 mt-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">


                            Batalkan Transaksi


                        </button>



                    </form>




                    @endcan




                </div>



            </div>



        </div>



    </div>


</div>


@endsection

