@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')


<style>

/* ==================================================
   USERS PAGE
================================================== */

.users-wrapper {

    margin-left: 250px;

    min-height: 100vh;

    background: #F3F4F6;

    padding: 40px;

}


/* ==================================================
   HEADER
================================================== */

.users-header {

    margin-bottom: 32px;

}


.users-title {

    color: #20242C;

    font-size: 27px;

    font-weight: 700;

    margin-bottom: 6px;

    letter-spacing: -0.5px;

}


.users-subtitle {

    color: #8A929E;

    font-size: 13px;

}


/* ==================================================
   BUTTON TAMBAH
================================================== */

.btn-add-user {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    height: 42px;

    padding: 0 18px;

    background: #10B981;

    border: 1px solid #10B981;

    border-radius: 9px;

    color: #FFFFFF;

    font-size: 12px;

    font-weight: 600;

    text-decoration: none;

    transition: all .2s ease;

}


.btn-add-user:hover {

    background: #059669;

    border-color: #059669;

    color: #FFFFFF;

    transform: translateY(-1px);

}


/* ==================================================
   SEARCH CARD
================================================== */

.search-card {

    background: #FFFFFF;

    border: 1px solid #E5E7EB;

    border-radius: 14px;

    margin-bottom: 20px;

}


.search-card-body {

    padding: 18px;

}


.search-form {

    display: flex;

    gap: 10px;

}


.search-input {

    height: 42px;

    border: 1px solid #E1E4E8;

    border-radius: 9px;

    color: #20242C;

    font-size: 13px;

    padding: 0 14px;

    background: #FFFFFF;

    outline: none;

    flex: 1;

    transition: all .2s ease;

}


.search-input:focus {

    border-color: #10B981;

    box-shadow: 0 0 0 3px rgba(16,185,129,.08);

}


.search-input::placeholder {

    color: #A1A8B3;

}


.search-btn {

    height: 42px;

    padding: 0 20px;

    background: #20242C;

    border: 1px solid #20242C;

    border-radius: 9px;

    color: #FFFFFF;

    font-size: 12px;

    font-weight: 600;

    cursor: pointer;

    transition: all .2s ease;

}


.search-btn:hover {

    background: #303741;

    border-color: #303741;

}


/* ==================================================
   TABLE CARD
================================================== */

.users-card {

    background: #FFFFFF;

    border: 1px solid #E5E7EB;

    border-radius: 14px;

    overflow: hidden;

}


.users-card-header {

    padding: 20px 22px;

    border-bottom: 1px solid #EEF0F2;

}


.users-card-title {

    margin: 0;

    color: #20242C;

    font-size: 15px;

    font-weight: 700;

}


/* ==================================================
   TABLE
================================================== */

.users-table {

    margin-bottom: 0;

}


.users-table thead th {

    background: #F8F9FA;

    color: #8A929E;

    border-bottom: 1px solid #E5E7EB;

    padding: 12px 20px;

    font-size: 10px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .5px;

}


.users-table tbody td {

    padding: 15px 20px;

    color: #4B5563;

    border-color: #F0F1F3;

    font-size: 13px;

}


.users-table tbody tr {

    transition: background .15s ease;

}


.users-table tbody tr:hover {

    background: #FAFBFC;

}


.user-name {

    color: #20242C;

    font-weight: 600;

}


.user-email {

    color: #6B7280;

}


/* ==================================================
   ROLE BADGE
================================================== */

.role-badge {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    min-width: 70px;

    padding: 5px 11px;

    border-radius: 7px;

    font-size: 10px;

    font-weight: 700;

}


.role-admin {

    background: #ECFDF5;

    color: #047857;

}


.role-kasir {

    background: #F3F4F6;

    color: #59616D;

}


/* ==================================================
   ACTION BUTTON
================================================== */

.action-edit {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    height: 32px;

    padding: 0 12px;

    border: 1px solid #D9DDE2;

    border-radius: 7px;

    background: #FFFFFF;

    color: #59616D;

    font-size: 11px;

    font-weight: 600;

    text-decoration: none;

    transition: all .2s ease;

}


