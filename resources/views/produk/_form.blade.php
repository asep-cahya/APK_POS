
@csrf

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <h4 class="fw-bold mb-4">
            Form Produk
        </h4>

        <div class="row g-4">

            <!-- Foto -->
            <div class="col-lg-4">

                <div class="border rounded-4 p-4 text-center h-100">

                    <h6 class="fw-bold mb-4">
                        Foto Produk
                    </h6>


                    @if (!empty($produk->foto))

                    <img
                        src="{{ asset('storage/' . $produk->foto) }}"
                        class="img-fluid rounded-3 border mb-3"
                        style="max-height:220px;">

                    @endif


                    <img
                        id="preview"
                        class="img-fluid rounded-3 border mb-3"
                        style="display:none;max-height:220px;">


                    <input
                        type="file"
                        name="foto"
                        onchange="previewImage(this)"
                        class="form-control @error('foto') is-invalid @enderror">


                    @error('foto')

                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>

                    @enderror


                </div>

            </div>


            <!-- Form -->
            <div class="col-lg-8">


                <div class="row">


                    <!-- Nama -->
                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold">
                            Nama Produk
                        </label>


                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $produk->nama ?? '') }}"
                            placeholder="Masukkan nama produk">


                        @error('name')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror

                    </div>



                    <!-- Harga Beli -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            Harga Beli
                        </label>


                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                Rp
                            </span>


                            <input
                                type="number"
                                name="purchase_price"
                                class="form-control @error('purchase_price') is-invalid @enderror"
                                value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">


                        </div>


                        @error('purchase_price')

                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>

                        @enderror


                    </div>



                    <!-- Harga Jual -->
                    <div class="col-md-6 mb-4">


                        <label class="form-label fw-semibold">
                            Harga Jual
                        </label>


                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                Rp
                            </span>


                            <input
                                type="number"
                                name="selling_price"
                                class="form-control @error('selling_price') is-invalid @enderror"
                                value="{{ old('selling_price', $produk->harga_jual ?? '') }}">


                        </div>


                        @error('selling_price')

                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>

                        @enderror


                    </div>




                    <!-- Stok -->
                    <div class="col-md-12 mb-4">


                        <label class="form-label fw-semibold">
                            Jumlah Stok
                        </label>


                        <input
                            type="number"
                            name="stok"
                            class="form-control @error('stok') is-invalid @enderror"
                            value="{{ old('stok', $produk->stok ?? '') }}"
                            placeholder="Masukkan jumlah stok">


                        @error('stok')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror


                    </div>


                </div>


            </div>


        </div>


    </div>



    <!-- Action -->

    <div class="card-footer bg-white border-0 d-flex justify-content-end gap-2 p-4">


        <a href="{{ route('produk.index') }}"
            class="btn btn-outline-dark">

            Kembali

        </a>


        <button
            type="submit"
            class="btn btn-dark">

            Simpan Produk

        </button>


    </div>


</div>



<script>

function previewImage(input) {

    const preview = document.getElementById('preview');

    const file = input.files[0];


    if(file){

        preview.src = URL.createObjectURL(file);

        preview.style.display = 'block';

    }

}

</script>

