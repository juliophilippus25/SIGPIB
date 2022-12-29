<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item <?php echo e((request()->is('dashboard*')) ? 'active menu-open' : ''); ?>">
            <a class="nav-link <?php echo e((request()->is('dashboard*')) ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

    <li class="nav-item
    <?php echo e((request()->is('anggota*')) || (request()->is('pelkat*')) || (request()->is('sekwil*')) || (request()->is('kakel*'))
    || (request()->is('kakel*')) || (request()->is('pengguna*')) ? 'active menu-open' : ''); ?>">

    <a class="nav-link
    <?php echo e((request()->is('anggota*')) ||  (request()->is('pelkat*')) || (request()->is('sekwil*')) || (request()->is('kakel*'))
    || (request()->is('kakel*')) || (request()->is('pengguna*')) ? 'active' : ''); ?>" href="#">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Master Data
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a class="nav-link <?php echo e((request()->is('anggota*')) ? 'active' : ''); ?>" href="<?php echo e(route('anggota.index')); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anggota</p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo e((request()->is('pelkat*')) ? 'active' : ''); ?>" href="<?php echo e(route('pelkat.index')); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data PelKat</p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo e((request()->is('sekwil*')) ? 'active' : ''); ?>" href="<?php echo e(route('sekwil.index')); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Sektor Wilayah</p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo e((request()->is('kakel*')) ? 'active' : ''); ?>" href="<?php echo e(route('kakel.index')); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kartu Keluarga</p>
            </a>
        </li>
    </li>

        

    </ul>

    

</ul>
</nav>
<?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>