.action-edit:hover {

    background: #F3F4F6;

    border-color: #C8CDD3;

    color: #20242C;

}


.action-delete {

    height: 32px;

    padding: 0 12px;

    border: 1px solid #D9DDE2;

    border-radius: 7px;

    background: #FFFFFF;

    color: #59616D;

    font-size: 11px;

    font-weight: 600;

    transition: all .2s ease;

}


.action-delete:hover {

    background: #FEF2F2;

    border-color: #FECACA;

    color: #DC2626;

}


/* ==================================================
   EMPTY STATE
================================================== */

.empty-state {

    padding: 40px 20px !important;

    color: #9AA1AB !important;

    text-align: center;

    font-size: 12px !important;

}


/* ==================================================
   PAGINATION
================================================== */

.users-pagination {

    padding: 16px 22px;

    border-top: 1px solid #EEF0F2;

}


/* ==================================================
   RESPONSIVE
================================================== */

@media (max-width: 992px) {

    .users-wrapper {

        margin-left: 250px;

        padding: 30px;

    }

}


@media (max-width: 768px) {

    .users-wrapper {

        margin-left: 220px;

        padding: 25px 18px;

    }


    .users-header {

        align-items: flex-start !important;

        gap: 20px;

    }


    .users-title {

        font-size: 23px;

    }


    .search-form {

        flex-direction: column;

    }


    .search-btn {

        width: 100%;

    }

}

</style>


<div class="users-wrapper">


    <!-- HEADER -->

    <div class="users-header d-flex justify-content-between align-items-center">

        <div>

            <h2 class="users-title">

                Manajemen User

            </h2>

            <p class="users-subtitle mb-0">

                Kelola data pengguna aplikasi POS.

            </p>

        </div>


        <a href="{{ route('admin.users.create') }}"
           class="btn-add-user">

            <i class="bi bi-plus-lg"></i>

            Tambah User

        </a>

    </div>



    <!-- SEARCH -->

    <div class="search-card">

        <div class="search-card-body">

            <form action="{{ route('admin.users') }}"
                  method="GET"
                  class="search-form">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="search-input"
                    placeholder="Cari nama atau email">

                <button type="submit"
                        class="search-btn">

                    <i class="bi bi-search me-1"></i>

                    Cari

                </button>

            </form>

        </div>

    </div>



    <!-- TABLE -->

    <div class="users-card">


        <div class="users-card-header">

            <h5 class="users-card-title">

                Daftar User

            </h5>

        </div>


        <div class="table-responsive">

            <table class="table users-table align-middle">

                <thead>

                    <tr>

                        <th width="60"
                            class="text-center">

                            No

                        </th>

                        <th>

                            Nama

                        </th>

                        <th>

                            Email

                        </th>

                        <th class="text-center">

                            Role

                        </th>

                        <th width="170"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($users as $user)


                    <tr>


                        <!-- NO -->

                        <td class="text-center">

                            {{ $users->firstItem() + $loop->index }}

                        </td>


                        <!-- NAMA -->

                        <td class="user-name">

                            {{ $user->name }}

                        </td>


                        <!-- EMAIL -->

                        <td class="user-email">

                            {{ $user->email }}

                        </td>


                        <!-- ROLE -->

                        <td class="text-center">


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

                        <td class="text-center">


                            <a
                                href="{{ route('admin.users.edit', $user) }}"
                                class="action-edit">

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
                                    class="action-delete"
                                    onclick="return confirm('Yakin ingin menghapus user ini?')">

                                    Hapus

                                </button>


                            </form>


                        </td>


                    </tr>


                    @empty


                    <tr>

                        <td colspan="5"
                            class="empty-state">

                            Belum ada data user.

                        </td>

                    </tr>


                    @endforelse


                </tbody>

            </table>

        </div>


        <!-- PAGINATION -->

        <div class="users-pagination">

            {{ $users->links() }}

        </div>


    </div>


</div>


@endsection
