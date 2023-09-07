<?php $__env->startSection('title', 'Kartu Keluarga'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Kartu Keluarga</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('kakel.index')); ?>">Data Kartu Keluarga</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('detailkakel.tombol_kembali')); ?>">Detail Kartu Keluarga</a></li>
            <li class="breadcrumb-item active">Ubah Anggota Keluarga</li>
        </ol>
    </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Form Ubah Anggota Keluarga <?php echo e($det_kakel->anggota->nama); ?></h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="<?php echo e(route('detailkakel.simpan_perbarui', ['id' => $det_kakel->id])); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('put')); ?>


                    <div class="card-body">

                        <div class="form-group">
                            <label>Status Hubungan Dalam Keluarga <b style="color:Tomato;">*</b></label>
                            <select class="form-control select2bs4 <?php $__errorArgs = ['sts_keluarga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                name="sts_keluarga" style="width: 100%;">
                                <option hidden disabled selected value>Pilih Status Hubungan Dalam Keluarga</option>
                                <option value="Anak" <?php if(($det_kakel->sts_keluarga)=='Anak') echo 'selected' ?>>
                                    Anak</option>
                                <option value="Istri" <?php if(($det_kakel->sts_keluarga)=='Istri') echo 'selected' ?>>
                                    Istri</option>
                            </select>
                            <?php $__errorArgs = ['sts_keluarga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo e(route('detailkakel.tombol_kembali')); ?>" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/detailkakel/edit.blade.php ENDPATH**/ ?>