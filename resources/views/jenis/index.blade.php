@extends('layouts.app')

@section('title', 'Jenis')

@section('content')

@include('layouts.navbar')

<style>
/* ==================================================
   JENIS PAGE
================================================== */

.jenis-wrapper {
    width: 100%;
    min-height: calc(100vh - 68px);
    background: #f4f5f7;
    padding: 28px 32px 40px;
}

/* ==================================================
   HEADER
================================================== */

.jenis-header {
    margin-bottom: 18px;
}

.jenis-header-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.jenis-title {
    color: #20242c;
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 4px;
    letter-spacing: -0.4px;
}

.jenis-subtitle {
    color: #8a929e;
    font-size: 12px;
}

/* ==================================================
   BUTTON TAMBAH
================================================== */

.btn-tambah {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 9px 15px;
    background: #20242c;
    color: #fff;
    border: 0;
    border-radius: 8px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    transition: 0.2s;
}

.btn-tambah:hover {
    background: #10b981;
    color: #fff;
}

/* ==================================================
   ALERT
================================================== */

.alert-custom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 12px 15px;
    margin-bottom: 18px;
    border-radius: 9px;
    font-size: 12px;
}

.alert-success-custom {
    background: #ecfdf5;
    color: #047857;
    border: 1px solid #d1fae5;
}

.alert-danger-custom {
    background: #fef2f2;
    color: #b91c1c;
    border: 1px solid #fecaca;
}

.alert-custom > div {
    display: flex;
    align-items: center;
    gap: 8px;
}

.alert-danger-custom > div {
    display: block;
}

.alert-danger-custom ul {
    margin: 5px 0 0 18px;
    padding: 0;
}

/* ==================================================
   JENIS CARD
================================================== */

.jenis-card {
    width: 100%;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
}

/* ==================================================
   CARD HEADER
================================================== */

.jenis-card-header {
    padding: 15px 18px;
    border-bottom: 1px solid #eef0f2;
}

.jenis-card-title {
    margin: 0;
    color: #20242c;
    font-size: 14px;
    font-weight: 700;
}

/* ==================================================
   TABLE
================================================== */

