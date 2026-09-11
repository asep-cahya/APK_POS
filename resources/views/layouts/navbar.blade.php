<nav class="top-navbar">
    {{-- BRAND --}}
    <a href="{{ route('dashboard') }}" class="brand">
        <div class="brand-logo">
            <span>GK</span>
        </div>
        <div class="brand-info">
            <div class="brand-name">Gaya Kita</div>
            <div class="brand-subtitle">POINT OF SALE SYSTEM</div>
        </div>
    </a>

    {{-- MENU --}}
    <div class="nav-menu">
        <a href="{{ route('dashboard') }}"
           class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <span class="nav-icon"><i class="bi bi-grid-1x2-fill"></i></span>
            <span>Dashboard</span>
        </a>

        @if(auth()->user()->role->name == 'admin')
            <a href="{{ route('admin.users') }}"
               class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-people-fill"></i></span>
                <span>Users</span>
            </a>
        @endif

       @if(auth()->user()->role->name == 'admin')
    <a href="{{ route('jenis.index') }}"
       class="nav-link {{ Request::is('jenis*') ? 'active' : '' }}">
        <span class="nav-icon"><i class="bi bi-tags-fill"></i></span>
        <span>Jenis</span>
    </a>
@endif


        <a href="{{ route('produk.index') }}"
           class="nav-link {{ Request::is('produk*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="bi bi-box-seam-fill"></i></span>
            <span>Produk</span>
        </a>

        <a href="{{ route('penjualan.index') }}"
           class="nav-link {{ Request::is('penjualan*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="bi bi-cart-check-fill"></i></span>
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
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-role">
                    <span class="role-dot"></span>
                    {{ ucfirst(auth()->user()->role->name) }}
                </div>
            </div>
        </div>

        <div class="nav-divider"></div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn" title="Logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</nav>

<style>
/* ==================================================
   NAVBAR
================================================== */
.top-navbar {
    width: 100%;
    height: 72px;
    display: flex;
    align-items: center;
    padding: 0 30px;
    background: rgba(255,255,255,.96);
    border-bottom: 1px solid #e8eaed;
    box-shadow: 0 2px 12px rgba(15,23,42,.04);
    box-sizing: border-box;
    position: relative;
    z-index: 1000;
}

/* ==================================================
   BRAND
================================================== */
.brand {
    display: flex;
    align-items: center;
    gap: 11px;
    min-width: 225px;
    text-decoration: none;
    color: #111827;
}

.brand-logo {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    background: linear-gradient(135deg,#10b981,#059669);
    color: #fff;
    font-size: 12px;
    font-weight: 800;
    box-shadow: 0 5px 12px rgba(16,185,129,.20);
    position: relative;
    overflow: hidden;
}

.brand-logo::after {
    content: "";
    position: absolute;
    width: 22px;
    height: 22px;
    right: -9px;
    bottom: -9px;
    border-radius: 50%;
    background: rgba(255,255,255,.15);
}

.brand-logo span {
    position: relative;
    z-index: 2;
}

.brand-name {
    color: #171a21;
    font-size: 14px;
    font-weight: 750;
    letter-spacing: -.2px;
}

.brand-subtitle {
    margin-top: 3px;
    color: #9aa1ab;
    font-size: 8px;
    font-weight: 600;
    letter-spacing: 1px;
}

/* ==================================================
   MENU
================================================== */
.nav-menu {
    height: 100%;
    display: flex;
    align-items: center;
    gap: 5px;
    flex: 1;
}

.nav-link {
    position: relative;
    height: 40px;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 0 13px;
    border-radius: 9px;
    color: #737b88;
    text-decoration: none;
    font-size: 11px;
    font-weight: 600;
    transition: all .2s ease;
}

.nav-link:hover {
    color: #20242c;
    background: #f5f7f8;
}

.nav-link.active {
    color: #047857;
    background: #ecfdf5;
}

.nav-link.active::before {
    content: "";
    position: absolute;
    left: 0;
    top: 10px;
    bottom: 10px;
    width: 3px;
    border-radius: 0 4px 4px 0;
    background: #10b981;
}

.nav-icon {
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8a929e;
    font-size: 12px;
    transition: .2s;
}

.nav-link:hover .nav-icon {
    color: #374151;
}

.nav-link.active .nav-icon {
    color: #10b981;
}

/* ==================================================
   USER AREA
================================================== */
.nav-user {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-left: auto;
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 5px 8px 5px 5px;
    border-radius: 10px;
    transition: .2s;
}

.user-profile:hover {
    background: #f7f8f9;
}

.user-avatar {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #20242c;
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    box-shadow: 0 3px 8px rgba(32,36,44,.12);
}

.user-name {
    max-width: 105px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #20242c;
    font-size: 11px;
    font-weight: 700;
}

.user-role {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 3px;
    color: #9aa1ab;
    font-size: 9px;
    font-weight: 500;
}

.role-dot {
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #10b981;
}

/* ==================================================
   DIVIDER
================================================== */
.nav-divider {
    width: 1px;
    height: 30px;
    background: #e5e7eb;
}

/* ==================================================
   LOGOUT
================================================== */
.logout-btn {
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 0 11px;
    border: 1px solid #e5e7eb;
    border-radius: 9px;
    background: #fff;
    color: #6b7280;
    font-size: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all .2s ease;
}

.logout-btn i {
    font-size: 13px;
}

.logout-btn:hover {
    color: #b91c1c;
    background: #fef2f2;
    border-color: #fecaca;
}

/* ==================================================
   RESPONSIVE
================================================== */
@media (max-width: 1100px) {
    .top-navbar {
        padding: 0 20px;
    }

    .brand {
        min-width: 190px;
    }

    .nav-link {
        padding: 0 10px;
        gap: 6px;
    }

    .nav-link span:last-child {
        font-size: 10px;
    }

    .user-detail {
        display: none;
    }
}

@media (max-width: 850px) {
    .brand {
        min-width: auto;
        margin-right: 10px;
    }

    .brand-info {
        display: none;
    }

    .nav-menu {
        overflow-x: auto;
        scrollbar-width: none;
    }

    .nav-menu::-webkit-scrollbar {
        display: none;
    }

    .nav-link {
        flex-shrink: 0;
    }

    .nav-user {
        margin-left: 8px;
    }

    .nav-divider {
        display: none;
    }
}

@media (max-width: 600px) {
    .top-navbar {
        height: 64px;
        padding: 0 12px;
    }

    .brand-logo {
        width: 36px;
        height: 36px;
        border-radius: 9px;
    }

    .nav-menu {
        gap: 3px;
    }

    .nav-link {
        width: 38px;
        height: 38px;
        padding: 0;
        justify-content: center;
    }

    .nav-link span:last-child {
        display: none;
    }

    .nav-icon {
        font-size: 14px;
    }

    .nav-user {
        margin-left: 5px;
    }

    .user-profile {
        padding: 0;
    }

    .user-avatar {
        width: 34px;
        height: 34px;
    }

    .logout-btn {
        width: 34px;
        height: 34px;
        padding: 0;
    }

    .logout-btn span {
        display: none;
    }
}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">