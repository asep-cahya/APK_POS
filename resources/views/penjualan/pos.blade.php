@extends('layouts.app')
@section('title', 'POS')
@section('content')
<div class="pos-page">
    <div class="pos-container">

        @if(session('errors'))
            <div class="pos-alert">
                <i class="bi bi-exclamation-circle"></i>
                <span>{{ session('errors') }}</span>
            </div>
        @endif

        <div class="pos-header">
            <div>
                <div class="breadcrumb-custom">
                    <span>Penjualan</span>
                    <i class="bi bi-chevron-right"></i>
                    <span>POS</span>
                </div>

                <h2 class="pos-title">Tambah Penjualan</h2>
                <p class="pos-description">
                    Tambahkan produk ke keranjang dan lakukan transaksi penjualan.
                </p>
            </div>

            <a href="{{ route('penjualan.index') }}" class="btn-back-pos">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>
        </div>

        <div class="pos-grid">

            {{-- =========================
                 DAFTAR PRODUK
            ========================== --}}
            <div class="product-card">
                <div class="card-header-custom">
                    <div class="card-header-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div>
                        <h5>Daftar Produk</h5>
                        <p>Pilih produk untuk ditambahkan ke keranjang.</p>
                    </div>
                </div>

                <div class="card-body-custom">

                    <form method="GET"
                          action="{{ route('penjualan.create') }}"
                          class="search-form">

                        <div class="search-wrapper">
                            <i class="bi bi-search"></i>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Cari produk..."
                                autocomplete="off"
                            >
                        </div>

                        <button type="submit" class="btn-search">
                            <i class="bi bi-search"></i>
                            Cari
                        </button>
                    </form>

                    <div class="product-list">

                        @forelse($products as $product)

                            <form method="POST"
                                  action="{{ route('itempenjualan.store') }}"
                                  class="product-form-item">

                                @csrf

                                <input
                                    type="hidden"
                                    name="product_id"
                                    value="{{ $product->id }}"
                                >

                                <div class="product-item">

                                    <div class="product-image-wrapper">

                                        @if($product->foto)

                                            <img
                                                src="{{ asset('storage/'.$product->foto) }}"
                                                class="product-image"
                                                alt="{{ $product->nama }}"
                                            >

                                        @else

                                            <div class="no-product-image">
                                                <i class="bi bi-image"></i>
                                            </div>

                                        @endif

                                    </div>

                                    <div class="product-info">
                                        <h6>{{ $product->nama }}</h6>

                                        <span>
                                            Rp {{ number_format($product->harga_jual,0,',','.') }}
                                        </span>
                                    </div>

                                    <div class="quantity-wrapper">
                                        <label>Qty</label>

                                        <input
                                            type="number"
                                            name="quantity"
                                            value="1"
                                            min="1"
                                            {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                        >
                                    </div>

                                    <button
                                        type="submit"
                                        class="btn-add-product"
                                        {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                    >
                                        <i class="bi bi-plus-lg"></i>
                                    </button>

                                </div>
                            </form>

                        @empty

                            <div class="empty-product">
                                <i class="bi bi-box-seam"></i>
                                <p>Produk tidak ditemukan.</p>
                            </div>

                        @endforelse

                    </div>
                </div>
            </div>


            {{-- =========================
                 KERANJANG
            ========================== --}}
            <div class="cart-card">

                <div class="card-header-custom">

                    <div class="card-header-icon">
                        <i class="bi bi-cart3"></i>
                    </div>

                    <div>
                        <h5>Keranjang Belanja</h5>
                        <p>Daftar produk yang akan diproses.</p>
                    </div>

                </div>

                <div class="cart-body">

                    <div class="cart-table-wrapper">

                        <table class="cart-table">

                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($sale->itemPenjualan as $item)

                                    <tr>

                                        <td>
                                            <div class="cart-product-name">
                                                <span>
                                                    {{ $item->produk->nama }}
                                                </span>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="cart-price">
                                                Rp {{ number_format($item->produk->harga_jual,0,',','.') }}
                                            </span>
                                        </td>

                                        <td>

                                            <form
                                                method="POST"
                                                action="{{ route('itempenjualan.update',$item->id) }}"
                                                class="quantity-form"
                                            >

                                                @csrf
                                                @method('PUT')

                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    value="{{ $item->kuantitas }}"
                                                    min="1"
                                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                                >

                                                @if($sale->status !== 'COMPLETED')

                                                    <button
                                                        type="submit"
                                                        class="btn-update-quantity"
                                                        title="Update jumlah"
                                                    >
                                                        <i class="bi bi-check"></i>
                                                    </button>

                                                @endif

                                            </form>

                                        </td>

                                        <td>
                                            <span class="cart-subtotal">
                                                Rp {{ number_format($item->subtotal,0,',','.') }}
                                            </span>
                                        </td>

                                        <td>

                                            @can('delete',$item)

                                                <form
                                                    method="POST"
                                                    action="{{ route('itempenjualan.destroy',$item->id) }}"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn-delete-item"
                                                        title="Hapus item"
                                                        {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                                    >
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                </form>

                                            @endcan

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5" class="empty-cart">

                                            <i class="bi bi-cart-x"></i>

                                            <span>
                                                Belum ada item di keranjang.
                                            </span>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- =========================
                     CART FOOTER
                ========================== --}}
                <div class="cart-footer">

                    <div class="total-row">

                        <div>

                            <span class="total-label">
                                Total Pembayaran
                            </span>

                            <small>
                                {{ $sale->itemPenjualan->count() }}
                                item dalam keranjang
                            </small>

                        </div>

                        <strong>
                            Rp {{ number_format($sale->total_pembayaran,0,',','.') }}
                        </strong>

                    </div>


                    {{-- =========================
                         CHECKOUT
                    ========================== --}}
                    <div class="checkout-section">

                        <form
                            method="POST"
                            action="{{ route('penjualan.update',$sale->id) }}"
                            onsubmit="return confirm('Yakin ingin checkout?')"
                        >

                            @csrf
                            @method('PUT')

                            <label for="payment_method">
                                Metode Pembayaran
                            </label>

                            <div class="payment-wrapper">

                                <i class="bi bi-credit-card"></i>

                                <select
                                    id="payment_method"
                                    name="payment_method"
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                    required
                                >

                                    <option value="">
                                        Pilih metode pembayaran
                                    </option>

                                    <option value="CASH">
                                        Cash
                                    </option>

                                    <option value="QRIS">
                                        QRIS
                                    </option>

                                </select>

                            </div>


                            {{-- =========================
                                 FITUR PEMBAYARAN CASH
                            ========================== --}}
                            <div
                                id="cash-payment-section"
                                style="display: none;"
                            >

                                <label for="paid_amount">
                                    Nominal Uang
                                </label>

                                <div class="payment-wrapper">

                                    <i class="bi bi-cash-stack"></i>

                                    <input
                                        type="number"
                                        id="paid_amount"
                                        name="paid_amount"
                                        min="{{ $sale->total_pembayaran }}"
                                        placeholder="Masukkan nominal uang"
                                        {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                    >

                                </div>


                                {{-- KEMBALIAN --}}
                                <div class="change-wrapper">

                                    <div>

                                        <span>
                                            Kembalian
                                        </span>

                                        <small>
                                            Uang dibayar - Total pembayaran
                                        </small>

                                    </div>

                                    <strong id="change_amount">
                                        Rp 0
                                    </strong>

                                </div>

                            </div>


                            <button
                                type="submit"
                                class="btn-checkout"
                                {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                            >

                                <i class="bi bi-check-circle"></i>

                                Bayar

                            </button>

                        </form>


                        @can('delete',$sale)

                            <form
                                method="POST"
                                action="{{ route('penjualan.destroy',$sale->id) }}"
                                onsubmit="return confirm('Yakin ingin membatalkan transaksi?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-cancel-transaction"
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                >

                                    <i class="bi bi-x-circle"></i>

                                    Batalkan Transaksi

                                </button>

                            </form>

                        @endcan

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>


<style>

/* =========================
   POS PAGE
========================= */

.pos-page {
    min-height: calc(100vh - 70px);
    background: #f5f7fa;
    padding: 40px 30px 60px;
}

.pos-container {
    width: 100%;
    max-width: 1250px;
    margin: 0 auto;
}
/* =========================
   HEADER
========================= */
.pos-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 20px;
    margin-bottom: 28px;
}

.breadcrumb-custom {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
    color: #9ca3af;
    font-size: 13px;
}

.breadcrumb-custom i {
    font-size: 10px;
}

.pos-title {
    margin: 0;
    color: #1f2937;
    font-size: 30px;
    font-weight: 700;
    letter-spacing: -0.5px;
}

.pos-description {
    margin: 7px 0 0;
    color: #6b7280;
    font-size: 14px;
}


/* =========================
   BACK BUTTON
========================= */

.btn-back-pos {
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 0 17px;
    background: #ffffff;
    color: #4b5563;
    border: 1px solid #dfe3e8;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all .2s ease;
}

.btn-back-pos:hover {
    background: #f3f4f6;
    color: #1f2937;
}


/* =========================
   ALERT
========================= */

.pos-alert {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 20px;
    padding: 12px 15px;
    background: #fef2f2;
    color: #b91c1c;
    border: 1px solid #fecaca;
    border-radius: 10px;
    font-size: 13px;
}


/* =========================
   GRID
========================= */

.pos-grid {
    display: grid;
    grid-template-columns: minmax(0, .95fr) minmax(0, 1.25fr);
    gap: 22px;
    align-items: start;
}


/* =========================
   CARD
========================= */

.product-card,
.cart-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    overflow: hidden;
}

.card-header-custom {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 21px 23px;
    border-bottom: 1px solid #edf0f3;
}

.card-header-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #e8f8f3;
    color: #10b981;
    border-radius: 10px;
    font-size: 17px;
}

