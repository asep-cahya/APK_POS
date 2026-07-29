@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

@include('layouts.navbar')

<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Detail Produk</h4>
    </div>

    <div class="card-body">
        <div class="row">

            <!-- Data Produk -->
            <div class="col-md-7">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Nama Produk</th>
                        <td>{{ $produk->nama }}</td>
                    </tr>
                    <tr>
                        <th>Harga Beli</th>
                        <td>Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Harga Jual</th>
                        <td>Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>{{ $produk->stok }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat Oleh</th>
                        <td>{{ $produk->user->name }}</td>
                    </tr>
                </table>
            </div>

            <!-- Foto Produk -->
            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/' . $produk->foto) }}"
                    class="img-fluid rounded shadow"
                    style="max-height:300px;"
                    alt="{{ $produk->nama }}">
            </div>

        </div>
    </div>

    <div class="card-footer text-end">
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>

@endsection