.jenis-table-wrapper {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.jenis-table {
    width: 100%;
    min-width: 850px;
    margin: 0;
    table-layout: auto;
}

/* ==================================================
   TABLE HEADER
================================================== */

.jenis-table thead th {
    background: #f8f9fa;
    color: #8a929e;
    border-bottom: 1px solid #e5e7eb;
    padding: 10px 12px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    white-space: nowrap;
    text-align: center;
    vertical-align: middle;
}

/* ==================================================
   TABLE DATA
================================================== */

.jenis-table tbody td {
    padding: 11px 12px;
    color: #4b5563;
    border-color: #f0f1f3;
    font-size: 12px;
    vertical-align: middle;
    text-align: center;
}

.jenis-table tbody tr {
    transition: 0.2s;
}

.jenis-table tbody tr:hover {
    background: #fafbfc;
}

/* ==================================================
   NOMOR
================================================== */

.nomor {
    color: #8a929e;
    font-size: 11px;
    text-align: center !important;
}

/* ==================================================
   NAMA JENIS
================================================== */

.jenis-name {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    color: #20242c;
    font-weight: 600;
    text-align: center;
}

.jenis-icon {
    width: 32px;
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 8px;
    background: #ecfdf5;
    color: #10b981;
    font-size: 13px;
}

/* ==================================================
   KETERANGAN
================================================== */

.description {
    display: block;
    max-width: 300px;
    margin: 0 auto;
    overflow: hidden;
    color: #4b5563;
    text-overflow: ellipsis;
    white-space: nowrap;
    text-align: center;
}

.empty-text {
    color: #9aa1ab;
    font-size: 11px;
    font-style: italic;
    text-align: center;
}

/* ==================================================
   CREATOR
================================================== */

.creator {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.creator-name {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    color: #374151;
    font-size: 12px;
    font-weight: 600;
    text-align: center;
}

.creator-name i {
    color: #9aa3af;
}

.creator-date {
    margin-top: 3px;
    color: #9aa1ab;
    font-size: 10px;
    text-align: center;
}

/* ==================================================
   ACTION
================================================== */

.action-buttons {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.action-buttons form {
    margin: 0;
}

.action-btn {
    width: 32px;
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 7px;
    border: 1px solid transparent;
    text-decoration: none;
    font-size: 13px;
    transition: 0.2s;
    cursor: pointer;
}

/* EDIT */

.action-edit {
    background: #ecfdf5;
    color: #047857;
    border-color: #d1fae5;
}

.action-edit:hover {
    background: #d1fae5;
    color: #065f46;
}

/* DELETE */

.action-delete {
    background: #fef2f2;
    color: #b91c1c;
    border-color: #fecaca;
}

.action-delete:hover {
    background: #fee2e2;
    color: #991b1b;
}

/* ==================================================
   EMPTY STATE
================================================== */

.empty-state {
    padding: 35px 20px !important;
    color: #9aa1ab !important;
    text-align: center !important;
    font-size: 12px !important;
}

.empty-icon {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px;
    border-radius: 10px;
    background: #f3f4f6;
    color: #9aa1ab;
    font-size: 19px;
}

.empty-state strong {
    display: block;
    color: #374151;
    font-size: 13px;
    text-align: center;
}

.empty-state p {
    margin: 4px 0 13px;
    color: #9aa1ab;
    font-size: 11px;
    text-align: center;
}

.btn-add-empty {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 8px 13px;
    border-radius: 7px;
    background: #20242c;
    color: #fff;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
}

.btn-add-empty:hover {
    background: #10b981;
    color: #fff;
}

/* ==================================================
   RESPONSIVE
================================================== */

@media (max-width: 768px) {

    .jenis-wrapper {
        padding: 22px 16px 35px;
    }

    .jenis-header-inner {
        align-items: flex-start;
        gap: 12px;
    }

    .jenis-title {
        font-size: 21px;
    }

    .btn-tambah {
        padding: 9px 13px;
    }
}

@media (max-width: 550px) {

    .jenis-header-inner {
        flex-direction: column;
    }

    .btn-tambah {
        width: 100%;
    }
}
</style>


<div class="jenis-wrapper">

    <!-- HEADER -->
    <div class="jenis-header">

        <div class="jenis-header-inner">

            <div>

                <h2 class="jenis-title">
                    Manajemen Jenis
                </h2>

                <p class="jenis-subtitle mb-0">
                    Kelola seluruh jenis produk yang tersedia.
                </p>

            </div>

            <!-- TOMBOL TETAP DI KANAN -->
            <a
                href="{{ route('jenis.create') }}"
                class="btn-tambah">

                <i class="bi bi-plus-lg"></i>

                Tambah Jenis

            </a>

        </div>

    </div>


    <!-- ALERT SUCCESS -->
    @if(session('success'))

        <div class="alert-custom alert-success-custom">

            <div>

                <i class="bi bi-check-circle-fill"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- ALERT ERROR -->
    @if($errors->any())

        <div class="alert-custom alert-danger-custom">

            <div>

                <strong>
                    Terdapat kesalahan:
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- TABLE CARD -->
    <div class="jenis-card">

        <!-- CARD HEADER -->
        <div class="jenis-card-header">

            <h5 class="jenis-card-title">
                Daftar Jenis
            </h5>

        </div>


        <!-- TABLE -->
        <div class="jenis-table-wrapper">

            <table class="table jenis-table align-middle">

                <thead>

                    <tr>

                        <th
                            width="60"
                            class="text-center">

                            No

                        </th>

                        <th class="text-center">
                            Nama Jenis
                        </th>

                        <th class="text-center">
                            Keterangan
                        </th>

                        <th class="text-center">
                            Ditambahkan Oleh
                        </th>

                        <th
                            width="130"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($jenis as $item)

                        <tr>

                            <!-- NO -->
                            <td class="text-center nomor">

                                {{ $loop->iteration }}

                            </td>


                            <!-- NAMA JENIS -->
                            <td class="text-center">

                                <div class="jenis-name">

                                    <div class="jenis-icon">

                                        <i class="bi bi-tag"></i>

                                    </div>

                                    <span>
                                        {{ $item->nama_jenis }}
                                    </span>

                                </div>

                            </td>


                            <!-- KETERANGAN -->
                            <td class="text-center">

                                @if($item->keterangan)

                                    <span class="description">

                                        {{ $item->keterangan }}

                                    </span>

                                @else

                                    <span class="empty-text">

                                        Tidak ada keterangan

                                    </span>

                                @endif

                            </td>


                            <!-- CREATOR -->
                            <td class="text-center">

                                @if($item->creator)

                                    <div class="creator">

                                        <div class="creator-name">

                                            <i class="bi bi-person"></i>

                                            {{ $item->creator->name }}

                                        </div>

                                        <div class="creator-date">

                                            {{ $item->created_at->format('d M Y, H:i') }}

                                        </div>

                                    </div>

                                @else

                                    <span class="empty-text">

                                        Tidak diketahui

                                    </span>

                                @endif

                            </td>


                            <!-- AKSI -->
                            <td class="text-center">

                                <div class="action-buttons">

                                    <!-- EDIT -->
                                    <a
                                        href="{{ route('jenis.edit', $item->id) }}"
                                        class="action-btn action-edit"
                                        title="Edit">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    <!-- HAPUS -->
                                    <form
                                        action="{{ route('jenis.destroy', $item->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn action-delete"
                                            title="Hapus"
                                            onclick="return confirm('Apakah yakin ingin menghapus jenis ini?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="empty-state">

                                <div class="empty-icon">

                                    <i class="bi bi-inbox"></i>

                                </div>

                                <strong>
                                    Belum ada data jenis
                                </strong>

                                <p>
                                    Silakan tambahkan jenis produk baru.
                                </p>

                                <a
                                    href="{{ route('jenis.create') }}"
                                    class="btn-add-empty">

                                    <i class="bi bi-plus-lg"></i>

                                    Tambah Jenis

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

@endsection