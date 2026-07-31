@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold text-primary mb-1">
                👥 Manajemen User
            </h2>
            <p class="text-muted mb-0">
                Kelola data pengguna aplikasi POS.
            </p>
        </div>

        <a href="{{ route('admin.users.create') }}"
            class="btn btn-primary shadow-sm">
            + Tambah User
        </a>

    </div>

    <!-- Search -->
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <form action="{{ route('admin.users') }}" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari nama atau email...">

                    <button class="btn btn-primary">
                        🔍 Search
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Table -->
    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Daftar User
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr class="text-center">

                            <th>No</th>
                            <th class="text-start">Nama</th>
                            <th class="text-start">Email</th>
                            <th>Role</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                        <tr>

                            <td class="text-center">
                                {{ $users->firstItem() + $loop->index }}
                            </td>

                            <td class="fw-semibold">
                                👤 {{ $user->name }}
                            </td>

                            <td>
                                {{ $user->email }}
                            </td>

                            <td class="text-center">

                                @if($user->role->name == 'admin')

                                <span class="badge bg-danger">
                                    Admin
                                </span>

                                @else

                                <span class="badge bg-success">
                                    Kasir
                                </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="btn btn-warning btn-sm">
                                    ✏ Edit
                                </a>

                                <form action="{{ route('admin.users.destroy', $user) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">

                                        🗑 Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center py-4 text-muted">

                                Belum ada data user.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white">

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection