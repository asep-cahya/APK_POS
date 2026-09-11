@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<style>
.users-wrapper {
    width: 100%;
    min-height: calc(100vh - 68px);
    background: #f4f5f7;
    padding: 28px 32px 40px;
}

.users-header {
    margin-bottom: 18px;
}

.users-header-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.users-title {
    color: #20242c;
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 4px;
    letter-spacing: -0.4px;
}

.users-subtitle {
    color: #8a929e;
    font-size: 12px;
    margin: 0;
}

.btn-add-user {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 9px 15px;
    background: #20242c;
    color: #fff;
    border: 0;
    border-radius: 8px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    transition: 0.2s;
}

.btn-add-user:hover {
    background: #10b981;
    color: #fff;
}

.search-card {
    width: 100%;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    margin-bottom: 18px;
}

.search-card-body {
    padding: 14px;
}

.search-form {
    display: flex;
    gap: 8px;
    width: 100%;
}

.search-input {
    height: 40px;
    flex: 1;
    min-width: 0;
    border: 1px solid #e1e4e8;
    border-radius: 8px;
    color: #374151;
    font-size: 12px;
    padding: 0 13px;
    background: #fff;
    outline: none;
    box-shadow: none !important;
    transition: 0.2s;
}

.search-input:focus {
    border-color: #10b981;
}

.search-input::placeholder {
    color: #a8afb9;
}

.search-btn {
    height: 40px;
    padding: 0 17px;
    background: #20242c;
    border: 1px solid #20242c;
    border-radius: 8px;
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s;
}

.search-btn:hover {
    background: #10b981;
    border-color: #10b981;
}

.users-card {
    width: 100%;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
}

.users-card-header {
    padding: 15px 18px;
    border-bottom: 1px solid #eef0f2;
}

.users-card-title {
    margin: 0;
    color: #20242c;
    font-size: 14px;
    font-weight: 700;
}

.users-table-wrapper {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.users-table {
    width: 100%;
    min-width: 700px;
    margin: 0;
    table-layout: auto;
}

.users-table thead th {
    background: #f8f9fa;
    color: #8a929e;
    border-bottom: 1px solid #e5e7eb;
    padding: 10px 12px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    white-space: nowrap;
    text-align: center;
}

.users-table tbody td {
    padding: 11px 12px;
    color: #4b5563;
    border-color: #f0f1f3;
    font-size: 12px;
    vertical-align: middle;
    white-space: nowrap;

    /* DATA DI TENGAH */
    text-align: center;
}

.users-table tbody tr {
    transition: 0.2s;
}

.users-table tbody tr:hover {
    background: #fafbfc;
}

.nomor {
    color: #8a929e;
    font-size: 11px;
    text-align: center;
}

.user-name {
    color: #20242c;
    font-size: 12px;
    font-weight: 600;
}

.user-email {
    color: #6b7280;
    font-size: 12px;
}

.role-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 60px;
    padding: 4px 9px;
    border-radius: 6px;
    font-size: 10px;
    font-weight: 700;
    white-space: nowrap;
}

.role-admin {
    background: #ecfdf5;
    color: #047857;
}

.role-kasir {
    background: #f3f4f6;
    color: #59616d;
}

.action-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    white-space: nowrap;
}

.action-wrapper form {
    margin: 0;
}

.action-btn {
    width: 32px;
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 7px;
    border: 1px solid transparent;
    text-decoration: none;
    font-size: 13px;
    transition: 0.2s;
    cursor: pointer;
}

.action-edit {
    background: #ecfdf5;
    color: #047857;
    border-color: #d1fae5;
}

.action-edit:hover {
    background: #d1fae5;
    color: #065f46;
}

.action-delete {
    background: #fef2f2;
    color: #b91c1c;
    border-color: #fecaca;
}

.action-delete:hover {
    background: #fee2e2;
    color: #991b1b;
}

.empty-state {
    padding: 35px 20px !important;
    color: #9aa1ab !important;
    text-align: center !important;
    font-size: 12px !important;
}

.empty-icon {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px;
    border-radius: 10px;
    background: #f3f4f6;
    color: #9aa1ab;
    font-size: 19px;
}

