    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item {{ setActive(['home*']) }}">
            <a class="nav-link {{ setActive(['home*']) }}" href="{{route('home')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
            </a>
          </li>

          <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-controls="ui-basic">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <div class="collapse {{ setShow(['anggota*','pelkat*', 'sekwil*', 'kakel*', 'pengguna*']) }}" id="ui-basic">
              <ul class="nav flex-column sub-menu">

              <li class="nav-item">
                  <a class="nav-link {{ setActive(['anggota*']) }}" href="{{route('anggota.index')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Anggota</p>
                  </a>
                </li>

              <li class="nav-item">
                  <a class="nav-link {{ setActive(['pelkat*']) }}" href="{{route('pelkat.index')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data PelKat</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link {{ setActive(['sekwil*']) }}" href="{{route('sekwil.index')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Sektor Wilayah</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link {{ setActive(['kakel*']) }}" href="{{route('kakel.index')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kartu Keluarga</p>
                  </a>
                </li>

                @if(auth()->user()->role == 'Super Admin')
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['pengguna*']) }}" href="{{route('pengguna.index')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pengguna</p>
                  </a>
                </li>
                @endif

              </ul>
            </div>


          <li class="nav-item {{ setActive(['laporan*']) }}">
            <a class="nav-link {{ setActive(['laporan*']) }}" href="{{route('laporan.index')}}">
              <i class="nav-icon fas fa-cloud-download-alt"></i>
                <p>
                  Pusat Unduhan
                </p>
            </a>
          </li>
        </li>
        </ul>
    </nav>
