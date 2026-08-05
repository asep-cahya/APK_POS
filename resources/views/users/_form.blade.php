
@csrf

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <h4 class="fw-bold mb-4">
            Data User
        </h4>

        <div class="row">

            <!-- Nama -->
            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $user->name ?? '') }}"
                    placeholder="Masukkan nama lengkap">

                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <!-- Email -->
            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $user->email ?? '') }}"
                    placeholder="Masukkan email">

                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <!-- Password -->
            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">
                    Password

                    @isset($user)
                        <small class="text-muted">
                            (Kosongkan jika tidak diubah)
                        </small>
                    @endisset

                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukkan password">

                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <!-- Role -->
            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">
                    Role
                </label>

                <select
                    name="role_id"
                    class="form-select @error('role_id') is-invalid @enderror">

                    <option value="">
                        Pilih Role
                    </option>

                    @foreach($roles as $role)

                        <option
                            value="{{ $role->id }}"
                            @selected(old('role_id', $user->role_id ?? '') == $role->id)>

                            {{ ucfirst($role->name) }}

                        </option>

                    @endforeach

                </select>

                @error('role_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

        </div>

    </div>

    <div class="card-footer bg-white border-0 d-flex justify-content-end gap-2">

        <a href="{{ route('admin.users') }}"
            class="btn btn-outline-dark">

            Kembali

        </a>

        <button
            type="submit"
            class="btn btn-dark">

            Simpan

        </button>

    </div>

</div>

