@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Produk</h5>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama Produk</th>
                            <td>{{ $produk->nama }}</td>
                        </tr>
                        <tr>
                            <th>Harga Beli</th>
                            <td>Rp {{ number_format($produk->harga_beli) }}</td>
                        </tr>
                        <tr>
                            <th>Harga Jual</th>
                            <td>Rp {{ number_format($produk->harga_jual) }}</td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>{{ $produk->stok }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat Oleh</th>
                            <td>{{ $produk->user->name ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
