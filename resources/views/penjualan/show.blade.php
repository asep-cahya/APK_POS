@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')
@include('layouts.navbar')

<h1>Detail Penjualan</h1>

<div class="mb-3">
    <strong>Tanggal Transaksi:</strong> {{ $penjualan->created_at->translatedFormat('d-m-Y H:i:s') }}<br>
    <strong>Kasir:</strong> {{ $penjualan->user->name }}<br>
    <strong>Total Pembayaran:</strong> Rp.{{ number_format($penjualan->total_pembayaran) }}<br>
    <strong>Metode Pembayaran:</strong> {{ $penjualan->metode_pembayaran }}<br>
    <strong>Status:</strong> {{ $penjualan->status }}
</div>

<h3>Item Produk</h3>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penjualan->itemPenjualan as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->produk->nama }}</td>
            <td>Rp.{{ number_format($item->produk->harga) }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>Rp.{{ number_format($item->subtotal) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
