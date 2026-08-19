@extends('layouts.app')

@section('title', 'Jenis')

@section('content')

@include('layouts.navbar')

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>
            <h2 class="fw-bold mb-1">
                Manajemen Jenis
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh jenis produk.
            </p>
        </div>

        <a href="{{ route('jenis.create') }}"
            class="btn btn-dark rounded-3 px-4">

            Tambah Jenis

        </a>

    </div>


    <!-- Pesan Sukses -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- Pesan Error -->
    @if($errors->any())

        <div class="alert alert-danger rounded-3 mb-4">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h5 class="fw-bold mb-4">
                Daftar Jenis
            </h5>


            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">

                        <tr>

                            <th
                                width="60"
                                class="text-center">

                                No

                            </th>


                            <th>
                                Nama Jenis
                            </th>


                            <th>
                                Keterangan
                            </th>


                            <th
                                class="text-center"
                                width="220">

                                Aksi

                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($jenis as $item)

                        <tr>

                            <!-- No -->
                            <td class="text-center">

                                {{ $loop->iteration }}

                            </td>


                            <!-- Nama Jenis -->
                            <td class="fw-semibold">

                                {{ $item->nama_jenis }}

                            </td>


                            <!-- Keterangan -->
                            <td>

                                @if($item->keterangan)

                                    {{ $item->keterangan }}

                                @else

                                    <span class="text-muted">
                                        Tidak ada keterangan
                                    </span>

                                @endif

                            </td>


                            <!-- Aksi -->
                            <td class="text-center">

                                <a
                                    href="{{ route('jenis.edit', $item->id) }}"
                                    class="btn btn-outline-dark btn-sm">

                                    Edit

                                </a>


                                <form
                                    action="{{ route('jenis.destroy', $item->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-dark btn-sm"
                                        onclick="return confirm('Apakah yakin ingin menghapus jenis ini?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>


                        @empty

                        <tr>

                            <td
                                colspan="4"
                                class="text-center text-muted py-5">

                                Belum ada data jenis.

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
