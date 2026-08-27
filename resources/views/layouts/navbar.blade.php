<nav class="top-navbar">

    {{-- BRAND --}}
    <a href="{{ route('dashboard') }}" class="brand">

        <div class="brand-logo">
            PA
        </div>

        <div class="brand-info">
            <div class="brand-name">
                POS AsepCahya
            </div>

            <div class="brand-subtitle">
                Point of Sale
            </div>
        </div>

    </a>


    {{-- MENU --}}
    <div class="nav-menu">

        <a href="{{ route('dashboard') }}"
           class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">

            <span class="nav-icon">▦</span>
            <span>Dashboard</span>

        </a>


        @if(auth()->user()->role->name == 'admin')

            <a href="{{ route('admin.users') }}"
               class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">

                <span class="nav-icon">♟</span>
                <span>Users</span>

            </a>

        @endif


        <a href="{{ route('jenis.index') }}"
           class="nav-link {{ Request::is('jenis*') ? 'active' : '' }}">

            <span class="nav-icon">◇</span>
            <span>Jenis</span>

        </a>


        <a href="{{ route('produk.index') }}"
           class="nav-link {{ Request::is('produk*') ? 'active' : '' }}">

            <span class="nav-icon">▣</span>
            <span>Produk</span>

        </a>


        <a href="{{ route('penjualan.index') }}"
           class="nav-link {{ Request::is('penjualan*') ? 'active' : '' }}">

            <span class="nav-icon">▤</span>
            <span>Penjualan</span>

        </a>

    </div>


    {{-- USER --}}
    <div class="nav-user">

        <div class="user-profile">

            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div class="user-detail">

                <div class="user-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="user-role">
                    {{ auth()->user()->role->name }}
                </div>

            </div>

        </div>


        <div class="nav-divider"></div>


        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-btn">

                <span>↪</span>

                <span>Logout</span>

            </button>

        </form>

    </div>

</nav>
<style>

/* =========================
   NAVBAR
========================= */

.top-navbar {
    width: 100%;
    height: 68px;

    display: flex;
    align-items: center;

    padding: 0 28px;

    background: #ffffff;
    border-bottom: 1px solid #e5e7eb;

    box-sizing: border-box;
}


/* =========================
   BRAND
========================= */

.brand {
    display: flex;
    align-items: center;
    gap: 10px;

    min-width: 220px;

    color: #111827;
    text-decoration: none;
}

.brand-logo {
    width: 38px;
    height: 38px;

    display: grid;
    place-items: center;

    border-radius: 10px;

    background: #10b981;
    color: #ffffff;

    font-size: 13px;
    font-weight: 700;
}

.brand-name {
    color: #111827;

    font-size: 14px;
    font-weight: 700;
}

.brand-subtitle {
    margin-top: 2px;

    color: #98a2b3;

    font-size: 9px;
}


/* =========================
   MENU
========================= */

.nav-menu {
    height: 100%;

    display: flex;
    align-items: center;

    gap: 4px;

    flex: 1;
}

.nav-link {
    position: relative;

    height: 42px;

    display: flex;
    align-items: center;

    gap: 8px;

    padding: 0 14px;

    border-radius: 8px;

    color: #667085;

    text-decoration: none;

    font-size: 12px;
    font-weight: 500;

    transition: .2s ease;
}

.nav-link:hover {
    color: #111827;
    background: #f3f4f6;
}

.nav-link.active {
    color: #111827;

    background: #f0fdf9;

    font-weight: 600;
}

.nav-link.active::after {
    content: "";

    position: absolute;

    left: 14px;
    right: 14px;

    bottom: 0;

    height: 3px;

    border-radius: 3px 3px 0 0;

    background: #10b981;
}

.nav-icon {
    width: 18px;

    display: inline-flex;
    justify-content: center;

    color: #667085;

    font-size: 14px;
}

.nav-link.active .nav-icon {
    color: #10b981;
}


/* =========================
   USER
========================= */

.nav-user {
    display: flex;
    align-items: center;

    gap: 14px;

    margin-left: auto;
}

.user-profile {
    display: flex;
    align-items: center;

    gap: 9px;
}

.user-avatar {
    width: 36px;
    height: 36px;

    display: grid;
    place-items: center;

    border-radius: 10px;

    background: #10b981;
    color: #ffffff;

    font-size: 12px;
    font-weight: 700;
}

.user-name {
    max-width: 100px;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;

    color: #111827;

    font-size: 11px;
    font-weight: 600;
}

.user-role {
    margin-top: 2px;

    color: #98a2b3;

    font-size: 9px;
}

.nav-divider {
    width: 1px;
    height: 28px;

    background: #e5e7eb;
}


/* =========================
   LOGOUT
========================= */

.logout-btn {
    height: 36px;

    display: flex;
    align-items: center;

    gap: 7px;

    padding: 0 12px;

    border: 1px solid #dfe3e8;
    border-radius: 8px;

    background: #ffffff;

    color: #667085;

    font-size: 11px;

    cursor: pointer;

    transition: .2s ease;
}

.logout-btn:hover {
    background: #f3f4f6;

    border-color: #d1d5db;

    color: #111827;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 950px) {

    .top-navbar {
        padding: 0 18px;
    }

    .brand {
        min-width: auto;
        margin-right: 12px;
    }

    .brand-info {
        display: none;
    }

    .nav-link {
        padding: 0 10px;
    }

    .user-detail {
        display: none;
    }

}


@media (max-width: 700px) {

    .top-navbar {
        height: 62px;
        padding: 0 12px;
    }

    .nav-menu {
        overflow-x: auto;
    }

    .nav-link {
        flex-shrink: 0;
    }

    .logout-btn span:last-child {
        display: none;
    }

}

</style>