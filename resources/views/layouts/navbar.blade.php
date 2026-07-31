<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

  <div class="container">

    <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
      🛒 POS Kasir
    </a>

    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto">

        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active fw-bold' : '' }}"
            href="{{ route('dashboard') }}">
            📊 Dashboard
          </a>
        </li>

        @if(auth()->user()->role->name == 'admin')

        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/users*') ? 'active fw-bold' : '' }}"
            href="{{ route('admin.users') }}">
            👥 Users
          </a>
        </li>

        @endif

        <li class="nav-item">
          <a class="nav-link {{ Request::is('produk*') ? 'active fw-bold' : '' }}"
            href="{{ route('produk.index') }}">
            📦 Produk
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('penjualan*') ? 'active fw-bold' : '' }}"
            href="{{ route('penjualan.index') }}">
            🧾 Penjualan
          </a>
        </li>

      </ul>

      <div class="d-flex align-items-center">

        <span class="text-white me-3">
          👤 {{ auth()->user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
          @csrf

          <button class="btn btn-outline-light">
            Logout
          </button>
        </form>

      </div>

    </div>

  </div>

</nav>