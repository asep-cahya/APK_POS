
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="min-vh-100 d-flex align-items-center justify-content-center"
     style="background:#F8F9FA;">


    <div class="card border-0 shadow-sm rounded-4"
         style="width: 420px;">


        <div class="card-body p-5">


            <!-- Header -->

            <div class="text-center mb-5">

                <h2 class="fw-bold mb-2"
                    style="color:#111827;">

                    Login POS

                </h2>


                <p class="text-muted mb-0">

                    Masuk untuk mengelola transaksi Anda.

                </p>

            </div>



            <form action="{{ route('auth') }}" method="POST">

                @csrf



                <!-- Email -->

                <div class="mb-4">


                    <label class="form-label fw-semibold">

                        Email

                    </label>



                    <input
                        type="email"
                        name="email"
                        class="form-control rounded-3 @error('email') is-invalid @enderror"
                        placeholder="Masukkan email"
                        value="{{ old('email') }}">



                    @error('email')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                    @enderror


                </div>




                <!-- Password -->

                <div class="mb-4">


                    <label class="form-label fw-semibold">

                        Password

                    </label>



                    <input
                        type="password"
                        name="password"
                        class="form-control rounded-3 @error('password') is-invalid @enderror"
                        placeholder="Masukkan password">



                    @error('password')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                    @enderror


                </div>




                <!-- Button -->


                <button
                    type="submit"
                    class="btn w-100 rounded-3 py-2 fw-semibold"
                    style="
                        background:#111827;
                        color:white;
                    ">

                    Login

                </button>



            </form>



        </div>


    </div>


</div>


@endsection

