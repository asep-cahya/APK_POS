
<nav class="navbar navbar-expand-lg shadow-sm"
    style="background:#111827;">

    <div class="container">


        <!-- Brand -->

        <a class="navbar-brand fw-bold text-white"
            href="{{ route('dashboard') }}">

            POS Kasir

        </a>




        <!-- Toggle -->

        <button
            class="navbar-toggler border-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">


            <span class="navbar-toggler-icon"></span>


        </button>





        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">





            <!-- Menu -->

            <ul class="navbar-nav me-auto gap-2">



                <li class="nav-item">

                    <a class="nav-link text-white 
                        {{ Request::is('dashboard') ? 'fw-bold active-menu' : '' }}"
                        href="{{ route('dashboard') }}">

                        Dashboard

                    </a>

                </li>





                @if(auth()->user()->role->name == 'admin')


                <li class="nav-item">

                    <a class="nav-link text-white
                        {{ Request::is('admin/users*') ? 'fw-bold active-menu' : '' }}"
                        href="{{ route('admin.users') }}">

                        Users

                    </a>

                </li>


                @endif





                <li class="nav-item">

                    <a class="nav-link text-white
                        {{ Request::is('produk*') ? 'fw-bold active-menu' : '' }}"
                        href="{{ route('produk.index') }}">

                        Produk

                    </a>

                </li>





                <li class="nav-item">

                    <a class="nav-link text-white
                        {{ Request::is('penjualan*') ? 'fw-bold active-menu' : '' }}"
                        href="{{ route('penjualan.index') }}">

                        Penjualan

                    </a>

                </li>




            </ul>





            <!-- User -->

            <div class="d-flex align-items-center gap-3">



                <span class="text-white small">

                    {{ auth()->user()->name }}

                </span>





                <form action="{{ route('logout') }}"
                    method="POST">


                    @csrf


                    <button
                        class="btn btn-outline-light btn-sm rounded-3">


                        Logout


                    </button>



                </form>




            </div>





        </div>


    </div>


</nav>



<style>

.nav-link {

    opacity: .75;
    transition: .2s;

}


.nav-link:hover {

    opacity: 1;

}



.active-menu {

    opacity:1;
    position:relative;

}



.active-menu::after {

    content:"";
    position:absolute;
    left:0;
    right:0;
    bottom:0;

    height:2px;

    background:white;

}



</style>

