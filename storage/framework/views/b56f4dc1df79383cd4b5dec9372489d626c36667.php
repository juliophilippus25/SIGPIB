<?php $__env->startSection('title', 'Sektor Wilayah'); ?>

<?php $__env->startSection('breadcrumb'); ?>

<div class="col-sm-6">
    <!-- <h1 class="m-0">Sektor Wilayah</h1> -->
</div><!-- /.col -->

<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Sektor Wilayah</li>
    </ol>
</div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card card-default">
            <div class="card-header d-flex">
                <h3 class="card-title">Data Sektor Wilayah</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                
                <br>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sektor Wilayah</th>
                            <th>Jumlah Kartu Keluarga</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sektor Pelayanan 1</td>
                            <td><?php echo e($sek1); ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sektor Pelayanan 2</td>
                            <td><?php echo e($sek2); ?></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/sekwil/index.blade.php ENDPATH**/ ?>