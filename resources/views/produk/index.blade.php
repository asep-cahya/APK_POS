
@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>
            <h2 class="fw-bold mb-1">
                Manajemen Produk
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh data produk.
            </p>
        </div>

        <a href="{{ route('produk.create') }}"
            class="btn btn-dark rounded-3 px-4">
            Tambah Produk
        </a>

    </div>

    <!-- Search -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form action="{{ route('produk.index') }}" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari nama produk">

                    <button class="btn btn-dark">
                        Cari
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h5 class="fw-bold mb-4">
                Daftar Produk
            </h5>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60" class="text-center">No</th>
                            <th>User</th>
                            <th class="text-center">Foto</th>
                            <th>Nama Produk</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center" width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($products as $product)

                        <tr>

                            <td class="text-center">
                                {{ $products->firstItem() + $loop->index }}
                            </td>

                            <td>
                                {{ $product->user->name }}
                            </td>

                            <td class="text-center">

                                @if($product->foto)

                                    <img
                                        src="{{ asset('storage/' . $product->foto) }}"
                                        width="70"
                                        height="70"
                                        class="rounded-3 border"
                                        style="object-fit: cover;"
                                        alt="{{ $product->nama }}">

                                @else

                                    <small class="text-muted">
                                        Tidak ada foto
                                    </small>

                                @endif

                            </td>

                            <td class="fw-semibold">
                                {{ $product->nama }}
                            </td>

                            <td>
                                Rp {{ number_format($product->harga_beli,0,',','.') }}
                            </td>

                            <td>
                                Rp {{ number_format($product->harga_jual,0,',','.') }}
                            </td>

                            <td class="text-center">

                                <span class="badge border border-dark text-dark rounded-pill px-3">
                                    {{ $product->stok }}
                                </span>

                            </td>

                            <td class="text-center">

                                <a href="{{ route('produk.show', $product) }}"
                                    class="btn btn-outline-dark btn-sm">
                                    Detail
                                </a>

                                <a href="{{ route('produk.edit', $product) }}"
                                    class="btn btn-outline-dark btn-sm">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('produk.destroy', $product) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-dark btn-sm"
                                        onclick="return confirm('Apakah yakin ingin menghapus produk ini?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8"
                                class="text-center text-muted py-5">

                                Belum ada data produk.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white border-0">

            {{ $products->links() }}

        </div>

    </div>

</div>

@endsection

