
<nav class="navbar navbar-expand navbar-white navbar-light justify-content-center">

    <ul class="navbar-nav">

        
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">Dashboard</a>
        </li>

        
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo e(route('dashboard.anggota')); ?>" class="nav-link">Anggota</a>
        </li>

        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                PelKat
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item" href="<?php echo e(route('dashboard.pelkat')); ?>"> Semua </a>
                <a class="dropdown-item" href="<?php echo e(route('dashboard.pelkat_pa')); ?>"> Pelayanan Anak </a>
                <a class="dropdown-item" href="<?php echo e(route('dashboard.pelkat_pt')); ?>"> Persekutuan Teruna </a>
                <a class="dropdown-item" href="<?php echo e(route('dashboard.pelkat_gp')); ?>"> Gerakan Pemuda </a>
                <a class="dropdown-item" href="<?php echo e(route('dashboard.pelkat_pkp')); ?>"> Persekutuan Kaum Perempuan </a>
                <a class="dropdown-item" href="<?php echo e(route('dashboard.pelkat_pkb')); ?>"> Persekutuan Kaum Bapak </a>
                <a class="dropdown-item" href="<?php echo e(route('dashboard.pelkat_pklu')); ?>"> Persekutuan Kaum Lanjut Usia </a>
            </div>
        </li>

        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                SekWil
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item" href="<?php echo e(route('dashboard.sekwil')); ?>"> Semua </a>
                <a class="dropdown-item" href="<?php echo e(route('dashboard.sekwil1')); ?>"> Sektor Pelayanan 1 </a>
                <a class="dropdown-item" href="<?php echo e(route('dashboard.sekwil2')); ?>"> Sektor Pelayanan 2 </a>
            </div>
        </li>
    </ul>

</nav>

<?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>