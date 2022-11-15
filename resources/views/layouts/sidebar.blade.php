<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item {{ (request()->is('dashboard')) ? 'active menu-open' : '' }}">
            <a class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{route('dashboard')}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

    <li class="nav-item
    {{ (request()->is('anggota*')) || (request()->is('pelkat*')) || (request()->is('sekwil*')) || (request()->is('kakel*'))
    || (request()->is('kakel*')) || (request()->is('pengguna*')) ? 'active menu-open' : ''
    }}">

    <a class="nav-link
    {{ (request()->is('anggota*')) ||  (request()->is('pelkat*')) || (request()->is('sekwil*')) || (request()->is('kakel*'))
    || (request()->is('kakel*')) || (request()->is('pengguna*')) ? 'active' : '' }}" href="#">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Data Master
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('anggota*')) ? 'active' : '' }}" href="{{route('anggota.index')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anggota</p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('pelkat*')) ? 'active' : '' }}" href="{{route('pelkat.index')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data PelKat</p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('sekwil*')) ? 'active' : '' }}" href="{{route('sekwil.index')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Sektor Wilayah</p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('kakel*')) ? 'active' : '' }}" href="{{route('kakel.index')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kartu Keluarga</p>
            </a>
        </li>
    </li>

        {{-- @if(auth()->user()->role == 'Super Admin')
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('pengguna*')) ? 'active' : '' }}" href="{{route('pengguna.index')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pengguna</p>
            </a>
        </li>
        @endif --}}

    </ul>

    {{-- <li class="nav-item {{ (request()->is('unduh*')) ? 'active menu-open' : '' }}">
        <a class="nav-link {{ (request()->is('unduh*')) ? 'active' : '' }}" href="{{route('unduh.index')}}">
            <i class="nav-icon fas fa-cloud-download-alt"></i>
            <p>
                Pusat Unduhan
            </p>
        </a>
    </li> --}}

</ul>
</nav>
