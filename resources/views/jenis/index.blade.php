@extends('layouts.app')

@section('title', 'Jenis')

@section('content')

@include('layouts.navbar')


<style>

/* ==================================================
   JENIS PAGE
================================================== */

.jenis-wrapper {

    margin-left: 250px;

    min-height: 100vh;

    background: #F3F4F6;

    padding: 40px;

}


/* ==================================================
   HEADER
================================================== */

.jenis-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 32px;

}


.jenis-title {

    color: #20242C;

    font-size: 27px;

    font-weight: 700;

    margin-bottom: 6px;

    letter-spacing: -0.5px;

}


.jenis-subtitle {

    color: #8A929E;

    font-size: 13px;

    margin: 0;

}


/* ==================================================
   BUTTON TAMBAH
================================================== */

.btn-tambah-jenis {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    background: #20242C;

    color: #FFFFFF;

    border: none;

    border-radius: 9px;

    padding: 11px 18px;

    font-size: 12px;

    font-weight: 600;

    text-decoration: none;

    transition: all .2s ease;

}


.btn-tambah-jenis:hover {

    background: #10B981;

    color: #FFFFFF;

    transform: translateY(-1px);

}


/* ==================================================
   ALERT
================================================== */

.jenis-alert {

    border: none;

    border-radius: 10px;

    font-size: 13px;

}


.jenis-alert.alert-success {

    background: #ECFDF5;

    color: #047857;

}


.jenis-alert.alert-danger {

    background: #FEF2F2;

    color: #B91C1C;

}


/* ==================================================
   CARD
================================================== */

.jenis-card {

    background: #FFFFFF;

    border: 1px solid #E5E7EB;

    border-radius: 14px;

    overflow: hidden;

}


.jenis-card-header {

    padding: 20px 22px;

    border-bottom: 1px solid #EEF0F2;

}


.jenis-card-title {

    margin: 0;

    color: #20242C;

    font-size: 15px;

    font-weight: 700;

}


/* ==================================================
   TABLE
================================================== */

.jenis-table {

    margin-bottom: 0;

}


.jenis-table thead th {

    background: #F8F9FA;

    color: #8A929E;

    border-bottom: 1px solid #E5E7EB;

    padding: 13px 20px;

    font-size: 10px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .5px;

    white-space: nowrap;

}


.jenis-table tbody td {

    padding: 15px 20px;

    color: #4B5563;

    border-color: #F0F1F3;

    font-size: 13px;

    vertical-align: middle;

}


.jenis-table tbody tr {

    transition: background .15s ease;

}


.jenis-table tbody tr:hover {

    background: #FAFBFC;

}


.jenis-number {

    color: #9AA1AB;

    font-size: 12px;

}


.jenis-name {

    color: #20242C;

    font-weight: 600;

}


/* ==================================================
   CREATOR
================================================== */

.creator-name {

    color: #20242C;

    font-size: 12px;

    font-weight: 600;

}


.creator-date {

    color: #9AA1AB;

    font-size: 10px;

    margin-top: 3px;

}


/* ==================================================
   EMPTY KETERANGAN
================================================== */

.no-description {

    color: #9AA1AB;

    font-size: 12px;

    font-style: italic;

}


/* ==================================================
   BUTTON AKSI
================================================== */

.btn-edit {

    background: #FFFFFF;

    color: #4B5563;

    border: 1px solid #D1D5DB;

    border-radius: 7px;

    padding: 6px 12px;

    font-size: 11px;

    font-weight: 600;

    transition: all .2s ease;

}


.btn-edit:hover {

    background: #F3F4F6;

    border-color: #9CA3AF;

    color: #20242C;

}


.btn-hapus {

    background: #20242C;

    color: #FFFFFF;

    border: 1px solid #20242C;

    border-radius: 7px;

    padding: 6px 12px;

    font-size: 11px;

    font-weight: 600;

    transition: all .2s ease;

}