.card-header-custom h5 {
    margin: 0 0 3px;
    color: #1f2937;
    font-size: 15px;
    font-weight: 700;
}

.card-header-custom p {
    margin: 0;
    color: #9ca3af;
    font-size: 12px;
}


/* =========================
   PRODUCT
========================= */

.card-body-custom {
    padding: 20px;
}

.search-form {
    display: flex;
    gap: 8px;
    margin-bottom: 18px;
}

.search-wrapper {
    position: relative;
    flex: 1;
}

.search-wrapper i {
    position: absolute;
    top: 50%;
    left: 14px;
    z-index: 2;
    color: #9ca3af;
    transform: translateY(-50%);
    pointer-events: none;
}

.search-wrapper input {
    width: 100%;
    height: 43px;
    padding: 0 14px 0 40px;
    border: 1px solid #dfe3e8;
    border-radius: 9px;
    outline: none;
    color: #1f2937;
    background: #ffffff;
    font-size: 13px;
    transition: all .2s ease;
}

.search-wrapper input::placeholder {
    color: #b8bec7;
}

.search-wrapper input:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16,185,129,.10);
}

.btn-search {
    height: 43px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 0 16px;
    background: #111827;
    color: #ffffff;
    border: 1px solid #111827;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all .2s ease;
}

