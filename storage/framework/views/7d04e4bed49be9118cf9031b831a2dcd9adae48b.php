<?php $__env->startSection('title', 'Baptis'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Detail Anggota</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('baptis.index')); ?>">Data Jemaat Baptis</a></li>
            <li class="breadcrumb-item active">Detail Data Jemaat Baptis</li>
        </ol>
    </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-lg-4">

                            <div class="form-group text-center">
                                <?php if($baptis->anggota->gambar == null): ?>
                                    <img id="preview" style="border-radius: 25px; padding: 20px;" width="200"
                                        height="200" src="<?php echo e(asset('images/pengguna/default.png')); ?>" />
                                <?php else: ?>
                                    <img id="preview" style="border-radius: 25px; padding: 20px;" width="300"
                                        height="300" src="<?php echo e(asset('storage/images/anggota/' . $anggota->gambar)); ?>" />
                                <?php endif; ?>
                            </div>

                        </div>

                        
                        <div class="col-lg-8">
                            <table class="table table-borderless table-striped">

                                <tbody>
                                    <tr>
                                        <td style="width: 30%">Kode Anggota</td>
                                        <td>:</td>
                                        <td style="width: 70%"><?php echo e($baptis->anggota->kode_anggota); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>:</td>
                                        <td><?php echo e($baptis->anggota->nama); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?php echo e($baptis->anggota->jk); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Tanggal Lahir</td>
                                        <td>:</td>
                                        <td><?php echo e($baptis->anggota->tempat_lahir); ?> /
                                            <?php echo e(Carbon\Carbon::parse($baptis->anggota->tgl_lahir)->isoFormat('D MMMM Y')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Tanggal Baptis</td>
                                        <td>:</td>
                                        <td><?php echo e($baptis->tempat_baptis); ?> /
                                            <?php echo e(Carbon\Carbon::parse($baptis->tgl_baptis)->isoFormat('D MMMM Y')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pendeta</td>
                                        <td>:</td>
                                        <td><?php echo e($baptis->pendeta); ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('baptis.tampil_ubah', ['id' => $baptis->id])); ?>" class="btn btn-warning"><i
                            class="fa fa-edit"></i> Ubah</a>
                    <a target="_blank" href="#"
                        class="btn btn-success"><i class="fas fa-cloud-download-alt"></i> Unduh</a>
                    <a href="<?php echo e(route('baptis.index')); ?>" class="btn btn-default float-right"> Kembali</a>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/anggota/baptis/show.blade.php ENDPATH**/ ?>