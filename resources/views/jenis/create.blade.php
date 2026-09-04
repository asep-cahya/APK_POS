@extends('layouts.app')

@section('title', 'Tambah Jenis')

@section('content')

<div class="jenis-page">
    <div class="jenis-container jenis-form-container">

        <!-- Header -->
        <div class="page-header">
            <div class="breadcrumb-custom">
                <span>Jenis</span>
                <i class="bi bi-chevron-right"></i>
                <span>Tambah</span>
            </div>

            <h2 class="page-title">Tambah Jenis</h2>

            <p class="page-description">
                Tambahkan jenis produk baru ke dalam sistem.
            </p>
        </div>

        <!-- Form Card -->
        <div class="form-card">

            <div class="form-header">
                <div class="header-icon">
                    <i class="bi bi-tags-fill"></i>
                </div>

                <div>
                    <h5>Informasi Jenis</h5>
                    <p>Isi informasi jenis produk dengan lengkap.</p>
                </div>
            </div>

            <form
                action="{{ route('jenis.store') }}"
                method="POST">

                @csrf

                <div class="form-body">

                    <!-- Nama Jenis -->
                    <div class="form-group">
                        <label for="nama_jenis">
                            Nama Jenis
                            <span>*</span>
                        </label>

                        <div class="input-wrapper">
                            <i class="bi bi-tag"></i>

                            <input
                                type="text"
                                id="nama_jenis"
                                name="nama_jenis"
                                value="{{ old('nama_jenis') }}"
                                class="@error('nama_jenis') input-error @enderror"
                                placeholder="Contoh: Makanan"
                                required>
                        </div>

                        @error('nama_jenis')
                            <div class="error-message">
                                <i class="bi bi-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Keterangan -->
                    <div class="form-group">
                        <label for="keterangan">
                            Keterangan
                            <small>(Opsional)</small>
                        </label>

                        <div class="textarea-wrapper">
                            <i class="bi bi-card-text"></i>

                            <textarea
                                id="keterangan"
                                name="keterangan"
                                rows="5"
                                class="@error('keterangan') input-error @enderror"
                                placeholder="Masukkan keterangan jenis produk...">{{ old('keterangan') }}</textarea>
                        </div>

                        @error('keterangan')
                            <div class="error-message">
                                <i class="bi bi-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <!-- Footer -->
                <div class="form-footer">
                    <a
                        href="{{ route('jenis.index') }}"
                        class="btn-back">

                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn-save">

                        <i class="bi bi-check-lg"></i>
                        Simpan Jenis
                    </button>
                </div>

            </form>
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

.jenis-form-container {
    max-width: 900px;
}

.page-header {
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

.form-card {
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    box-shadow: 0 5px 20px rgba(15, 23, 42, 0.04);
}

.form-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 20px 24px;
    border-bottom: 1px solid #edf0f3;
}

.header-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 10px;
    background: #ecfdf5;
    color: #10b981;
    font-size: 17px;
}

.form-header h5 {
    margin: 0 0 3px;
    color: #1f2937;
    font-size: 15px;
    font-weight: 700;
}

.form-header p {
    margin: 0;
    color: #9ca3af;
    font-size: 11px;
}

.form-body {
    padding: 25px 24px;
}

.form-group {
    margin-bottom: 22px;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #374151;
    font-size: 12px;
    font-weight: 600;
}

.form-group label span {
    margin-left: 2px;
    color: #ef4444;
}

.form-group label small {
    margin-left: 4px;
    color: #9ca3af;
    font-size: 10px;
    font-weight: 400;
}

.input-wrapper,
.textarea-wrapper {
    position: relative;
}

.input-wrapper > i,
.textarea-wrapper > i {
    position: absolute;
    left: 14px;
    color: #9ca3af;
    pointer-events: none;
}

.input-wrapper > i {
    top: 50%;
    transform: translateY(-50%);
}

.textarea-wrapper > i {
    top: 15px;
}

.input-wrapper input,
.textarea-wrapper textarea {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #dfe3e8;
    border-radius: 9px;
    outline: none;
    background: #ffffff;
    color: #1f2937;
    font-size: 12px;
    transition: 0.2s ease;
}

.input-wrapper input {
    height: 44px;
    padding: 0 14px 0 40px;
}

.textarea-wrapper textarea {
    min-height: 120px;
    padding: 13px 14px 13px 40px;
    line-height: 1.6;
    resize: vertical;
}

.input-wrapper input::placeholder,
.textarea-wrapper textarea::placeholder {
    color: #b8bec7;
}

.input-wrapper input:focus,
.textarea-wrapper textarea:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

.input-error {
    border-color: #ef4444 !important;
}

.error-message {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 6px;
    color: #ef4444;
    font-size: 11px;
}

.form-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 8px;
    padding: 17px 24px;
    border-top: 1px solid #edf0f3;
    background: #fafbfc;
}

.btn-back,
.btn-save {
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 0 16px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.2s ease;
    cursor: pointer;
}

.btn-back {
    border: 1px solid #dfe3e8;
    background: #ffffff;
    color: #4b5563;
}

.btn-back:hover {
    background: #f3f4f6;
    color: #1f2937;
}

.btn-save {
    border: 1px solid #111827;
    background: #111827;
    color: #ffffff;
}

.btn-save:hover {
    border-color: #10b981;
    background: #10b981;
    color: #ffffff;
    transform: translateY(-1px);
}

@media (max-width: 768px) {
    .jenis-page {
        padding: 25px 16px 40px;
    }

    .page-title {
        font-size: 24px;
    }

    .form-header,
    .form-body {
        padding: 20px;
    }

    .form-footer {
        padding: 15px 20px;
    }
}

@media (max-width: 500px) {
    .form-footer {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn-back,
    .btn-save {
        width: 100%;
    }
}
</style>

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

@endsection