.btn-search:hover {
    background: #10b981;
    border-color: #10b981;
}

.product-list {
    max-height: 67vh;
    overflow-y: auto;
    padding-right: 3px;
}

.product-form-item {
    margin-bottom: 10px;
}

.product-form-item:last-child {
    margin-bottom: 0;
}

.product-item {
    display: grid;
    grid-template-columns: 58px minmax(0,1fr) 70px 40px;
    align-items: center;
    gap: 12px;
    padding: 12px;
    border: 1px solid #e8ebef;
    border-radius: 11px;
    background: #ffffff;
    transition: all .2s ease;
}

.product-item:hover {
    border-color: #d5dbe2;
    background: #fafbfc;
}

.product-image-wrapper {
    width: 58px;
    height: 58px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border: 1px solid #e5e7eb;
    border-radius: 9px;
    background: #f8fafb;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-product-image {
    color: #b8bec7;
    font-size: 20px;
}

.product-info {
    min-width: 0;
}

.product-info h6 {
    overflow: hidden;
    margin: 0 0 5px;
    color: #1f2937;
    font-size: 13px;
    font-weight: 600;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.product-info span {
    color: #10b981;
    font-size: 12px;
    font-weight: 700;
}

.quantity-wrapper label {
    display: block;
    margin-bottom: 4px;
    color: #9ca3af;
    font-size: 9px;
    font-weight: 600;
    text-transform: uppercase;
}

.quantity-wrapper input {
    width: 100%;
    height: 34px;
    padding: 0 6px;
    border: 1px solid #dfe3e8;
    border-radius: 7px;
    outline: none;
    text-align: center;
    color: #1f2937;
    font-size: 12px;
}

.quantity-wrapper input:focus {
    border-color: #10b981;
}

.btn-add-product {
    width: 38px;
    height: 38px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #111827;
    color: #ffffff;
    border: 1px solid #111827;
    border-radius: 8px;
    cursor: pointer;
    transition: all .2s ease;
}

.btn-add-product:hover {
    background: #10b981;
    border-color: #10b981;
}

.btn-add-product:disabled,
.btn-checkout:disabled,
.btn-cancel-transaction:disabled,
.btn-delete-item:disabled {
    opacity: .5;
    cursor: not-allowed;
}


/* =========================
   EMPTY PRODUCT
========================= */

.empty-product {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 180px;
    color: #9ca3af;
    text-align: center;
}

.empty-product i {
    margin-bottom: 8px;
    font-size: 28px;
}

.empty-product p {
    margin: 0;
    font-size: 12px;
}


/* =========================
   CART
========================= */

.cart-body {
    padding: 0 20px;
}

.cart-table-wrapper {
    max-height: 48vh;
    overflow: auto;
}

.cart-table {
    width: 100%;
    margin: 0;
    border-collapse: collapse;
}

.cart-table th {
    padding: 13px 9px;
    background: #f8f9fa;
    border-bottom: 1px solid #e5e7eb;
    color: #8a929e;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .4px;
    text-transform: uppercase;
    white-space: nowrap;
}

.cart-table td {
    padding: 13px 9px;
    border-bottom: 1px solid #f0f1f3;
    color: #4b5563;
    font-size: 11px;
    vertical-align: middle;
}

.cart-table tbody tr:last-child td {
    border-bottom: none;
}

.cart-product-name span {
    display: block;
    max-width: 145px;
    overflow: hidden;
    color: #1f2937;
    font-weight: 600;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.cart-price {
    color: #6b7280;
    white-space: nowrap;
}

.cart-subtotal {
    color: #1f2937;
    font-weight: 700;
    white-space: nowrap;
}


/* =========================
   QUANTITY
========================= */

.quantity-form {
    display: flex;
    align-items: center;
    gap: 4px;
}

.quantity-form input {
    width: 52px;
    height: 31px;
    padding: 0 5px;
    border: 1px solid #dfe3e8;
    border-radius: 7px;
    outline: none;
    text-align: center;
    font-size: 11px;
}

.quantity-form input:focus {
    border-color: #10b981;
}

.btn-update-quantity {
    width: 27px;
    height: 27px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #ecfdf5;
    color: #047857;
    border: 1px solid #d1fae5;
    border-radius: 6px;
    cursor: pointer;
    font-size: 11px;
}

.btn-update-quantity:hover {
    background: #d1fae5;
}


/* =========================
   DELETE
========================= */

.btn-delete-item {
    width: 30px;
    height: 30px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #fef2f2;
    color: #b91c1c;
    border: 1px solid #fecaca;
    border-radius: 7px;
    cursor: pointer;
    font-size: 12px;
    transition: all .2s ease;
}

.btn-delete-item:hover {
    background: #fee2e2;
}


/* =========================
   EMPTY CART
========================= */

.empty-cart {
    height: 170px;
    color: #9ca3af !important;
    text-align: center;
}

.empty-cart i {
    display: block;
    margin-bottom: 7px;
    font-size: 25px;
}

.empty-cart span {
    font-size: 12px;
}


/* =========================
   FOOTER
========================= */

.cart-footer {
    padding: 20px;
    background: #fafbfc;
    border-top: 1px solid #edf0f3;
}

.total-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 20px;
}

.total-label {
    display: block;
    color: #374151;
    font-size: 13px;
    font-weight: 700;
}

.total-row small {
    display: block;
    margin-top: 3px;
    color: #9ca3af;
    font-size: 10px;
}

.total-row strong {
    color: #10b981;
    font-size: 19px;
    white-space: nowrap;
}


/* =========================
   CHECKOUT
========================= */

.checkout-section label {
    display: block;
    margin-bottom: 7px;
    color: #374151;
    font-size: 12px;
    font-weight: 600;
}

.payment-wrapper {
    position: relative;
    margin-bottom: 10px;
}

.payment-wrapper i {
    position: absolute;
    top: 50%;
    left: 14px;
    z-index: 2;
    color: #9ca3af;
    transform: translateY(-50%);
    pointer-events: none;
}

.payment-wrapper select {
    width: 100%;
    height: 43px;
    padding: 0 14px 0 40px;
    border: 1px solid #dfe3e8;
    border-radius: 9px;
    outline: none;
    background: #ffffff;
    color: #374151;
    font-size: 12px;
    cursor: pointer;
}

.payment-wrapper select:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16,185,129,.10);
}


