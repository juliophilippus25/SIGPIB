<?php $__env->startSection('title', 'Baptis'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Baptis</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('baptis.index')); ?>">Data Baptis</a></li>
            <li class="breadcrumb-item active">Ubah Data Baptis</li>
        </ol>
    </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Form Ubah Data Baptis <?php echo e($baptis->anggota->nama); ?></h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="<?php echo e(route('baptis.simpan_perbarui', ['id' => $baptis->id])); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('put')); ?>

                    <div class="card-body">
                        <input type="hidden" required="required" name="id_anggota" value="<?php echo e($baptis->id_anggota); ?>"
                            readonly>

                        <div class="form-group">
                            <label for="tempat_baptis">Tempat Baptis <b style="color:Tomato;">*</b></label>
                            <input type="text"
                                class="form-control <?php $__errorArgs = ['tempat_baptis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tempat_baptis"
                                id="tempat_baptis" placeholder="Masukkan Tempat Baptis"
                                value="<?php echo e(old('tempat_baptis', $baptis->tempat_baptis)); ?>">
                            <?php $__errorArgs = ['tempat_baptis'];
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

                        <div class="form-group">
                            <label>Tanggal Baptis <b style="color:Tomato;">*</b></label>
                            <input type="date" name="tgl_baptis" id="tgl_baptis"
                                class="form-control <?php $__errorArgs = ['tgl_baptis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('tgl_baptis', $baptis->tgl_baptis)); ?>">
                            <?php $__errorArgs = ['tgl_baptis'];
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

                        <div class="form-group">
                            <label for="pendeta">Pendeta <b style="color:Tomato;">*</b></label>
                            <input type="text"
                                class="form-control <?php $__errorArgs = ['pendeta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pendeta"
                                id="pendeta" placeholder="Masukkan Nama Pendeta"
                                value="<?php echo e(old('pendeta', $baptis->pendeta)); ?>">
                            <?php $__errorArgs = ['pendeta'];
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
                        <a href="<?php echo e(route('baptis.tampil_detail', ['id' => $baptis->id])); ?>" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/anggota/baptis/edit.blade.php ENDPATH**/ ?>