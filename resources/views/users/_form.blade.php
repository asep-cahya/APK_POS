@csrf

<style>
/* ==================================================
   USER FORM
================================================== */

.user-form-card {
    width: 100%;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 12px;
    overflow: hidden;
}

.user-form-header {
    padding: 15px 18px;
    border-bottom: 1px solid #EEF0F2;
}

.user-form-title {
    margin: 0;
    color: #20242C;
    font-size: 14px;
    font-weight: 700;
}

.user-form-body {
    padding: 20px;
}

.user-form-group {
    margin-bottom: 18px;
}

.user-form-group:last-child {
    margin-bottom: 0;
}

.user-form-label {
    display: block;
    margin-bottom: 7px;
    color: #374151;
    font-size: 12px;
    font-weight: 600;
}

.user-form-label small {
    color: #9AA1AB;
    font-size: 10px;
    font-weight: 400;
}

.user-form-input,
.user-form-select {
    width: 100%;
    height: 40px;
    padding: 0 12px;
    border: 1px solid #E1E4E8;
    border-radius: 8px;
    background: #FFFFFF;
    color: #374151;
    font-size: 12px;
    box-shadow: none !important;
    transition: all .2s ease;
}

.user-form-input:focus,
.user-form-select:focus {
    border-color: #10B981;
    box-shadow: 0 0 0 3px rgba(16,185,129,.08) !important;
}

.user-form-input::placeholder {
    color: #A8AFB9;
}

.user-form-input.is-invalid,
.user-form-select.is-invalid {
    border-color: #DC2626;
}

.invalid-feedback {
    margin-top: 5px;
    font-size: 10px;
}

/* ==================================================
   FOOTER
================================================== */

.user-form-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 8px;
    padding: 13px 18px;
    background: #FFFFFF;
    border-top: 1px solid #EEF0F2;
}

.btn-kembali,
.btn-simpan {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    height: 36px;
    padding: 0 14px;
    border-radius: 7px;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
    transition: all .2s ease;
}

.btn-kembali {
    background: #FFFFFF;
    color: #59616D;
    border: 1px solid #D9DDE2;
}

.btn-kembali:hover {
    background: #F3F4F6;
    color: #20242C;
    border-color: #C8CDD3;
}

.btn-simpan {
    background: #20242C;
    color: #FFFFFF;
    border: 1px solid #20242C;
    cursor: pointer;
}

.btn-simpan:hover {
    background: #303741;
    border-color: #303741;
    color: #FFFFFF;
}

/* ==================================================
   RESPONSIVE
================================================== */

@media (max-width: 768px) {
    .user-form-body {
        padding: 16px;
    }

    .user-form-footer {
        padding: 12px 16px;
    }
}

@media (max-width: 550px) {
    .user-form-footer {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn-kembali,
    .btn-simpan {
        width: 100%;
    }
}
</style>

<div class="user-form-card">

    <!-- HEADER -->
    <div class="user-form-header">
        <h5 class="user-form-title">
            Data User
        </h5>
    </div>

    <!-- FORM BODY -->
    <div class="user-form-body">

        <div class="row">

            <!-- NAMA -->
            <div class="col-md-6 user-form-group">
                <label class="user-form-label">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control user-form-input @error('name') is-invalid @enderror"
                    value="{{ old('name', $user->name ?? '') }}"
                    placeholder="Masukkan nama lengkap">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- EMAIL -->
            <div class="col-md-6 user-form-group">
                <label class="user-form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control user-form-input @error('email') is-invalid @enderror"
                    value="{{ old('email', $user->email ?? '') }}"
                    placeholder="Masukkan email">

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="col-md-6 user-form-group">
                <label class="user-form-label">
                    Password

                    @isset($user)
                        <small>
                            (Kosongkan jika tidak diubah)
                        </small>
                    @endisset
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control user-form-input @error('password') is-invalid @enderror"
                    placeholder="Masukkan password">

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ROLE -->
            <div class="col-md-6 user-form-group">
                <label class="user-form-label">
                    Role
                </label>

                <select
                    name="role_id"
                    class="form-select user-form-select @error('role_id') is-invalid @enderror">

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

    <!-- FOOTER -->
    <div class="user-form-footer">

        <a
            href="{{ route('admin.users') }}"
            class="btn-kembali">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

        <button
            type="submit"
            class="btn-simpan">

            <i class="bi bi-check-lg"></i>
            Simpan

        </button>

    </div>

</div>