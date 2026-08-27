@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="produk-page">
    <div class="produk-container">
        <!-- HEADER -->
        <div class="page-header">
            <div class="breadcrumb-custom">
                <span>Produk</span>
                <i class="bi bi-chevron-right"></i>
                <span>Tambah Produk</span>
            </div>

            <h2 class="page-title">Tambah Produk</h2>

            <p class="page-description">
                Tambahkan data produk baru ke dalam sistem POS.
            </p>
        </div>

        <!-- FORM -->
        <form
            action="{{ route('produk.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @include('produk._form')
        </form>
    </div>
</div>

<style>
.produk-page {
    min-height: calc(100vh - 65px);
    background: #f5f7fa;
    padding: 28px 30px 45px;
}

.produk-container {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
}

.page-header {
    margin-bottom: 22px;
}

.breadcrumb-custom {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 8px;
    font-size: 11px;
    color: #9ca3af;
}

.breadcrumb-custom i {
    font-size: 8px;
}

.page-title {
    margin: 0;
    font-size: 26px;
    font-weight: 700;
    color: #1f2937;
    letter-spacing: -.4px;
}

.page-description {
    margin: 5px 0 0;
    font-size: 12px;
    color: #6b7280;
}

@media (max-width: 600px) {
    .produk-page {
        padding: 22px 16px 35px;
    }

    .page-title {
        font-size: 23px;
    }
}
</style>

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection