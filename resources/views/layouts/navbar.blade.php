{{-- Navbar --}}
<nav class="navbar navbar-expand navbar-white navbar-light justify-content-center">

    <ul class="navbar-nav">

        {{-- Dashboard --}}
        <li class="nav-item d-none d-sm-inline-block {{ (request()->is('dashboard')) ? 'active menu-open' : '' }}">
            <a href="{{route('dashboard')}}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">Dashboard</a>
        </li>

        {{-- Anggota --}}
        <li class="nav-item d-none d-sm-inline-block {{ (request()->is('dashboard*')) ? 'active menu-open' : '' }}">
            <a href="{{route('dashboard.anggota')}}" class="nav-link {{ (request()->is('dashboard*')) ? 'active' : '' }}">Anggota</a>
        </li>

        {{-- Pelkat --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                PelKat
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item" href="#"> Semua </a>
                @foreach ($pelkat as $data)
                    <a class="dropdown-item" href="#"> {{ $data->nama_pelkat }} </a>
                @endforeach
            </div>
        </li>

        {{-- Sekwil --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                SekWil
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item" href="#"> Semua </a>
                @foreach ($sekwil as $data)
                    <a class="dropdown-item" href="#"> {{ $data->nama_sekwil }} </a>
                @endforeach
            </div>
        </li>
    </ul>

</nav>
{{-- Navbar --}}
