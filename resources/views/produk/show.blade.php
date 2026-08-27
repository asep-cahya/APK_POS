@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
@include('layouts.navbar')

<div class="detail-page">
    <div class="detail-container">
        <!-- HEADER -->
        <div class="page-header">
            <div class="breadcrumb-custom">
                <span>Produk</span>
                <i class="bi bi-chevron-right"></i>
                <span>Detail Produk</span>
            </div>

            <div class="header-content">
                <div>
                    <h2 class="page-title">Detail Produk</h2>
                    <p class="page-description">
                        Informasi lengkap mengenai produk.
                    </p>
                </div>

                <a href="{{ route('produk.index') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>

        <!-- DETAIL CARD -->
        <div class="detail-card">
            <div class="detail-header">
                <div class="product-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div>
                    <h4>{{ $produk->nama }}</h4>
                    <span>Informasi produk</span>
                </div>
            </div>

            <div class="detail-content">
                <!-- FOTO -->
                <div class="photo-section">
                    <div class="section-label">
                        <i class="bi bi-image"></i>
                        Foto Produk
                    </div>

                    @if($produk->foto)
                        <div class="image-wrapper">
                            <img
                                src="{{ asset('storage/'.$produk->foto) }}"
                                class="product-image"
                                alt="{{ $produk->nama }}">
                        </div>
                    @else
                        <div class="no-image">
                            <i class="bi bi-image"></i>
                            <span>Foto tidak tersedia</span>
                        </div>
                    @endif
                </div>

                <!-- INFORMASI -->
                <div class="info-section">
                    <div class="section-label">
                        <i class="bi bi-info-circle"></i>
                        Informasi Produk
                    </div>

                    <div class="info-list">
                        <!-- Nama -->
                        <div class="info-item">
                            <div class="info-label">Nama Produk</div>
                            <div class="info-value product-name">
                                {{ $produk->nama }}
                            </div>
                        </div>

                        <!-- Jenis -->
                        <div class="info-item">
                            <div class="info-label">Jenis Produk</div>
                            <div class="info-value">
                                @if($produk->jenis)
                                    <span class="jenis-badge">
                                        {{ $produk->jenis->nama_jenis }}
                                    </span>
                                @else
                                    <span class="muted-text">
                                        Belum ada jenis
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Harga Beli -->
                        <div class="info-item">
                            <div class="info-label">Harga Beli</div>
                            <div class="info-value">
                                <span class="price-badge">
                                    Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- Harga Jual -->
                        <div class="info-item">
                            <div class="info-label">Harga Jual</div>
                            <div class="info-value">
                                <span class="selling-badge">
                                    Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- Stok -->
                        <div class="info-item">
                            <div class="info-label">Stok</div>
                            <div class="info-value">
                                @if($produk->stok > 20)
                                    <span class="stock-badge stock-high">
                                        {{ $produk->stok }} pcs
                                    </span>
                                @elseif($produk->stok > 5)
                                    <span class="stock-badge stock-medium">
                                        {{ $produk->stok }} pcs
                                    </span>
                                @else
                                    <span class="stock-badge stock-low">
                                        {{ $produk->stok }} pcs
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- User -->
                        <div class="info-item">
                            <div class="info-label">Dibuat Oleh</div>
                            <div class="info-value user-info">
                                <i class="bi bi-person-circle"></i>
                                {{ $produk->user->name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ACTION -->
            <div class="detail-actions">
                <a
                    href="{{ route('produk.index') }}"
                    class="btn-cancel">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

                <a
                    href="{{ route('produk.edit', $produk) }}"
                    class="btn-edit">
                    <i class="bi bi-pencil"></i>
                    Edit Produk
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.detail-page {
    min-height: calc(100vh - 65px);
    background: #f5f7fa;
    padding: 28px 30px 45px;
}

.detail-container {
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

.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
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

.btn-back {
    height: 39px;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 0 15px;
    border: 1px solid #dfe3e8;
    border-radius: 8px;
    background: #fff;
    color: #4b5563;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: .2s;
}

.btn-back:hover {
    background: #f3f4f6;
    color: #1f2937;
}

.detail-card {
    width: 100%;
    overflow: hidden;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
}

.detail-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 20px 25px;
    border-bottom: 1px solid #edf0f3;
}

.product-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #ecfdf5;
    color: #10b981;
    font-size: 17px;
}

.detail-header h4 {
    margin: 0 0 3px;
    color: #1f2937;
    font-size: 16px;
    font-weight: 700;
}

.detail-header span {
    color: #9ca3af;
    font-size: 11px;
}

.detail-content {
    display: grid;
    grid-template-columns: 300px minmax(0, 1fr);
    gap: 30px;
    padding: 25px;
}

.section-label {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 12px;
    color: #374151;
    font-size: 12px;
    font-weight: 700;
}

.section-label i {
    color: #10b981;
    font-size: 14px;
}

.image-wrapper {
    width: 100%;
    height: 260px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    background: #f9fafb;
}

.product-image {
    width: 100%;
    height: 100%;
    padding: 10px;
    object-fit: contain;
}

.no-image {
    width: 100%;
    height: 260px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    border: 1px dashed #d1d5db;
    border-radius: 12px;
    background: #f9fafb;
    color: #9ca3af;
    font-size: 11px;
}

.no-image i {
    font-size: 30px;
}

.info-section {
    min-width: 0;
}

.info-list {
    overflow: hidden;
    border: 1px solid #e5e7eb;
    border-radius: 11px;
}

.info-item {
    display: grid;
    grid-template-columns: 160px minmax(0, 1fr);
    align-items: center;
    min-height: 55px;
    border-bottom: 1px solid #f0f1f3;
}

.info-item:last-child {
    border-bottom: none;
}

.info-label {
    height: 100%;
    display: flex;
    align-items: center;
    padding: 0 15px;
    background: #f9fafb;
    color: #8a929e;
    font-size: 11px;
    font-weight: 600;
}

.info-value {
    padding: 0 15px;
    color: #374151;
    font-size: 12px;
    font-weight: 500;
}

.product-name {
    color: #20242c;
    font-weight: 700;
}

.jenis-badge {
    display: inline-flex;
    align-items: center;
    padding: 5px 9px;
    border-radius: 6px;
    background: #f3f4f6;
    color: #374151;
    font-size: 10px;
    font-weight: 600;
}

.price-badge,
.selling-badge,
.stock-badge {
    display: inline-flex;
    align-items: center;
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 10px;
    font-weight: 600;
}

.price-badge {
    background: #fff7ed;
    color: #c2410c;
}

.selling-badge {
    background: #ecfdf5;
    color: #047857;
}

.stock-high {
    background: #ecfdf5;
    color: #047857;
}

.stock-medium {
    background: #fffbeb;
    color: #b45309;
}

.stock-low {
    background: #fef2f2;
    color: #b91c1c;
}

.muted-text {
    color: #9ca3af;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 7px;
}

.user-info i {
    color: #9ca3af;
    font-size: 15px;
}

.detail-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 9px;
    padding: 16px 25px;
    background: #f9fafb;
    border-top: 1px solid #edf0f3;
}

