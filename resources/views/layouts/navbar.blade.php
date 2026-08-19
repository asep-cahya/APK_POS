<nav class="sidebar">

    {{-- Brand --}}
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">
            POS Kasir
        </a>
    </div>


    {{-- Menu --}}
    <ul class="sidebar-menu">

        {{-- Dashboard --}}
        <li>
            <a href="{{ route('dashboard') }}"
               class="{{ Request::is('dashboard') ? 'active-menu' : '' }}">

                <span>Dashboard</span>

            </a>
        </li>


        {{-- Users --}}
        @if(auth()->user()->role->name == 'admin')

        <li>
            <a href="{{ route('admin.users') }}"
               class="{{ Request::is('admin/users*') ? 'active-menu' : '' }}">

                <span>Users</span>

            </a>
        </li>

        @endif

        {{-- Jenis --}}<li>
    <a href="{{ route('jenis.index') }}"
       class="{{ Request::is('jenis*') ? 'active-menu' : '' }}">

        <span>Jenis</span>

    </a>
</li>


        {{-- Produk --}}
        <li>
            <a href="{{ route('produk.index') }}"
               class="{{ Request::is('produk*') ? 'active-menu' : '' }}">

                <span>Produk</span>

            </a>
        </li>


        {{-- Penjualan --}}
        <li>
            <a href="{{ route('penjualan.index') }}"
               class="{{ Request::is('penjualan*') ? 'active-menu' : '' }}">

                <span>Penjualan</span>

            </a>
        </li>

    </ul>


    {{-- User --}}
    <div class="sidebar-user">

        <div class="user-name">
            {{ auth()->user()->name }}
        </div>

        <form action="{{ route('logout') }}"
              method="POST">

            @csrf

            <button type="submit" class="logout-btn">
                Logout
            </button>

        </form>

    </div>

</nav>


<style>

/* =========================
   SIDEBAR
========================= */

.sidebar {

    position: fixed;

    top: 0;
    left: 0;

    width: 240px;
    height: 100vh;

    background: #111827;

    color: white;

    z-index: 1000;

    display: flex;
    flex-direction: column;

    box-shadow: 3px 0 10px rgba(0,0,0,.08);

}


/* =========================
   BRAND
========================= */

.sidebar-brand {

    height: 70px;

    display: flex;

    align-items: center;

    padding: 0 24px;

    border-bottom: 1px solid rgba(255,255,255,.08);

}


.sidebar-brand a {

    color: white;

    text-decoration: none;

    font-size: 20px;

    font-weight: 700;

}


/* =========================
   MENU
========================= */

.sidebar-menu {

    list-style: none;

    padding: 20px 12px;

    margin: 0;

}


.sidebar-menu li {

    margin-bottom: 6px;

}


.sidebar-menu a {

    display: flex;

    align-items: center;

    padding: 12px 14px;

    color: #d1d5db;

    text-decoration: none;

    border-radius: 8px;

    font-size: 14px;

    transition: all .2s ease;

}


.sidebar-menu a:hover {

    background: #1f2937;

    color: white;

}


/* =========================
   MENU AKTIF
========================= */

.sidebar-menu a.active-menu {

    background: #2563eb;

    color: white;

    font-weight: 600;

}


/* =========================
   USER
========================= */

.sidebar-user {

    margin-top: auto;

    padding: 18px;

    border-top: 1px solid rgba(255,255,255,.08);

}


.user-name {

    color: white;

    font-size: 14px;

    margin-bottom: 12px;

}


/* =========================
   LOGOUT
========================= */

.logout-btn {

    width: 100%;

    padding: 9px;

    background: transparent;

    color: white;

    border: 1px solid #6b7280;

    border-radius: 6px;

    cursor: pointer;

    transition: .2s;

}


.logout-btn:hover {

    background: #dc2626;

    border-color: #dc2626;

}


/* =========================
   CONTENT
========================= */

body {

    margin: 0;

}


/*
   Supaya isi halaman tidak tertutup sidebar.
*/

.main-content {

    margin-left: 240px;

    min-height: 100vh;

    padding: 20px;

}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 768px) {

    .sidebar {

        width: 200px;

    }

    .main-content {

        margin-left: 200px;

    }

}

</style>
