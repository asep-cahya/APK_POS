@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
/* ==================================================
   LOGIN
================================================== */

.login-wrapper {
    min-height: 100vh;
    background: #F3F4F6;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px;
}

/* ==================================================
   LOGIN CARD
================================================== */

.login-card {
    width: 100%;
    max-width: 400px;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 14px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
    overflow: hidden;
}

.login-card-body {
    padding: 32px;
}

/* ==================================================
   HEADER
================================================== */

.login-header {
    text-align: center;
    margin-bottom: 28px;
}

.login-title {
    margin: 0 0 6px;
    color: #20242C;
    font-size: 24px;
    font-weight: 700;
    letter-spacing: -.4px;
}

.login-subtitle {
    margin: 0;
    color: #8A929E;
    font-size: 12px;
}

/* ==================================================
   FORM
================================================== */

.login-form-group {
    margin-bottom: 20px;
}

.login-label {
    display: block;
    margin-bottom: 7px;
    color: #374151;
    font-size: 12px;
    font-weight: 600;
}

.login-input {
    width: 100%;
    height: 40px;
    padding: 0 13px;
    background: #FFFFFF;
    color: #20242C;
    border: 1px solid #DDE2E7;
    border-radius: 8px;
    outline: none;
    font-size: 12px;
    transition: all .2s ease;
    box-sizing: border-box;
}

.login-input::placeholder {
    color: #A1A8B2;
}

.login-input:focus {
    border-color: #9CA3AF;
    box-shadow: 0 0 0 3px rgba(156, 163, 175, .12);
}

.login-input.is-invalid {
    border-color: #DC3545;
}

.login-input.is-invalid:focus {
    border-color: #DC3545;
    box-shadow: 0 0 0 3px rgba(220, 53, 69, .10);
}

.login-error {
    display: block;
    margin-top: 6px;
    color: #DC3545;
    font-size: 11px;
}

/* ==================================================
   BUTTON
================================================== */

.login-button {
    width: 100%;
    height: 40px;
    margin-top: 3px;
    border: 0;
    border-radius: 8px;
    background: #20242C;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all .2s ease;
}

.login-button:hover {
    background: #111827;
    transform: translateY(-1px);
    box-shadow: 0 5px 12px rgba(0, 0, 0, .10);
}

.login-button:active {
    transform: translateY(0);
}

/* ==================================================
   RESPONSIVE
================================================== */

@media (max-width: 480px) {

    .login-wrapper {
        padding: 20px;
    }

    .login-card-body {
        padding: 26px 22px;
    }

    .login-title {
        font-size: 22px;
    }

}
</style>

<div class="login-wrapper">

    <div class="login-card">

        <div class="login-card-body">

            <!-- HEADER -->

            <div class="login-header">

                <h2 class="login-title">
                    Login ke Gaya Kita
                </h2>

                <p class="login-subtitle">
                    Silakan masuk untuk mengelola transaksi.
                </p>

            </div>

            <!-- FORM -->

            <form action="{{ route('auth') }}" method="POST">

                @csrf

                <!-- EMAIL -->

                <div class="login-form-group">

                    <label class="login-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="login-input @error('email') is-invalid @enderror"
                        placeholder="Masukkan email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                    >

                    @error('email')

                        <span class="login-error">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

                <!-- PASSWORD -->

                <div class="login-form-group">

                    <label class="login-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="login-input @error('password') is-invalid @enderror"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                    >

                    @error('password')

                        <span class="login-error">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

                <!-- BUTTON -->

                <button
                    type="submit"
                    class="login-button"
                >
                    Login
                </button>

            </form>

        </div>

    </div>

</div>

@endsection