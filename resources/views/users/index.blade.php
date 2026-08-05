
@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>
            <h2 class="fw-bold mb-1">
                Manajemen User
            </h2>

            <p class="text-muted mb-0">
                Kelola data pengguna aplikasi POS.
            </p>
        </div>

        <a href="{{ route('admin.users.create') }}"
            class="btn btn-dark px-4 rounded-3">
            Tambah User
        </a>

    </div>

    <!-- Search -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form action="{{ route('admin.users') }}" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari nama atau email">

                    <button class="btn btn-dark">
                        Cari
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h5 class="fw-bold mb-4">
                Daftar User
            </h5>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60" class="text-center">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="text-center">Role</th>
                            <th width="170" class="text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                        <tr>

                            <td class="text-center">
                                {{ $users->firstItem() + $loop->index }}
                            </td>

                            <td class="fw-semibold">
                                {{ $user->name }}
                            </td>

                            <td>
                                {{ $user->email }}
                            </td>

                            <td class="text-center">

                                @if($user->role->name == 'admin')

                                    <span class="badge bg-dark rounded-pill px-3">
                                        Admin
                                    </span>

                                @else

                                    <span class="badge border border-dark text-dark rounded-pill px-3">
                                        Kasir
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="btn btn-outline-dark btn-sm">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.users.destroy', $user) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-dark btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center text-muted py-5">

                                Belum ada data user.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white border-0">

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection

