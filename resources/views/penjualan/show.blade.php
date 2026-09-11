@extends('layouts.app')
@section('title', 'Detail Penjualan')
@section('content')
<style>
.detail-penjualan {
margin-top: 30px;
}
.detail-header {
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 25px;
}
.detail-breadcrumb {
display: flex;
align-items: center;
gap: 8px;
color: #8A929E;
font-size: 12px;
margin-bottom: 7px;
}
.detail-breadcrumb i {
font-size: 9px;
}
.detail-title {
margin: 0;
color: #20242C;
font-size: 27px;
font-weight: 700;
letter-spacing: -0.5px;
}
.detail-subtitle {
margin: 5px 0 0;
color: #8A929E;
font-size: 13px;
}
.btn-kembali {
display: inline-flex;
align-items: center;
gap: 7px;
height: 38px;
padding: 0 16px;
background: #FFFFFF;
color: #4B5563;
border: 1px solid #DDE2E7;
border-radius: 8px;
font-size: 12px;
font-weight: 600;
text-decoration: none;
transition: all .2s ease;
}
.btn-kembali:hover {
background: #F3F4F6;
color: #20242C;
border-color: #C9CED5;
}
.detail-main-card {
display: grid;
grid-template-columns: 34% 66%;
background: #FFFFFF;
border: 1px solid #E1E5E9;
border-radius: 14px;
overflow: hidden;
}
.detail-info-section {
border-right: 1px solid #EEF0F2;
}
.detail-section-header {
padding: 20px 22px;
border-bottom: 1px solid #EEF0F2;
}
.detail-card-title {
margin: 0;
color: #20242C;
font-size: 15px;
font-weight: 700;
}
.detail-card-subtitle {
margin: 4px 0 0;
color: #8A929E;
font-size: 11px;
}
.detail-info-body {
padding: 24px 22px;
}
.info-item {
margin-bottom: 25px;
}
.info-item:last-child {
margin-bottom: 0;
}
.info-label {
display: block;
margin-bottom: 7px;
color: #8A929E;
font-size: 10px;
font-weight: 700;
text-transform: uppercase;
letter-spacing: .5px;
}
.info-value {
color: #20242C;
font-size: 13px;
font-weight: 600;
}
.info-badge {
display: inline-flex;
align-items: center;
padding: 5px 10px;
border-radius: 7px;
font-size: 10px;
font-weight: 700;
}
.info-badge.payment {
background: #F3F4F6;
color: #374151;
border: 1px solid #E1E5E9;
}
.info-badge.completed {
background: #ECFDF5;
color: #047857;
border: 1px solid #D1FAE5;
}
.info-badge.open {
background: #FFFBEB;
color: #92400E;
border: 1px solid #FDE68A;
}
.info-badge.other {
background: #F3F4F6;
color: #4B5563;
border: 1px solid #E5E7EB;
}
.detail-product-section {
min-width: 0;
}
.product-header {
display: flex;
justify-content: space-between;
align-items: center;
gap: 20px;
}
.product-total {
display: flex;
align-items: center;
gap: 8px;
color: #8A929E;
font-size: 11px;
white-space: nowrap;
}
.product-total strong {
color: #20242C;
font-size: 15px;
}
.detail-table-wrapper {
width: 100%;
overflow-x: auto;
}
.detail-table {
width: 100%;
min-width: 600px;
margin: 0;
table-layout: fixed;
}
.detail-table thead th {
background: #F8F9FA;
color: #8A929E;
border-bottom: 1px solid #E5E7EB;
padding: 13px 16px;
font-size: 10px;
font-weight: 700;
text-transform: uppercase;
letter-spacing: .5px;
white-space: nowrap;
}
.detail-table tbody td {
padding: 18px 16px;
color: #4B5563;
border-color: #F0F1F3;
font-size: 13px;
vertical-align: middle;
}
.detail-table tbody tr {
transition: background .15s ease;
}
.detail-table tbody tr:hover {
background: #FAFBFC;
}
.detail-table th:nth-child(1),
.detail-table td:nth-child(1) {
width: 10%;
text-align: center;
}
.detail-table th:nth-child(2),
.detail-table td:nth-child(2) {
width: 32%;
text-align: left;
}
.detail-table th:nth-child(3),
.detail-table td:nth-child(3) {
width: 23%;
text-align: right;
}
.detail-table th:nth-child(4),
.detail-table td:nth-child(4) {
width: 15%;
text-align: center;
}
.detail-table th:nth-child(5),
.detail-table td:nth-child(5) {
width: 20%;
text-align: right;
}
.product-number {
color: #8A929E;
font-size: 12px;
}
.product-name {
color: #20242C;
font-weight: 600;
}
.price {
color: #4B5563;
white-space: nowrap;
}
.quantity {
color: #20242C;
font-weight: 600;
}
.subtotal {
color: #20242C;
font-weight: 700;
white-space: nowrap;
}
.detail-payment-footer {
padding: 18px 20px;
background: #FAFBFC;
border-top: 1px solid #EEF0F2;
}
.payment-row {
display: flex;
justify-content: flex-end;
align-items: center;
gap: 20px;
padding: 7px 0;
}
.payment-label {
color: #6B7280;
font-size: 12px;
font-weight: 600;
}
.payment-value {
min-width: 150px;
color: #20242C;
font-size: 13px;
font-weight: 700;
text-align: right;
white-space: nowrap;
}
.payment-row.total {
padding-top: 5px;
}
.payment-row.total .payment-label {
color: #374151;
font-weight: 700;
}
.payment-row.total .payment-value {
color: #20242C;
font-size: 17px;
}
.payment-row.change {
margin-top: 4px;
padding-top: 12px;
border-top: 1px dashed #DDE2E7;
}
.payment-row.change .payment-label {
color: #047857;
}
.payment-row.change .payment-value {
color: #059669;
font-size: 16px;
}
.empty-state {
padding: 45px 20px !important;
color: #9AA1AB !important;
text-align: center;
font-size: 12px !important;
}
@media (max-width: 992px) {
.detail-main-card {
grid-template-columns: 1fr;
}
.detail-info-section {
border-right: none;
border-bottom: 1px solid #EEF0F2;
}
}
@media (max-width: 768px) {
.detail-header {
align-items: flex-start;
gap: 15px;
}
.detail-title {
font-size: 23px;
}
.detail-section-header,
.detail-info-body {
padding: 18px;
}
.product-header {
align-items: flex-start;
}
.detail-table thead th,
.detail-table tbody td {
padding: 12px 14px;
}
.detail-payment-footer {
padding: 15px;
}
.payment-row {
justify-content: space-between;
gap: 15px;
}
.payment-value {
min-width: auto;
}
}
</style>

