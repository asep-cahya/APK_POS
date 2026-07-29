@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<h1>Halaman Users</h1>

<a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">
    Create
</a>

<form action="{{ route('admin.users') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control"
            placeholder="Search username atau email">

        <button type="submit" class="btn btn-outline-secondary">
            Search
        </button>
    </div>
</form>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($users as $user)

        <tr>

            <td>{{ $users->firstItem() + $loop->index }}</td>

            <td>{{ $user->name }}</td>

            <td>{{ $user->email }}</td>

            <td>{{ $user->role->name }}</td>

            <td>
                <a href="{{ route('admin.users.edit', $user) }}"
                    class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('admin.users.destroy', $user) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus user ini?')">
                        Hapus
                    </button>

                </form>
            </td>

        </tr>

        @empty

        <tr>
            <td colspan="5" class="text-center">
                Data user tidak ditemukan.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

{{ $users->links() }}

@endsection