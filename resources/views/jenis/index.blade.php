@extends('layouts.app')

@section('title', 'Jenis')

@section('content')

@include('layouts.navbar')

<div class="jenis-page">
    <div class="jenis-container">

        <!-- Header -->
        <div class="jenis-header">
            <div>
                <div class="breadcrumb-custom">
                    <span>Data</span>
                    <i class="bi bi-chevron-right"></i>
                    <span>Jenis Produk</span>
                </div>

                <h2 class="page-title">Manajemen Jenis</h2>

                <p class="page-description">
                    Kelola seluruh jenis produk yang tersedia.
                </p>
            </div>

            <a href="{{ route('jenis.create') }}" class="btn-add">
                <i class="bi bi-plus-lg"></i>
                Tambah Jenis
            </a>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert-custom alert-success-custom">
                <div>
                    <i class="bi bi-check-circle-fill"></i>
                    <span>{{ session('success') }}</span>
                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        <!-- Alert Error -->
        @if($errors->any())
            <div class="alert-custom alert-danger-custom">
                <div>
                    <strong>Terdapat kesalahan:</strong>

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
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

        <!-- Table Card -->
        <div class="jenis-card">
            <div class="card-header-custom">
                <div>
                    <h5>Daftar Jenis</h5>
                    <p>Data jenis produk yang tersimpan di sistem.</p>
                </div>

                <div class="total-data">
                    <i class="bi bi-tags"></i>
                    {{ $jenis->count() }} Jenis
                </div>
            </div>

            <div class="table-responsive">
                <table class="table jenis-table align-middle">
                    <thead>
                        <tr>
                            <th width="65" class="text-center">No</th>
                            <th>Nama Jenis</th>
                            <th>Keterangan</th>
                            <th>Ditambahkan Oleh</th>
                            <th width="180" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($jenis as $item)
                            <tr>
                                <td class="text-center">
                                    <span class="number">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>

                                <td>
                                    <div class="jenis-name">
                                        <div class="jenis-icon">
                                            <i class="bi bi-tag"></i>
                                        </div>

                                        <span>{{ $item->nama_jenis }}</span>
                                    </div>
                                </td>

                                <td>
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

                                <td>
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

                                <td>
                                    <div class="action-buttons">
                                        <a
                                            href="{{ route('jenis.edit', $item->id) }}"
                                            class="action-edit"
                                            title="Edit">

                                            <i class="bi bi-pencil"></i>
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('jenis.destroy', $item->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-delete"
                                                title="Hapus"
                                                onclick="return confirm('Apakah yakin ingin menghapus jenis ini?')">

                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">
                                    <div class="empty-icon">
                                        <i class="bi bi-inbox"></i>
                                    </div>

                                    <strong>Belum ada data jenis</strong>

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
</div>

<style>
.jenis-page {
    min-height: calc(100vh - 70px);
    background: #f5f7fa;
    padding: 32px 28px 50px;
}

.jenis-container {
    width: 100%;
    max-width: 1150px;
    margin: 0 auto;
}

.jenis-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 25px;
    margin-bottom: 24px;
}

.breadcrumb-custom {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 8px;
    color: #9ca3af;
    font-size: 12px;
}

.breadcrumb-custom i {
    font-size: 9px;
}

.page-title {
    margin: 0;
    color: #1f2937;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.5px;
}

.page-description {
    margin: 6px 0 0;
    color: #6b7280;
    font-size: 13px;
}

.btn-add {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    height: 42px;
    padding: 0 17px;
    border: 1px solid #111827;
    border-radius: 9px;
    background: #111827;
    color: #ffffff;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.2s ease;
}

.btn-add:hover {
    background: #10b981;
    border-color: #10b981;
    color: #ffffff;
    transform: translateY(-1px);
}

.alert-custom {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 18px;
    padding: 13px 16px;
    border-radius: 10px;
    font-size: 12px;
}