<div class="container mt-4 detail-penjualan">
    <div class="detail-header">
        <div>
            <div class="detail-breadcrumb">
                <span>Penjualan</span>
                <i class="bi bi-chevron-right"></i>
                <span>Detail Penjualan</span>
            </div>
            <h2 class="detail-title">Detail Penjualan</h2>
            <p class="detail-subtitle">
                Informasi lengkap transaksi dan produk yang dibeli.
            </p>
        </div>
        <a href="{{ route('penjualan.index') }}" class="btn-kembali">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>

    <div class="detail-main-card">
        <div class="detail-info-section">
            <div class="detail-section-header">
                <h5 class="detail-card-title">
                    Informasi Transaksi
                </h5>
                <p class="detail-card-subtitle">
                    Detail transaksi penjualan yang tersimpan dalam sistem.
                </p>
            </div>

            <div class="detail-info-body">
                <div class="info-item">
                    <span class="info-label">
                        Tanggal Transaksi
                    </span>
                    <span class="info-value">
                        {{ $penjualan->created_at->translatedFormat('d F Y, H:i') }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="info-label">
                        Kasir
                    </span>
                    <span class="info-value">
                        {{ $penjualan->user->name }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="info-label">
                        Metode Pembayaran
                    </span>
                    <span class="info-badge payment">
                        @if($penjualan->metode_pembayaran === 'CASH')
                            <i class="bi bi-cash-stack me-1"></i>
                        @elseif($penjualan->metode_pembayaran === 'QRIS')
                            <i class="bi bi-qr-code me-1"></i>
                        @else
                            <i class="bi bi-credit-card me-1"></i>
                        @endif
                        {{ $penjualan->metode_pembayaran }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="info-label">
                        Status
                    </span>

                    @if($penjualan->status == 'COMPLETED')
                        <span class="info-badge completed">
                            <i class="bi bi-check-circle me-1"></i>
                            COMPLETED
                        </span>
                    @elseif($penjualan->status == 'OPEN')
                        <span class="info-badge open">
                            OPEN
                        </span>
                    @else
                        <span class="info-badge other">
                            {{ $penjualan->status }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="detail-product-section">
            <div class="detail-section-header">
                <div class="product-header">
                    <div>
                        <h5 class="detail-card-title">
                            Daftar Produk
                        </h5>
                        <p class="detail-card-subtitle">
                            Produk yang terdapat pada transaksi ini.
                        </p>
                    </div>

                    <div class="product-total">
                        <span>
                            Total
                        </span>
                        <strong>
                            Rp {{ number_format($penjualan->total_pembayaran, 0, ',', '.') }}
                        </strong>
                    </div>
                </div>
            </div>

            <div class="detail-table-wrapper">
                <table class="table detail-table align-middle">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Produk
                            </th>
                            <th>
                                Harga
                            </th>
                            <th>
                                Jumlah
                            </th>
                            <th>
                                Subtotal
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($penjualan->itemPenjualan as $index => $item)
                            <tr>
                                <td>
                                    <span class="product-number">
                                        {{ $index + 1 }}
                                    </span>
                                </td>

                                <td>
                                    <span class="product-name">
                                        {{ $item->produk->nama }}
                                    </span>
                                </td>

                                <td>
                                    <span class="price">
                                        Rp {{ number_format($item->produk->harga_jual, 0, ',', '.') }}
                                    </span>
                                </td>

                                <td>
                                    <span class="quantity">
                                        {{ $item->kuantitas }}
                                    </span>
                                </td>

                                <td>
                                    <span class="subtotal">
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">
                                    <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                    Belum ada produk pada transaksi ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="detail-payment-footer">
                <div class="payment-row total">
                    <span class="payment-label">
                        Total Pembayaran
                    </span>
                    <span class="payment-value">
                        Rp {{ number_format($penjualan->total_pembayaran, 0, ',', '.') }}
                    </span>
                </div>

                {{-- UANG TUNAI & KEMBALIAN HANYA DITAMPILKAN SETELAH CHECKOUT --}}
                @if($penjualan->metode_pembayaran === 'CASH' && $penjualan->status === 'COMPLETED')
                    <div class="payment-row">
                        <span class="payment-label">
                            Uang Tunai
                        </span>
                        <span class="payment-value">
                            Rp {{ number_format($penjualan->paid_amount ?? 0, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="payment-row change">
                        <span class="payment-label">
                            <i class="bi bi-arrow-return-left me-1"></i>
                            Kembalian
                        </span>
                        <span class="payment-value">
                            Rp {{ number_format(($penjualan->paid_amount ?? 0) - $penjualan->total_pembayaran, 0, ',', '.') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection