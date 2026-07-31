@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary">📦 Manajemen Produk</h2>
            <p class="text-muted mb-0">Kelola seluruh data produk.</p>
        </div>

        <a href="{{ route('produk.create') }}" class="btn btn-primary shadow-sm">
            + Tambah Produk
        </a>
    </div>

    <!-- Search -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="{{ route('produk.index') }}" method="GET">
                <div class="input-group">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari nama produk...">

                    <button class="btn btn-primary">
                        🔍 Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Produk</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>User</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th width="220">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($products as $product)

                        <tr>

                            <td class="text-center">
                                {{ $products->firstItem() + $loop->index }}
                            </td>

                            <td>{{ $product->user->name }}</td>

                            <td class="text-center">

                                @if($product->foto)
                                <img
                                    src="{{ asset('storage/' . $product->foto) }}"
                                    width="70"
                                    height="70"
                                    class="rounded shadow-sm"
                                    style="object-fit:cover;"
                                    alt="{{ $product->nama }}">
                                @else
                                <span class="text-muted">
                                    Tidak ada foto
                                </span>
                                @endif

                            </td>

                            <td class="fw-semibold">
                                {{ $product->nama }}
                            </td>

                            <td>
                                Rp {{ number_format($product->harga_beli,0,',','.') }}
                            </td>

                            <td class="text-success fw-bold">
                                Rp {{ number_format($product->harga_jual,0,',','.') }}
                            </td>

                            <td>

                                @if($product->stok > 20)

                                <span class="badge bg-success">
                                    {{ $product->stok }}
                                </span>

                                @elseif($product->stok > 5)

                                <span class="badge bg-warning text-dark">
                                    {{ $product->stok }}
                                </span>

                                @else

                                <span class="badge bg-danger">
                                    {{ $product->stok }}
                                </span>

                                @endif

                            </td>

                            <td class="text-nowrap">

                                <a href="{{ route('produk.show', $product) }}"
                                    class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <a href="{{ route('produk.edit', $product) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('produk.destroy', $product) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah yakin ingin menghapus produk ini?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="text-center py-4 text-muted">
                                Belum ada data produk.
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white">
            {{ $products->links() }}
        </div>

    </div>

</div>

@endsection