/* =========================
   TAMBAHAN FITUR CASH
========================= */

#cash-payment-section {
    margin-top: 12px;
}

#cash-payment-section .payment-wrapper {
    margin-bottom: 10px;
}

#cash-payment-section .payment-wrapper input {
    width: 100%;
    height: 43px;
    padding: 0 14px 0 40px;
    border: 1px solid #dfe3e8;
    border-radius: 9px;
    outline: none;
    background: #ffffff;
    color: #374151;
    font-size: 12px;
    transition: all .2s ease;
}

#cash-payment-section .payment-wrapper input:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16,185,129,.10);
}


/* =========================
   KEMBALIAN
========================= */

.change-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 10px;
    padding: 12px 14px;
    background: #ecfdf5;
    border: 1px solid #d1fae5;
    border-radius: 9px;
}

.change-wrapper span {
    display: block;
    color: #047857;
    font-size: 12px;
    font-weight: 700;
}

.change-wrapper small {
    display: block;
    margin-top: 3px;
    color: #6b7280;
    font-size: 9px;
}

.change-wrapper strong {
    color: #059669;
    font-size: 15px;
    white-space: nowrap;
}


/* =========================
   BUTTON CHECKOUT
========================= */

.btn-checkout,
.btn-cancel-transaction {
    width: 100%;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all .2s ease;
}

