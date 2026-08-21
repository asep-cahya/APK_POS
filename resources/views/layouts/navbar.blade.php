<nav class="sidebar">

    {{-- Brand --}}
    <div class="sidebar-brand">

        <a href="{{ route('dashboard') }}" class="brand-link">

            <div class="brand-logo">
                P
            </div>

            <div class="brand-text">

                <div class="brand-title">
                    POS Kasir
                </div>

                <div class="brand-subtitle">
                    Point of Sale
                </div>

            </div>

        </a>

    </div>


    {{-- Menu --}}
    <div class="sidebar-content">

        <div class="menu-label">
            MENU UTAMA
        </div>


        <ul class="sidebar-menu">

            {{-- Dashboard --}}
            <li>

                <a href="{{ route('dashboard') }}"
                   class="sidebar-link {{ Request::is('dashboard') ? 'active-menu' : '' }}">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                        </svg>
                    </span>

                    <span class="menu-text">
                        Dashboard
                    </span>

                </a>

            </li>


            {{-- Users --}}
            @if(auth()->user()->role->name == 'admin')

            <li>

                <a href="{{ route('admin.users') }}"
                   class="sidebar-link {{ Request::is('admin/users*') ? 'active-menu' : '' }}">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-2.99 1.34-2.99 3S14.34 11 16 11zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5.01 6.34 5.01 8 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.17.84 1.97 1.94 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </span>

                    <span class="menu-text">
                        Users
                    </span>

                </a>

            </li>

            @endif


            {{-- Jenis --}}
            <li>

                <a href="{{ route('jenis.index') }}"
                   class="sidebar-link {{ Request::is('jenis*') ? 'active-menu' : '' }}">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20.59 13.41l-7.99-8A2 2 0 0011.17 5H5a2 2 0 00-2 2v6.17a2 2 0 00.59 1.42l8 8a2 2 0 002.82 0l6.18-6.18a2 2 0 000-3zM7.5 9.5A1.5 1.5 0 119 8a1.5 1.5 0 01-1.5 1.5z"/>
                        </svg>
                    </span>

                    <span class="menu-text">
                        Jenis
                    </span>

                </a>

            </li>


            {{-- Produk --}}
            <li>

                <a href="{{ route('produk.index') }}"
                   class="sidebar-link {{ Request::is('produk*') ? 'active-menu' : '' }}">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 8h-3V4H7v4H4c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zM9 6h6v2H9V6zm10 12H5v-6h14v6zm-3-4h-4v2h4v-2z"/>
                        </svg>
                    </span>

                    <span class="menu-text">
                        Produk
                    </span>

                </a>

            </li>


            {{-- Penjualan --}}
            <li>

                <a href="{{ route('penjualan.index') }}"
                   class="sidebar-link {{ Request::is('penjualan*') ? 'active-menu' : '' }}">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 15H6v-2h12v2zm0-4H6v-2h12v2zm0-4H6V8h12v2z"/>
                        </svg>
                    </span>

                    <span class="menu-text">
                        Penjualan
                    </span>

                </a>

            </li>

        </ul>

    </div>


    {{-- User --}}
    <div class="sidebar-bottom">

        <div class="user-card">

            <div class="user-avatar">

                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

            </div>

            <div class="user-info">

                <div class="user-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="user-role">
                    {{ auth()->user()->role->name }}
                </div>

            </div>

        </div>


        <form action="{{ route('logout') }}"
              method="POST">

            @csrf

            <button type="submit" class="logout-btn">

                <svg viewBox="0 0 24 24">

                    <path d="M10 17l5-5-5-5v3H3v4h7v3zm9-14H5c-1.1 0-2 .9-2 2v3h2V5h14v14H5v-3H3v3c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>

                </svg>

                <span>
                    Logout
                </span>

            </button>

        </form>

    </div>

</nav>


<style>

/* ==================================================
   SIDEBAR
================================================== */

.sidebar {

    position: fixed;

    top: 0;
    left: 0;

    width: 250px;
    height: 100vh;

    background: #20242C;

    color: #ffffff;

    display: flex;
    flex-direction: column;

    z-index: 1000;

    font-family: Arial, Helvetica, sans-serif;

    box-shadow: 4px 0 20px rgba(15, 23, 42, 0.12);

}


