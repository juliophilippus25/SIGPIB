<?php $__env->startSection('title', 'Pelayanan Kategorial'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Pelayanan Kategorial</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Pelayanan Kategorial</li>
        </ol>
    </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Data Pelayanan Kategorial</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelayanan Kategorial</th>
                                <th>Jumlah Anggota</th>
                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $__empty_1 = true; $__currentLoopData = $pelkat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($data->nama_pelkat); ?></td>
                                    <td>
                                        <?php if($data->nama_pelkat == 'Pelayanan Anak'): ?>
                                            <?php echo e($pa); ?>

                                        <?php elseif($data->nama_pelkat == 'Persekutuan Teruna'): ?>
                                            <?php echo e($pt); ?>

                                        <?php elseif($data->nama_pelkat == 'Gerakan Pemuda'): ?>
                                            <?php echo e($gp); ?>

                                        <?php elseif($data->nama_pelkat == 'Persekutuan Kaum Perempuan'): ?>
                                            <?php echo e($pkp); ?>

                                        <?php elseif($data->nama_pelkat == 'Persekutuan Kaum Bapak'): ?>
                                            <?php echo e($pkb); ?>

                                        <?php elseif($data->nama_pelkat == 'Persekutuan Kaum Lanjut Usia'): ?>
                                            <?php echo e($pklu); ?>

                                        <?php endif; ?>
                                    </td>
                                    
                                    <td>
                                        <a href="<?php echo e(route('detailpelkat.index', ['id' => $data->id])); ?>"
                                            class="btn btn-primary  btn-sm" title="Lihat Detail"><i
                                                class="fa fa-eye"></i></a>
                                        
                                        
                                        

                                        <!-- Modal -->
                                        
                                        <!-- Modal -->

                                    </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="">
                                <td colspan="16">
                                    <strong class="text-dark">
                                        <center>Data Kosong</center>
                                    </strong>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/pelkat/index.blade.php ENDPATH**/ ?>