.btn-checkout {
    background: #111827;
    color: #ffffff;
    border: 1px solid #111827;
}

.btn-checkout:hover {
    background: #10b981;
    border-color: #10b981;
    box-shadow: 0 5px 15px rgba(16,185,129,.18);
    transform: translateY(-1px);
}

.btn-cancel-transaction {
    margin-top: 8px;
    background: #ffffff;
    color: #4b5563;
    border: 1px solid #dfe3e8;
}

.btn-cancel-transaction:hover {
    background: #fef2f2;
    color: #b91c1c;
    border-color: #fecaca;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 1050px) {

    .pos-grid {
        grid-template-columns: 1fr;
    }

    .product-list {
        max-height: 500px;
    }

    .cart-table-wrapper {
        max-height: none;
    }

}


@media (max-width: 700px) {

    .pos-page {
        padding: 25px 15px 40px;
    }

    .pos-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .pos-title {
        font-size: 25px;
    }

    .btn-back-pos {
        width: 100%;
    }

    .product-item {
        grid-template-columns: 50px minmax(0,1fr) 60px 38px;
        gap: 8px;
    }

    .product-image-wrapper {
        width: 50px;
        height: 50px;
    }

    .card-header-custom {
        padding: 18px;
    }

    .card-body-custom,
    .cart-footer {
        padding: 18px;
    }

    .cart-body {
        padding: 0 12px;
    }

    .cart-table {
        min-width: 650px;
    }

    .cart-table-wrapper {
        overflow-x: auto;
    }

}


@media (max-width: 480px) {

    .search-form {
        flex-direction: column;
    }

    .btn-search {
        width: 100%;
    }

    .product-item {
        grid-template-columns: 48px minmax(0,1fr) 52px 36px;
    }

    .product-info h6 {
        font-size: 11px;
    }

    .product-info span {
        font-size: 10px;
    }

    .quantity-wrapper input {
        height: 32px;
    }

}

</style>


<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const paymentMethod = document.getElementById('payment_method');
    const cashSection = document.getElementById('cash-payment-section');
    const paidAmount = document.getElementById('paid_amount');
    const changeAmount = document.getElementById('change_amount');

    const totalPayment = {{ $sale->total_pembayaran }};


    // Format angka menjadi Rupiah
    function formatRupiah(number) {

        return 'Rp ' + Number(number).toLocaleString('id-ID');

    }


    // Menampilkan / menyembunyikan fitur Cash
    function updateCashSection() {

        if (paymentMethod.value === 'CASH') {

            cashSection.style.display = 'block';

            if (paidAmount) {
                paidAmount.required = true;
            }

        } else {

            cashSection.style.display = 'none';

            if (paidAmount) {
                paidAmount.required = false;
                paidAmount.value = '';
            }

            changeAmount.textContent = 'Rp 0';
            changeAmount.style.color = '#059669';
        }

    }


    // Menghitung kembalian
    function calculateChange() {

        const paid = Number(paidAmount.value) || 0;

        const change = paid - totalPayment;


        if (paid === 0) {

            changeAmount.textContent = 'Rp 0';
            changeAmount.style.color = '#059669';

        } else if (change >= 0) {

            changeAmount.textContent = formatRupiah(change);
            changeAmount.style.color = '#059669';

        } else {

            changeAmount.textContent =
                'Uang kurang ' + formatRupiah(Math.abs(change));

            changeAmount.style.color = '#dc2626';

        }

    }


    // Saat metode pembayaran berubah
    paymentMethod.addEventListener('change', function () {

        updateCashSection();

    });


    // Saat nominal uang berubah
    paidAmount.addEventListener('input', function () {

        calculateChange();

    });


    // Jalankan saat halaman pertama kali dibuka
    updateCashSection();

});
</script>

@endsection
