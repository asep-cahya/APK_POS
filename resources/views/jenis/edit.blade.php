@extends('layouts.app')

@section('title', 'Edit Jenis')

@section('content')

@include('layouts.navbar')

<div class="container py-5">

    <!-- Header -->
    <div class="mb-5">

        <h2 class="fw-bold mb-1">
            Edit Jenis
        </h2>

        <p class="text-muted mb-0">
            Ubah data jenis produk.
        </p>

    </div>


    <!-- Form -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-4">
                Form Edit Jenis
            </h5>


            <form
                action="{{ route('jenis.update', $jeni->id) }}"
                method="POST">

                @csrf

                @method('PUT')


                <!-- Nama Jenis -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Nama Jenis
                    </label>

                    <input
                        type="text"
                        name="nama_jenis"
                        class="form-control @error('nama_jenis') is-invalid @enderror"
                        value="{{ old('nama_jenis', $jeni->nama_jenis) }}"
                        placeholder="Masukkan nama jenis"
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
                        placeholder="Masukkan keterangan jenis">{{ old('keterangan', $jeni->keterangan) }}</textarea>

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

                        Update Jenis

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