.alert-custom > div {
    display: flex;
    align-items: center;
    gap: 8px;
}

.alert-success-custom {
    background: #ecfdf5;
    color: #047857;
}

.alert-danger-custom {
    background: #fef2f2;
    color: #b91c1c;
}

.alert-danger-custom > div {
    display: block;
}

.alert-danger-custom ul {
    margin: 5px 0 0 18px;
    padding: 0;
}

.jenis-card {
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    box-shadow: 0 5px 20px rgba(15, 23, 42, 0.04);
}

.card-header-custom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 17px 20px;
    border-bottom: 1px solid #edf0f3;
}

.card-header-custom h5 {
    margin: 0;
    color: #1f2937;
    font-size: 14px;
    font-weight: 700;
}

.card-header-custom p {
    margin: 4px 0 0;
    color: #9ca3af;
    font-size: 11px;
}

.total-data {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    border-radius: 7px;
    background: #ecfdf5;
    color: #047857;
    font-size: 11px;
    font-weight: 600;
}

.jenis-table {
    width: 100%;
    min-width: 850px;
    margin: 0;
}

.jenis-table thead th {
    padding: 11px 15px;
    border-bottom: 1px solid #e5e7eb;
    background: #f8fafc;
    color: #8a929e;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    white-space: nowrap;
}

.jenis-table tbody td {
    padding: 13px 15px;
    border-color: #f0f1f3;
    color: #4b5563;
    font-size: 12px;
    vertical-align: middle;
}

.jenis-table tbody tr {
    transition: 0.15s ease;
}

.jenis-table tbody tr:hover {
    background: #fafbfc;
}

.number {
    color: #9ca3af;
    font-size: 11px;
}

.jenis-name {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #1f2937;
    font-weight: 600;
}

.jenis-icon {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 8px;
    background: #ecfdf5;
    color: #10b981;
}

.description {
    display: block;
    max-width: 300px;
    overflow: hidden;
    color: #4b5563;
    text-overflow: ellipsis;
}

.empty-text {
    color: #9ca3af;
    font-size: 11px;
    font-style: italic;
}

.creator-name {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #374151;
    font-size: 12px;
    font-weight: 600;
}

.creator-name i {
    color: #9ca3af;
}

.creator-date {
    margin-top: 3px;
    color: #9ca3af;
    font-size: 10px;
}

.action-buttons {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.action-buttons form {
    margin: 0;
}

.action-edit,
.action-delete {
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 0 10px;
    border-radius: 7px;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.2s ease;
    cursor: pointer;
}

.action-edit {
    border: 1px solid #dfe3e8;
    background: #ffffff;
    color: #4b5563;
}

.action-edit:hover {
    background: #f3f4f6;
    border-color: #cbd0d7;
    color: #1f2937;
}

.action-delete {
    border: 1px solid #fecaca;
    background: #fef2f2;
    color: #b91c1c;
}

.action-delete:hover {
    background: #fee2e2;
    color: #991b1b;
}

.empty-state {
    padding: 50px 20px !important;
    text-align: center;
}

.empty-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px;
    border-radius: 12px;
    background: #f3f4f6;
    color: #9ca3af;
    font-size: 20px;
}

.empty-state strong {
    display: block;
    color: #374151;
    font-size: 13px;
}

.empty-state p {
    margin: 4px 0 14px;
    color: #9ca3af;
    font-size: 11px;
}

.btn-add-empty {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 13px;
    border-radius: 7px;
    background: #111827;
    color: #ffffff;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
}

.btn-add-empty:hover {
    background: #10b981;
    color: #ffffff;
}

@media (max-width: 768px) {
    .jenis-page {
        padding: 25px 16px 40px;
    }

    .jenis-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .btn-add {
        width: 100%;
    }

    .page-title {
        font-size: 24px;
    }

    .card-header-custom {
        align-items: flex-start;
        flex-direction: column;
    }

    .total-data {
        align-self: flex-start;
    }
}
</style>

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

@endsection