.btn-cancel,
.btn-edit {
    height: 39px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 0 16px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: .2s;
}

.btn-cancel {
    border: 1px solid #dfe3e8;
    background: #fff;
    color: #4b5563;
}

.btn-cancel:hover {
    background: #f3f4f6;
    color: #1f2937;
}

.btn-edit {
    border: 1px solid #20242c;
    background: #20242c;
    color: #fff;
}

.btn-edit:hover {
    border-color: #10b981;
    background: #10b981;
    color: #fff;
}

@media (max-width: 850px) {
    .detail-content {
        grid-template-columns: 1fr;
    }

    .photo-section {
        max-width: 450px;
        width: 100%;
        margin: 0 auto;
    }
}

@media (max-width: 600px) {
    .detail-page {
        padding: 22px 16px 35px;
    }

    .header-content {
        align-items: flex-start;
        flex-direction: column;
    }

    .btn-back {
        width: 100%;
        justify-content: center;
    }

    .detail-content {
        padding: 20px;
    }

    .info-item {
        grid-template-columns: 1fr;
    }

    .info-label {
        min-height: 35px;
    }

    .info-value {
        min-height: 40px;
        display: flex;
        align-items: center;
    }

    .detail-actions {
        padding: 15px 20px;
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn-cancel,
    .btn-edit {
        width: 100%;
    }
}
</style>

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection