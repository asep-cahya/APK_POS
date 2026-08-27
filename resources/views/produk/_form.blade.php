<div class="product-form">
    <div class="product-content">
        <!-- FOTO PRODUK -->
        <div class="photo-section">
            <div class="photo-card">
                <div class="section-title">
                    <div class="section-icon">
                        <i class="bi bi-image"></i>
                    </div>
                    <div>
                        <h6>Foto Produk</h6>
                        <p>Tambahkan foto produk</p>
                    </div>
                </div>

                @if (!empty($produk->foto))
                    <div class="image-preview-wrapper">
                        <img
                            src="{{ asset('storage/' . $produk->foto) }}"
                            class="product-image"
                            alt="Foto Produk">
                    </div>
                @endif

                <div id="newPreviewWrapper" class="image-preview-wrapper" style="display:none;">
                    <img id="preview" class="product-image" alt="Preview Foto">
                </div>

                <label class="upload-box">
                    <i class="bi bi-cloud-arrow-up"></i>
                    <span>Pilih foto produk</span>
                    <small>JPG, JPEG, PNG</small>
                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        onchange="previewImage(this)"
                        class="@error('foto') is-invalid @enderror">
                </label>

                @error('foto')
                    <div class="error-message">
                        <i class="bi bi-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- INFORMASI PRODUK -->
        <div class="info-section">
            <div class="section-title">
                <div class="section-icon">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div>
                    <h6>Informasi Produk</h6>
                    <p>Lengkapi data produk</p>
                </div>
            </div>

            <div class="form-grid">
                <!-- Nama Produk -->
                <div class="form-group full-width">
                    <label for="name">
                        Nama Produk <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="bi bi-box"></i>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="@error('name') input-error @enderror"
                            value="{{ old('name', $produk->nama ?? '') }}"
                            placeholder="Masukkan nama produk">
                    </div>

                    @error('name')
                        <div class="error-message">
                            <i class="bi bi-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Jenis Produk -->
                <div class="form-group full-width">
                    <label for="jenis_id">
                        Jenis Produk <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="bi bi-tags"></i>
                        <select
                            id="jenis_id"
                            name="jenis_id"
                            class="@error('jenis_id') input-error @enderror">
                            <option value="">Pilih jenis produk</option>
                            @foreach($jenis as $item)
                                <option
                                    value="{{ $item->id }}"
                                    {{ old('jenis_id', $produk->jenis_id ?? '') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @error('jenis_id')
                        <div class="error-message">
                            <i class="bi bi-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Harga Beli -->
                <div class="form-group">
                    <label for="purchase_price">
                        Harga Beli <span>*</span>
                    </label>

                    <div class="price-input">
                        <span>Rp</span>
                        <input
                            type="number"
                            id="purchase_price"
                            name="purchase_price"
                            class="@error('purchase_price') input-error @enderror"
                            value="{{ old('purchase_price', $produk->harga_beli ?? '') }}"
                            placeholder="0">
                    </div>

                    @error('purchase_price')
                        <div class="error-message">
                            <i class="bi bi-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Harga Jual -->
                <div class="form-group">
                    <label for="selling_price">
                        Harga Jual <span>*</span>
                    </label>

                    <div class="price-input">
                        <span>Rp</span>
                        <input
                            type="number"
                            id="selling_price"
                            name="selling_price"
                            class="@error('selling_price') input-error @enderror"
                            value="{{ old('selling_price', $produk->harga_jual ?? '') }}"
                            placeholder="0">
                    </div>

                    @error('selling_price')
                        <div class="error-message">
                            <i class="bi bi-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Stok -->
                <div class="form-group full-width">
                    <label for="stok">
                        Jumlah Stok <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="bi bi-boxes"></i>
                        <input
                            type="number"
                            id="stok"
                            name="stok"
                            class="@error('stok') input-error @enderror"
                            value="{{ old('stok', $produk->stok ?? '') }}"
                            placeholder="Masukkan jumlah stok">
                    </div>

                    @error('stok')
                        <div class="error-message">
                            <i class="bi bi-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- ACTION -->
    <div class="product-actions">
        <a href="{{ route('produk.index') }}" class="btn-back">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

        <button type="submit" class="btn-save">
            <i class="bi bi-check-lg"></i>
            Simpan Produk
        </button>
    </div>
</div>

<style>
.product-form {
    width: 100%;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
}

.product-content {
    display: grid;
    grid-template-columns: 300px minmax(0, 1fr);
    gap: 30px;
    padding: 30px;
}

.photo-card {
    height: 100%;
    padding: 22px;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    background: #f9fafb;
}

.section-title {
    display: flex;
    align-items: center;
    gap: 11px;
    margin-bottom: 20px;
}

.section-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 10px;
    background: #ecfdf5;
    color: #10b981;
    font-size: 16px;
}

.section-title h6 {
    margin: 0 0 3px;
    font-size: 15px;
    font-weight: 700;
    color: #1f2937;
}

.section-title p {
    margin: 0;
    font-size: 11px;
    color: #9ca3af;
}

.image-preview-wrapper {
    width: 100%;
    height: 190px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin-bottom: 14px;
    border: 1px solid #e5e7eb;
    border-radius: 11px;
    background: #fff;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 8px;
}

.upload-box {
    width: 100%;
    min-height: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 4px;
    border: 1.5px dashed #cfd5dc;
    border-radius: 11px;
    background: #fff;
    cursor: pointer;
    transition: .2s;
}

.upload-box:hover {
    border-color: #10b981;
    background: #f0fdf8;
}

.upload-box i {
    font-size: 23px;
    color: #10b981;
}

.upload-box span {
    font-size: 12px;
    font-weight: 600;
    color: #374151;
}

.upload-box small {
    font-size: 10px;
    color: #9ca3af;
}

.upload-box input {
    display: none;
}

.info-section {
    min-width: 0;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 19px 18px;
}

.form-group {
    min-width: 0;
}

.full-width {
    grid-column: span 2;
}

.form-group label {
    display: block;
    margin-bottom: 7px;
    font-size: 12px;
    font-weight: 600;
    color: #374151;
}

.form-group label span {
    color: #ef4444;
}

.input-wrapper {
    position: relative;
}

.input-wrapper > i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    pointer-events: none;
    z-index: 2;
}

.input-wrapper input,
.input-wrapper select {
    width: 100%;
    height: 44px;
    padding: 0 13px 0 40px;
    border: 1px solid #dfe3e8;
    border-radius: 9px;
    outline: none;
    background: #fff;
    color: #1f2937;
    font-size: 12px;
    transition: .2s;
}

.input-wrapper input::placeholder {
    color: #b8bec7;
}

.input-wrapper input:focus,
.input-wrapper select:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, .08);
}

.input-wrapper select {
    cursor: pointer;
}

.price-input {
    display: flex;
    height: 44px;
    border: 1px solid #dfe3e8;
    border-radius: 9px;
    overflow: hidden;
    background: #fff;
    transition: .2s;
}

.price-input:focus-within {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, .08);
}

.price-input span {
    display: flex;
    align-items: center;
    padding: 0 13px;
    background: #f8fafb;
    border-right: 1px solid #e5e7eb;
    color: #6b7280;
    font-size: 12px;
    font-weight: 600;
}

.price-input input {
    width: 100%;
    min-width: 0;
    border: 0;
    outline: 0;
    padding: 0 12px;
    font-size: 12px;
    color: #1f2937;
}

.error-message {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 5px;
    color: #ef4444;
    font-size: 10px;
}

.input-error {
    border-color: #ef4444 !important;
}

.product-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 9px;
    padding: 17px 30px;
    background: #f9fafb;
    border-top: 1px solid #edf0f3;
}

.btn-back,
.btn-save {
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 0 17px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: .2s;
}

.btn-back {
    color: #4b5563;
    background: #fff;
    border: 1px solid #dfe3e8;
}

.btn-back:hover {
    color: #1f2937;
    background: #f3f4f6;
}

.btn-save {
    color: #fff;
    background: #20242c;
    border: 1px solid #20242c;
}

.btn-save:hover {
    color: #fff;
    background: #10b981;
    border-color: #10b981;
}

@media (max-width: 850px) {
    .product-content {
        grid-template-columns: 1fr;
    }

    .photo-section {
        max-width: 450px;
        width: 100%;
        margin: 0 auto;
    }
}

@media (max-width: 600px) {
    .product-content {
        padding: 20px;
        gap: 22px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .full-width {
        grid-column: span 1;
    }

    .product-actions {
        padding: 15px 20px;
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn-back,
    .btn-save {
        width: 100%;
    }
}
</style>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const wrapper = document.getElementById('newPreviewWrapper');
    const file = input.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
        wrapper.style.display = 'flex';
    }
}
</script>