.btn-hapus:hover {

    background: #10B981;

    border-color: #10B981;

    color: #FFFFFF;

}


/* ==================================================
   EMPTY TABLE
================================================== */

.empty-state {

    padding: 45px 20px !important;

    color: #9AA1AB !important;

    text-align: center;

    font-size: 12px !important;

}


/* ==================================================
   RESPONSIVE
================================================== */

@media (max-width: 992px) {

    .jenis-wrapper {

        margin-left: 250px;

        padding: 30px;

    }

}


@media (max-width: 768px) {

    .jenis-wrapper {

        margin-left: 220px;

        padding: 25px 18px;

    }


    .jenis-header {

        align-items: flex-start;

        gap: 20px;

    }


    .jenis-title {

        font-size: 23px;

    }

}

</style>


<div class="jenis-wrapper">


    <!-- Header -->

    <div class="jenis-header">

        <div>

            <h2 class="jenis-title">

                Manajemen Jenis

            </h2>

            <p class="jenis-subtitle">

                Kelola seluruh jenis produk.

            </p>

        </div>


        <a href="{{ route('jenis.create') }}"
           class="btn-tambah-jenis">

            <i class="bi bi-plus-lg"></i>

            Tambah Jenis

        </a>

    </div>


    <!-- Pesan Sukses -->

    @if(session('success'))

        <div class="alert jenis-alert alert-success alert-dismissible fade show mb-4">

            <i class="bi bi-check-circle me-2"></i>

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

        <div class="alert jenis-alert alert-danger mb-4">

            <div class="fw-semibold mb-2">

                Terdapat kesalahan:

            </div>

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

    <div class="jenis-card">


        <div class="jenis-card-header">

            <h5 class="jenis-card-title">

                Daftar Jenis

            </h5>

        </div>


        <div class="table-responsive">

            <table class="table jenis-table align-middle">

                <thead>

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


                        <th>

                            Ditambahkan Oleh

                        </th>


                        <th
                            width="170"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($jenis as $item)


                    <tr>


                        <!-- No -->

                        <td class="text-center">

                            <span class="jenis-number">

                                {{ $loop->iteration }}

                            </span>

                        </td>


                        <!-- Nama -->

                        <td>

                            <span class="jenis-name">

                                {{ $item->nama_jenis }}

                            </span>

                        </td>


                        <!-- Keterangan -->

                        <td>

                            @if($item->keterangan)

                                {{ $item->keterangan }}

                            @else

                                <span class="no-description">

                                    Tidak ada keterangan

                                </span>

                            @endif

                        </td>


                        <!-- Ditambahkan Oleh -->

                        <td>

                            @if($item->creator)

                                <div class="creator-name">

                                    <i class="bi bi-person me-1"></i>

                                    {{ $item->creator->name }}

                                </div>

                                <div class="creator-date">

                                    {{ $item->created_at->format('d M Y, H:i') }}

                                </div>

                            @else

                                <span class="no-description">

                                    Tidak diketahui

                                </span>

                            @endif

                        </td>


                        <!-- Aksi -->

                        <td class="text-center">


                            <a
                                href="{{ route('jenis.edit', $item->id) }}"
                                class="btn btn-edit me-1">

                                <i class="bi bi-pencil"></i>

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
                                    class="btn btn-hapus"
                                    onclick="return confirm('Apakah yakin ingin menghapus jenis ini?')">

                                    <i class="bi bi-trash"></i>

                                    Hapus

                                </button>

                            </form>


                        </td>


                    </tr>


                    @empty


                    <tr>

                        <td
                            colspan="5"
                            class="empty-state">

                            <i class="bi bi-inbox"
                               style="font-size: 25px;">
                            </i>

                            <div class="mt-2">

                                Belum ada data jenis.

                            </div>

                        </td>

                    </tr>


                    @endforelse


                </tbody>

            </table>

        </div>


    </div>


</div>


@endsection