.empty-state strong {
    display: block;
    color: #374151;
    font-size: 13px;
}

.empty-state p {
    margin: 4px 0 13px;
    color: #9aa1ab;
    font-size: 11px;
}

.users-pagination {
    padding: 12px 18px;
    background: #fff;
    border-top: 1px solid #eef0f2;
}

.users-pagination .pagination {
    margin: 0;
}

@media (max-width: 768px) {
    .users-wrapper {
        padding: 22px 16px 35px;
    }

    .users-header-inner {
        align-items: flex-start;
        gap: 12px;
    }

    .users-title {
        font-size: 21px;
    }

    .btn-add-user {
        padding: 9px 13px;
    }
}

@media (max-width: 550px) {
    .users-header-inner {
        flex-direction: column;
    }

    .btn-add-user {
        width: 100%;
    }

    .search-form {
        flex-direction: column;
    }

    .search-btn {
        width: 100%;
    }

    .search-card-body {
        padding: 12px;
    }
}
</style>

<div class="users-wrapper">

    <!-- HEADER -->
    <div class="users-header">

        <div class="users-header-inner">

            <div>
                <h2 class="users-title">
                    Manajemen User
                </h2>

                <p class="users-subtitle">
                    Kelola data pengguna aplikasi POS Gaya Kita.
                </p>
            </div>

            <a
                href="{{ route('admin.users.create') }}"
                class="btn-add-user">

                <i class="bi bi-plus-lg"></i>

                Tambah User

            </a>

        </div>

    </div>

    <!-- SEARCH -->
    <div class="search-card">

        <div class="search-card-body">

            <form
                action="{{ route('admin.users') }}"
                method="GET"
                class="search-form">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="search-input"
                    placeholder="Cari nama atau email">

                <button
                    type="submit"
                    class="search-btn">

                    <i class="bi bi-search me-1"></i>

                    Cari

                </button>

            </form>

        </div>

    </div>

    <!-- TABLE CARD -->
    <div class="users-card">

        <!-- CARD HEADER -->
        <div class="users-card-header">

            <h5 class="users-card-title">
                Daftar User
            </h5>

        </div>

        <!-- TABLE -->
        <div class="users-table-wrapper">

            <table class="table users-table align-middle">

                <thead>

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th>
                            Nama
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Role
                        </th>

                        <th width="120">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($users as $user)

                        <tr>

                            <!-- NO -->
                            <td class="nomor">

                                {{ $users->firstItem() + $loop->index }}

                            </td>

                            <!-- NAMA -->
                            <td>

                                <span class="user-name">
                                    {{ $user->name }}
                                </span>

                            </td>

                            <!-- EMAIL -->
                            <td>

                                <span class="user-email">
                                    {{ $user->email }}
                                </span>

                            </td>

                            <!-- ROLE -->
                            <td>

                                @if($user->role->name == 'admin')

                                    <span class="role-badge role-admin">
                                        Admin
                                    </span>

                                @else

                                    <span class="role-badge role-kasir">
                                        Kasir
                                    </span>

                                @endif

                            </td>

                            <!-- AKSI -->
                            <td>

                                <div class="action-wrapper">

                                    <!-- EDIT -->
                                    <a
                                        href="{{ route('admin.users.edit', $user) }}"
                                        class="action-btn action-edit"
                                        title="Edit User">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <!-- HAPUS -->
                                    <form
                                        action="{{ route('admin.users.destroy', $user) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn action-delete"
                                            title="Hapus User"
                                            onclick="return confirm('Yakin ingin menghapus user ini?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="empty-state">

                                <div class="empty-icon">

                                    <i class="bi bi-inbox"></i>

                                </div>

                                <strong>
                                    Belum ada data user
                                </strong>

                                <p>
                                    Silakan tambahkan user baru.
                                </p>

                                <a
                                    href="{{ route('admin.users.create') }}"
                                    class="btn-add-user">

                                    <i class="bi bi-plus-lg"></i>

                                    Tambah User

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        @if($users->hasPages())

            <div class="users-pagination">

                {{ $users->links() }}

            </div>

        @endif

    </div>

</div>

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

@endsection