/* ==================================================
   BRAND
================================================== */

.sidebar-brand {

    padding: 25px 22px;

    border-bottom: 1px solid #2D333D;

}


.brand-link {

    display: flex;

    align-items: center;

    gap: 12px;

    text-decoration: none;

}


.brand-logo {

    width: 40px;
    height: 40px;

    border-radius: 11px;

    background: #10B981;

    color: #ffffff;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 17px;

    font-weight: 700;

}


.brand-title {

    color: #F9FAFB;

    font-size: 16px;

    font-weight: 700;

    line-height: 1.2;

}


.brand-subtitle {

    color: #8F98A6;

    font-size: 10px;

    margin-top: 3px;

    letter-spacing: .3px;

}


/* ==================================================
   CONTENT
================================================== */

.sidebar-content {

    flex: 1;

    padding: 28px 15px;

    overflow-y: auto;

}


.menu-label {

    padding: 0 12px;

    margin-bottom: 10px;

    color: #707987;

    font-size: 10px;

    font-weight: 700;

    letter-spacing: 1px;

}


/* ==================================================
   MENU
================================================== */

.sidebar-menu {

    list-style: none;

    margin: 0;

    padding: 0;

}


.sidebar-menu li {

    margin-bottom: 4px;

}


.sidebar-link {

    position: relative;

    display: flex;

    align-items: center;

    gap: 13px;

    height: 45px;

    padding: 0 13px;

    border-radius: 10px;

    text-decoration: none;

    color: #A1A8B3;

    font-size: 13px;

    font-weight: 500;

    transition: all .2s ease;

}


.sidebar-link:hover {

    background: #292F38;

    color: #F9FAFB;

}


/* ==================================================
   ICON
================================================== */

.menu-icon {

    width: 20px;

    height: 20px;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-shrink: 0;

}


.menu-icon svg {

    width: 17px;

    height: 17px;

    fill: currentColor;

}


/* ==================================================
   ACTIVE MENU
================================================== */

.sidebar-link.active-menu {

    background: #303741;

    color: #F9FAFB;

    font-weight: 600;

}


.sidebar-link.active-menu::before {

    content: "";

    position: absolute;

    left: 0;

    top: 9px;

    width: 3px;

    height: 27px;

    background: #10B981;

    border-radius: 0 4px 4px 0;

}


/* ==================================================
   USER
================================================== */

.sidebar-bottom {

    padding: 17px 15px 20px;

    border-top: 1px solid #2D333D;

}


.user-card {

    display: flex;

    align-items: center;

    gap: 11px;

    padding: 11px;

    margin-bottom: 10px;

    border-radius: 11px;

    background: #292F38;

}


.user-avatar {

    width: 36px;
    height: 36px;

    flex-shrink: 0;

    border-radius: 10px;

    background: #10B981;

    color: #ffffff;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 13px;

    font-weight: 700;

}


.user-info {

    min-width: 0;

}


.user-name {

    color: #F9FAFB;

    font-size: 12px;

    font-weight: 600;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


.user-role {

    color: #8F98A6;

    font-size: 10px;

    margin-top: 3px;

    text-transform: capitalize;

}


/* ==================================================
   LOGOUT
================================================== */

.logout-btn {

    width: 100%;

    height: 40px;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 9px;

    background: transparent;

    border: 1px solid #3A414C;

    border-radius: 9px;

    color: #A1A8B3;

    font-size: 12px;

    font-weight: 500;

    cursor: pointer;

    transition: all .2s ease;

}


.logout-btn svg {

    width: 16px;

    height: 16px;

    fill: currentColor;

}


.logout-btn:hover {

    background: #303741;

    border-color: #4A535F;

    color: #F9FAFB;

}


/* ==================================================
   BODY
================================================== */

body {

    margin: 0;

    background: #F5F6F8;

}


/* ==================================================
   CONTENT
================================================== */

.main-content {

    margin-left: 250px;

    min-height: 100vh;

    padding: 30px;

}


/* ==================================================
   RESPONSIVE
================================================== */

@media (max-width: 768px) {

    .sidebar {

        width: 220px;

    }

    .main-content {

        margin-left: 220px;

        padding: 20px;

    }

}

</style>
