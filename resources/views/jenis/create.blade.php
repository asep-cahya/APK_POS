@extends('layouts.app')

@section('title', 'Tambah Jenis')

@section('content')

@include('layouts.navbar')

<div class="container py-5">

    <!-- Header -->
    <div class="mb-5">

        <h2 class="fw-bold mb-1">
            Tambah Jenis
        </h2>

        <p class="text-muted mb-0">
            Tambahkan jenis produk baru.
        </p>

    </div>


    <!-- Form -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-4">
                Form Jenis
            </h5>


            <form
                action="{{ route('jenis.store') }}"
                method="POST">

                @csrf


                <!-- Nama Jenis -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Nama Jenis
                    </label>

                    <input
                        type="text"
                        name="nama_jenis"
                        class="form-control @error('nama_jenis') is-invalid @enderror"
                        value="{{ old('nama_jenis') }}"
                        placeholder="Contoh: Makanan"
                        required>

                    @error('nama_jenis')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- Keterangan -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        class="form-control @error('keterangan') is-invalid @enderror"
                        rows="5"
                        placeholder="Masukkan keterangan (opsional)">{{ old('keterangan') }}</textarea>

                    @error('keterangan')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- Action -->
                <div class="d-flex justify-content-end gap-2">

                    <a
                        href="{{ route('jenis.index') }}"
                        class="btn btn-outline-dark">

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="btn btn-dark">

                        Simpan Jenis

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
